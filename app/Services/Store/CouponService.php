<?php
namespace App\Services\Store;

use App\Http\Resources\Api\Store\CouponResource;
use App\Http\Traits\ApiResponseTrait;
use App\Models\Coupon;
use App\Models\Shipment;

class CouponService{

    use ApiResponseTrait;

    public function apply(array $data){
        $row = Shipment::find($data['shipment_id']);
        $coupon = Coupon::find($data['coupon_id']);
        if(!$row ||  !$coupon){
            return $this->sendResponse(['error'=>'Shipment or Coupon id is not correct!'] , 'fail' , 404);
        }
        $row->update([
            'coupon_id' =>  $data['coupon_id'],
            'discount_fee' => $coupon->discount,
        ]);
        $response = shipment_price_reciept($row);
        return $this->sendResponse($response);
    }

    public function coupons(){
        $store = auth()->user()->load('coupons');
        $coupons =  $store->coupons;
        $validCoupons = $coupons->where('is_used' , 0)
                                ->where('expire_date', '>', now());
        return $this->sendResponse(CouponResource::collection($validCoupons));
    }

}
