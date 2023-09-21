<?php

namespace App\Http\Controllers\Api\Store;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Store\UpdatePasswordValidation;
use App\Http\Requests\Api\Store\UpdatePersonalDataValidation;
use App\Http\Requests\Api\Store\UpdateStoreDataValidation;

use App\Http\Traits\ApiResponseTrait;

use App\Services\Store\ProfileService;

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
    public function updateStore(UpdateStoreDataValidation $request ){
        $data = $request->validated();
        return $this->profileService->updateStore($data);

    }
    public function updatePassword(UpdatePasswordValidation $request ){
        $data = $request->validated();
        return $this->profileService->updatePassword($data);
    }
    public function deleteAccount(){
        return $this->profileService->deleteAccount();

    }
}
