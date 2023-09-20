<?php
namespace App\Services\Dashboard;

use App\Models\Activity;
use App\Models\City;
use App\Models\Complain;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class ActivityService{
    public function index(){
        $rows = Activity::get();
        return view('dashboard.activities.index',compact('rows'));
    }

    public function create(){
        return view('dashboard.activities.create');
    }

    public function store(array $data){
        Activity::create($data);
        return redirect()->route('activities.index')->with(['success' => __('translation.Added Successfully')]);
    }

    public function edit($activity){
        return view('dashboard.activities.edit' , compact('activity'));
    }

    public function update(array $data , $activity){

        $activity->update($data);
        return redirect()->route('activities.index')->with(['success' => __('translation.Updated Successfully')]);
    }

    public function destroy($activity){
        $activity->delete();
        return redirect()->route('activities.index')->with(['success' => __('translation.Deleted Successfully')]);
    }
}
