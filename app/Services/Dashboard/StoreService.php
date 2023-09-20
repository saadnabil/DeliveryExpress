<?php
namespace App\Services\Dashboard;

use App\Helpers\FileHelper;
use App\Models\Activity;
use App\Models\City;
use App\Models\Country;
use App\Models\Store;
use App\Models\User;
use Spatie\Permission\Models\Role;

class StoreService{

    public function index(){
        $rows = Store::with('activity')->get();
        return view('dashboard.stores.index',compact('rows'));
    }

    public function create(){
        $cities = City::get();
        $countries = Country::get();
        $activities = Activity::get();
        return view('dashboard.stores.create' , compact('cities','countries','activities'));
    }

    public function store(array $data){
        $data['password'] = bcrypt($data['password']);
        $data['verified'] =1;
        if(isset($data['image'])){
            $image = FileHelper::upload_file('uploads' , $data['image']);
            $data['image'] = $image;
        }
        Store::create($data);
        return redirect()->route('stores.index')->with(['success' => __('translation.Added Successfully')]);
    }

    public function edit($store){
        $cities = City::get();
        $countries = Country::get();
        $activities = Activity::get();
        return view('dashboard.stores.edit' , compact('cities','countries','activities','store'));
    }

    public function update(array $data , $store){
        if ($data['password']) {
            $data['password'] = bcrypt($data['password']);
        } else {
            unset($data['password']);
        }
        if(isset($data['image'])){
            $image = FileHelper::update_file('uploads' , $data['image'],$store->image);
            $data['image'] = $image;
        }
       $store->update($data);
        return redirect()->route('stores.index')->with(['success' => __('translation.Updated Successfully')]);
    }

    public function destroy($store){
        $store->delete();
        return redirect()->route('stores.index')->with(['success' => __('translation.Deleted Successfully')]);
    }
}
