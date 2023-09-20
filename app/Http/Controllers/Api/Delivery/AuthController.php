<?php

namespace App\Http\Controllers\Api\Delivery;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Delivery\ChangePasswordStoreValidation;
use App\Http\Requests\Api\Delivery\CreateDeliveryStepOneValidation;
use App\Http\Requests\Api\Delivery\CreateDeliveryStepThreeValidation;
use App\Http\Requests\Api\Delivery\CreateDeliveryStepTwoValidation;
use App\Http\Requests\Api\Delivery\LoginDeliveryValidation;
use App\Http\Requests\Api\Store\LoginStoreValidation;
use App\Http\Traits\ApiResponseTrait;
use App\Services\Delivery\DeliveryAuthService;
class AuthController extends Controller
{
    use ApiResponseTrait;

    protected $deliveryAuthService;

    public function __construct(DeliveryAuthService $deliveryAuthService)
    {
        $this->deliveryAuthService = $deliveryAuthService;
    }

    public function registerStepOne(CreateDeliveryStepOneValidation $request){
        $data = $request->validated();
        return $this->deliveryAuthService->registerStepOne($data);
    }

    public function registerStepTwo(CreateDeliveryStepTwoValidation $request){
        $data = $request->validated();
        return $this->deliveryAuthService->registerStepTwo($data);
    }

    public function registerStepThree(CreateDeliveryStepThreeValidation $request){
        $data = $request->validated();
        return $this->deliveryAuthService->registerStepThree($data);
    }

    public function login(LoginDeliveryValidation $request){
        $data = $request->validated();
        return $this->deliveryAuthService->login($data);
    }

    public function changePassword(ChangePasswordStoreValidation $request){
        $data = $request->validated();
        return $this->deliveryAuthService->changePassword($data);
    }

    public function logout(){
        return $this->deliveryAuthService->logout();
    }
}
