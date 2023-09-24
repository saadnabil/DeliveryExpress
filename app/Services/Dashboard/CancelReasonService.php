<?php
namespace App\Services\Dashboard;

use App\Models\Activity;
use App\Models\CancelReason;
use App\Models\City;
use App\Models\Complain;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class CancelReasonService{
    public function index(){
        $rows = CancelReason::latest()->get();
        return view('dashboard.cancelReasons.index',compact('rows'));
    }

    public function create(){
        return view('dashboard.cancelReasons.create');
    }

    public function store(array $data){
        CancelReason::create($data);
        return redirect()->route('cancelReasons.index')->with(['success' => __('translation.Added Successfully')]);
    }

    public function edit($cancelReason){
        return view('dashboard.cancelReasons.edit' , compact('cancelReason'));
    }

    public function update(array $data , $cancelReaosn){

        $cancelReaosn->update($data);
        return redirect()->route('cancelReasons.index')->with(['success' => __('translation.Updated Successfully')]);
    }

    public function destroy($cancelReasonService){
        $cancelReasonService->delete();
        return redirect()->route('cancelReasons.index')->with(['success' => __('translation.Deleted Successfully')]);
    }
}
