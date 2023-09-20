<?php
namespace App\Services\Store;

use App\Http\Resources\Api\Store\CouponResource;
use App\Http\Traits\ApiResponseTrait;
use App\Models\CollectionRequest;
use App\Models\CollectionRequestShipment;
use App\Models\Coupon;
use App\Models\Shipment;
use Carbon\Carbon;

class CollectionRequestService{
    use ApiResponseTrait;

    public function store(array $data){
        $shipments_ids  = $data['shipments_ids'];
        $store = auth()->user();
        $data['store_id'] = $store->id;
        if($data['type'] == 1){
            $dateString = $data ['date'] . ' ' .$data['time'];
            $timestamp = Carbon::createFromFormat('Y/m/d H:i a', $dateString)->format('Y-m-d H:i:s');
            $data['date'] = $timestamp;
            unset($data['time']);
        }
        unset($data['shipments_ids']);
        $row = CollectionRequest::create($data);
        foreach($shipments_ids as $shipmentId){
            CollectionRequestShipment::create([
                'collection_request_id' =>  $row->id,
                'shipment_id' => $shipmentId,
            ]);
        }
        return $this->sendResponse([]);
    }


}
