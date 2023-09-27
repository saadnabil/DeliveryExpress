<?php

namespace App\Http\Controllers\Api\Store;

use App\Helpers\FileHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Store\ApplyCoupon;
use App\Http\Requests\Api\Store\ShipmentTypeValidation;
use App\Http\Requests\Api\Store\StoreCollectionRequestValidation;
use App\Http\Requests\Api\Store\StoreShipmentStepOneValidation;
use App\Http\Requests\Api\Store\StoreShipmentStepThreeValidation;
use App\Http\Requests\Api\Store\StoreShipmentStepTwoValidation;
use App\Http\Resources\Api\Store\CouponResource;
use App\Http\Traits\ApiResponseTrait;
use App\Models\CollectionRequest;
use App\Models\CollectionRequestShipment;
use App\Models\Coupon;
use App\Models\Shipment;
use App\Services\Store\CollectionRequestService;
use App\Services\Store\ShipmentService;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CollectionRequestController extends Controller
{
    use ApiResponseTrait;

    protected $collectionRequestService;

    public function __construct(CollectionRequestService $collectionRequestService)
    {
        $this->collectionRequestService =  $collectionRequestService;
    }

    public function store(StoreCollectionRequestValidation $request){
        $data = $request->validated();
        return $this->collectionRequestService->store($data);
    }

    public function shipmentsCodes(ShipmentTypeValidation $request){
        $data = $request->validated();
        if($data['type'] == 1){
            $rows = Shipment::where(['store_id' => auth()->user()->id,'status' => 'pending'])->get();
        }elseif($data['type'] == 2){
            $rows = Shipment::where(['store_id' => auth()->user()->id])->whereIn('status', ['returned','fail'])->get();
        }
        return $this->sendResponse($rows);
    }

}
