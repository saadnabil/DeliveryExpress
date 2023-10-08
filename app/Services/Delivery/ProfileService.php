<?php
namespace App\Services\Delivery;

use App\Helpers\FileHelper;
use App\Http\Resources\Api\Delivery\ProfileResource;
use App\Http\Traits\ApiResponseTrait;
use App\Models\Activity;
use App\Models\City;
use App\Models\Country;
use Illuminate\Support\Facades\Hash;

class ProfileService{
    use ApiResponseTrait;

    public function show(){
        $delivery = auth()->user();
        $delivery = $delivery->load('city','country');
        $cities = City::get();
        $countries = Country::get();
        $activities = Activity::get();
        $termsAndConditions = setting('terms_conditions');
        $privacyPolicy = setting('privacy_policy');
        $responseData = [
            'delivery' => new ProfileResource($delivery),
            'termsAndConditions' => $termsAndConditions,
            'privacyPolicy' => $privacyPolicy,
            'cities' => $cities,
            'countries' => $countries,
        ];
        return $this->sendResponse($responseData);
    }

    public function updatePersonal(array $data){
        $delivery = auth()->user();
        if(!isset($data['other_phone'])){
            $data['other_phone'] = null;
        }
        if(isset($data['image'])){
            $imagename = FileHelper::update_file('uploads' ,$data['image'], $delivery ->image );
            $data['image'] = $imagename;
        }
        $delivery->update($data);
        return $this->sendResponse([]);
    }


    public function updatePassword(array $data){
        $delivery = auth()->user();
        $delivery->update([
            'password' => Hash::make($data['password']),
        ]);
        return $this->sendResponse([]);
    }

    public function deleteAccount(){
        $delivery = auth()->user();
        $delivery ->tokens()->delete();
        $delivery->delete();
        return $this->sendResponse([]);
    }

}
