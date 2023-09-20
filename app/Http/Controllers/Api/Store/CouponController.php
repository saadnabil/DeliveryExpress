<?php

namespace App\Http\Controllers\Api\Store;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Store\ApplyCoupon;
use App\Http\Traits\ApiResponseTrait;
use App\Services\Store\CouponService;
class CouponController extends Controller
{
    //
    use ApiResponseTrait;
    protected $couponService;

    public function __construct(CouponService $couponService)
    {
        $this->couponService =  $couponService;
    }

    public function apply(ApplyCoupon $request){
        $data = $request->validated();
        return $this->couponService->apply($data);
    }

    public function coupons(){
        return $this->couponService->coupons();
    }
}
