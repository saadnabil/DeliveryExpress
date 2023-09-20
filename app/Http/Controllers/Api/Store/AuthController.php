<?php

namespace App\Http\Controllers\Api\Store;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Store\ChangePasswordStoreValidation;
use App\Http\Requests\Api\Store\CreateStoreValidation;
use App\Http\Requests\Api\Store\LoginStoreValidation;
use App\Http\Requests\Api\Store\SendOtpValidation;
use App\Http\Requests\Api\Store\VerifyOtpValidation;
use App\Http\Traits\ApiResponseTrait;
use App\Services\Store\StoreAuthService;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    use ApiResponseTrait;

    protected $storeAuthService;

    public function __construct(StoreAuthService $storeAuthService)
    {
        $this->storeAuthService = $storeAuthService;
    }

    public function register(CreateStoreValidation $request){
        $validatedData = $request->validated();
        return $this->storeAuthService->register($validatedData);
    }

    public function login(LoginStoreValidation $request){
        $data = $request->validated();
        return $this->storeAuthService->login($data);
    }


    public function changePassword(ChangePasswordStoreValidation $request){
        $data = $request->validated();
        return $this->storeAuthService->changePassword($data);
    }



    public function logout(){
        return $this->storeAuthService->logout();
    }
}
