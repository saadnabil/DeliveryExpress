<?php
namespace App\Services\Dashboard;

use App\Helpers\FileHelper;
use App\Models\Activity;
use App\Models\City;
use App\Models\Country;
use App\Models\Delivery;
use App\Models\DeliveryWorkCity;
use App\Models\DeliveryWorkTime;
use App\Models\Shipment;
use App\Models\Store;
use App\Models\User;
use Carbon\Carbon;
use Spatie\Permission\Models\Role;

class ShipmentService{

    public function index(){
        $rows = Shipment::with(['shipmentType','store'])
                         ->where('status','!=','incomplete')
                         ->get();
        return view('dashboard.shipments.index',compact('rows'));
    }

    public function create(){
        $cities = City::get();
        $countries = Country::get();
        return view('dashboard.shipments.create' , compact('cities','countries'));
    }

    public function store(array $data){
        $data['password'] = bcrypt($data['password']);
        $cities = $data['city'];
        $worktimes = $data['worktimes'];
        if(isset($data['image'])){
            $image = FileHelper::upload_file('uploads' , $data['image']);
            $data['image'] = $image;
        }
        unset($data['city']);
        unset($data['worktimes']);
        $data['birth_date'] = Carbon::parse($data['birth_date'])->format('Y/m/d');
        $delivery = Delivery::create($data);
        foreach($cities as $city){
            DeliveryWorkCity::create([
                'delivery_id' => $delivery->id,
                'city_id' => $city
            ]);
        }
        foreach($worktimes as $worktime){
            DeliveryWorkTime::create([
                'delivery_id' => $delivery->id,
                'day' => $worktime['day'],
                'start_time' => $worktime['start_time'],
                'end_time' => $worktime['end_time'],
            ]);
        }
        return redirect()->route('deliveries.index')->with(['success' => __('translation.Added Successfully')]);
    }

    public function edit($delivery){
        $cities = City::get();
        $countries = Country::get();
        $delivery = $delivery->load('deliveryWorkCities','deliveryWorkTimes');
        $deliveryCitiesWorkIds = $delivery->deliveryWorkCities()->pluck('city_id')->toarray();
        return view('dashboard.deliveries.edit' , compact('cities','countries','delivery','deliveryCitiesWorkIds'));
    }

    public function update(array $data , $delivery){
        $delivery = $delivery->load('deliveryWorkCities','deliveryWorkTimes');
        $data['password'] = bcrypt($data['password']);
        $cities = $data['city'];
        $worktimes = $data['worktimes'];
        if(isset($data['image'])){
            $image = FileHelper::upload_file('uploads' , $data['image']);
            $data['image'] = $image;
        }
        unset($data['city']);
        unset($data['worktimes']);
        $delivery->deliveryWorkCities()->delete();
        $delivery->deliveryWorkTimes()->delete();
        $data['birth_date'] = Carbon::parse($data['birth_date'])->format('Y/m/d');
        $delivery->update($data);
        foreach($cities as $city){
            DeliveryWorkCity::create([
                'delivery_id' => $delivery->id,
                'city_id' => $city
            ]);
        }
        foreach($worktimes as $worktime){
            DeliveryWorkTime::create([
                'delivery_id' => $delivery->id,
                'day' => $worktime['day'],
                'start_time' => $worktime['start_time'],
                'end_time' => $worktime['end_time'],
            ]);
        }
        return redirect()->route('deliveries.index')->with(['success' => __('translation.Updated Successfully')]);
    }
    public function destroy($delivery){
        $delivery->delete();
        return redirect()->route('deliveries.index')->with(['success' => __('translation.Deleted Successfully')]);
    }
}
