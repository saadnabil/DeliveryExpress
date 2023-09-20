<?php

namespace App\Http\Controllers\Api\Delivery;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Delivery\SendOtpValidation as DeliverySendOtpValidation;
use App\Http\Requests\Api\Delivery\VerifyOtpValidation;
use App\Http\Requests\Api\Store\SendOtpValidation;
use App\Http\Traits\ApiResponseTrait;
use App\Services\Delivery\DeliveyOtpService;
use App\Services\Store\StoreOtpService;

class OtpController extends Controller
{
    use ApiResponseTrait;
    protected $deliveryOtpService;

    public function __construct(DeliveyOtpService $deliveryOtpService)
    {
        $this->deliveryOtpService = $deliveryOtpService;
    }

    public function verifyOtp(VerifyOtpValidation $request){
        $data = $request->validated();
        return $this->deliveryOtpService->verifyOtp($data);
    }

    public function sendNewOtp(DeliverySendOtpValidation $request){
        $data = $request->validated();
        return $this->deliveryOtpService->sendNewOtp($data);
    }
}
