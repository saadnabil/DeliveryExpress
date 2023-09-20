<?php
namespace App\Services\Dashboard;

use App\Models\Activity;
use App\Models\CancelReason;
use App\Models\City;
use App\Models\Complain;
use App\Models\Coupon;
use App\Models\Store;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class CouponsService{

    public function index(){
        $rows = Coupon::with('store')->get();
        return view('dashboard.coupons.index',compact('rows'));
    }

    public function create(){
        $stores = Store::get();
        return view('dashboard.coupons.create',compact('stores'));
    }

    public function store(array $data){
        Coupon::create($data);
        return redirect()->route('coupons.index')->with(['success' => __('translation.Added Successfully')]);
    }

    public function edit($coupon){
        $stores = Store::get();
        return view('dashboard.coupons.edit' , compact('coupon','stores'));
    }

    public function update(array $data , $coupon){

        $coupon->update($data);
        return redirect()->route('coupons.index')->with(['success' => __('translation.Updated Successfully')]);
    }

    public function destroy($coupon){
        $coupon->delete();
        return redirect()->route('coupons.index')->with(['success' => __('translation.Deleted Successfully')]);
    }
}
