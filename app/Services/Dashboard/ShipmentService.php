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
use App\Models\ShipmentImage;
use App\Models\ShipmentType;
use App\Models\Store;
use App\Models\User;
use Carbon\Carbon;
use Spatie\Permission\Models\Role;

class ShipmentService{

    public function index(){
        $rows = Shipment::with(['shipmentType','store'])
                         ->where('status','!=','incomplete')
                         ->latest()
                         ->get();
        return view('dashboard.shipments.index',compact('rows'));
    }

    public function create(){
        $cities = City::get();
        $countries = Country::get();
        $stores = Store::get();
        $shipmentTypes = ShipmentType::get();
        return view('dashboard.shipments.create' , compact('cities','countries','stores','shipmentTypes'));
    }

    public function getStoreReturnedShipments($store_id){
        $returnedShipments = Shipment::where([
            'status' => 'returned',
            'store_id' => $store_id,
        ])->get();
        $view = view('dashboard.shipments.returnedShipments',compact('returnedShipments'))->render();
        $data = [
            'count' => count($returnedShipments),
            'view' => $view
        ];
        return response()->json($data);
    }

    public function store(array $data){
        $data['shipment_code'] = generate_code_unique();
        $data['qr_code_image'] = generateQrCode($data['shipment_code']);
        $data['status'] = 'pending';
        $shipmentImages = null;
        if(isset($data['images'])){
            $shipmentImages = $data['images'];
            unset($data['images']);
        }
        $shipment = Shipment::create($data);
        if(isset($data['images'])){
            foreach($shipmentImages as $image){
                $imagename = FileHelper::upload_file('uploads' , $image);
                ShipmentImage::create([
                    'image' => $imagename,
                    'shipment_id' => $shipment->id
                ]);
            }
        }
        return redirect()->route('shipments.index')->with(['success' => __('translation.Added Successfully')]);
    }

    public function edit($shipment){
        $shipment = $shipment->load('images');
        $cities = City::get();
        $countries = Country::get();
        $stores = Store::get();
        $shipmentTypes = ShipmentType::get();
        $returnedShipments = Shipment::where([
            'status' => 'returned',
            'store_id' => $shipment->store_id,
        ])->get();
        return view('dashboard.shipments.edit' , compact('cities','countries','stores','shipmentTypes','shipment','returnedShipments'));
    }

    public function update(array $data , $shipment){
        $data['breakable'] = $data['breakable'] ?? 0 ;
        $data['measurement_is_allowed'] =  $data['measurement_is_allowed'] ?? 0 ;
        $data['shipment_packaging'] =  $data['shipment_packaging']?? 0;
        $data['preview_allowed'] = $data['preview_allowed'] ?? 0 ;
        if(isset($data['images'])){
            foreach($data['images'] as $image){
                $imagename = FileHelper::upload_file('uploads' , $image);
                ShipmentImage::create([
                    'image' => $imagename,
                    'shipment_id' => $shipment->id
                ]);
            }
        }
        unset($data['images']);
        $shipment->update($data);
        return redirect()->route('shipments.index')->with(['success' => __('translation.Updated Successfully')]);
    }
    public function destroy($shipment){
        $shipment->delete();
        return redirect()->route('shipments.index')->with(['success' => __('translation.Deleted Successfully')]);
    }
}
