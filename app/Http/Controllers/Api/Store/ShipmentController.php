<?php

namespace App\Http\Controllers\Api\Store;

use App\Helpers\FileHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Store\StoreShipmentStepOneValidation;
use App\Http\Requests\Api\Store\StoreShipmentStepThreeValidation;
use App\Http\Requests\Api\Store\StoreShipmentStepTwoValidation;
use App\Http\Traits\ApiResponseTrait;

use App\Services\Store\ShipmentService;
class ShipmentController extends Controller
{
    use ApiResponseTrait;
    protected $shipmentService;
    public function __construct(ShipmentService $shipmentService)
    {
        $this->shipmentService =  $shipmentService;
    }

    public function index(){
        return  $this->shipmentService->index();
    }

    public function storeStepOne(StoreShipmentStepOneValidation $request){
        $data = $request->validated();
        return  $this->shipmentService->storeStepOne($data);
    }

    public function storeStepTwo(StoreShipmentStepTwoValidation $request){
        $data = $request->validated();
        return  $this->shipmentService->storeStepTwo($data);
    }

    public function storeStepThree(StoreShipmentStepThreeValidation $request){
        $data = $request->validated();
        return  $this->shipmentService->storeStepThree($data);
    }
}
