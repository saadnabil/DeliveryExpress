<?php

namespace App\Http\Controllers\Api\Delivery;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Delivery\UpdatePasswordValidation;
use App\Http\Requests\Api\Delivery\UpdatePersonalDataValidation;

use App\Http\Traits\ApiResponseTrait;

use App\Services\Delivery\ProfileService;

class ProfileController extends Controller
{
    use ApiResponseTrait;
    protected $profileService;
    public function __construct(ProfileService $profileService)
    {
        $this->profileService = $profileService;
    }
    public function show(){
        return $this->profileService->show();
    }
    public function updatePersonal(UpdatePersonalDataValidation $request ){
        $data = $request->validated();
        return $this->profileService->updatePersonal($data);
    }
    public function updatePassword(UpdatePasswordValidation $request ){
        $data = $request->validated();
        return $this->profileService->updatePassword($data);
    }
}
