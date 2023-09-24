<?php
namespace App\Services\Dashboard;

use App\Models\City;
use App\Models\Complain;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class CityService{
    public function index(){
        $rows = City::latest()->get();
        return view('dashboard.cities.index',compact('rows'));
    }

    public function create(){
        return view('dashboard.cities.create');
    }

    public function store(array $data){
        City::create($data);
        return redirect()->route('cities.index')->with(['success' => __('translation.Added Successfully')]);
    }

    public function edit($city){
        return view('dashboard.cities.edit' , compact('city'));
    }

    public function update(array $data , $city){

        $city->update($data);
        return redirect()->route('cities.index')->with(['success' => __('translation.Updated Successfully')]);
    }

    public function destroy($city){
        $city->delete();
        return redirect()->route('cities.index')->with(['success' => __('translation.Deleted Successfully')]);
    }
}
