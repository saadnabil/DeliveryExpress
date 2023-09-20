<?php

namespace App\Http\Controllers\Api\Store;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Store\SendOtpValidation;
use App\Http\Requests\Api\Store\VerifyOtpValidation;
use App\Http\Traits\ApiResponseTrait;
use App\Services\Store\StoreOtpService;

class OtpController extends Controller
{
    use ApiResponseTrait;
    protected $storeOtpService;

    public function __construct(StoreOtpService $storeOtpService)
    {
        $this->storeOtpService = $storeOtpService;
    }

    public function verifyOtp(VerifyOtpValidation $request){
        $data = $request->validated();
        return $this->storeOtpService->verifyOtp($data);
    }

    public function sendNewOtp(SendOtpValidation $request){
        $data = $request->validated();
        return $this->storeOtpService->sendNewOtp($data);
    }
}
