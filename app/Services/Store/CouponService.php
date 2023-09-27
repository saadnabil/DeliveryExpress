<?php
namespace App\Services\Store;

use App\Http\Resources\Api\Store\CouponResource;
use App\Http\Traits\ApiResponseTrait;
use App\Models\Coupon;
use App\Models\Shipment;
use Carbon\Carbon;

class CouponService{

    use ApiResponseTrait;

    public function apply(array $data){

        $shipment = Shipment::find($data['shipment_id']);
        $coupon = Coupon::find($data['coupon_id']);

        if(!$shipment){
            return $this->sendResponse(['error'=>__('translation.Shipment not found')] , 'fail' , 404);
        }

        if($shipment->coupon_id != null){
            return $this->sendResponse(['error'=>__('translation.Shipment already has coupon')] , 'fail' , 400);
        }

        $total =   $shipment->total_price - ($shipment->total_price * $coupon->discount / 100);

        $shipment->update([
            'coupon_id' => $coupon->id,
            'discount_fee' => $coupon->discount,
            'total_price' => $total,
        ]);
        $invoice = $shipment->printShipmentInvoice();
        $invoice['couponTitle'] = $coupon->title;
        return $this->sendResponse($invoice);
    }

    public function coupons(){
        $store = auth()->user()->load('coupons');
        $coupons =  $store->coupons;
        $validCoupons = $coupons->where('is_used' , 0)
                                ->where('expire_date', '>', now());
        return $this->sendResponse(CouponResource::collection($validCoupons));
    }

}
