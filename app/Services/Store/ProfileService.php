<?php
namespace App\Services\Store;

use App\Helpers\FileHelper;
use App\Http\Resources\Api\Store\ProfileResource;
use App\Http\Traits\ApiResponseTrait;
use App\Models\Activity;
use App\Models\City;
use App\Models\Country;
use Illuminate\Support\Facades\Hash;

class ProfileService{
    use ApiResponseTrait;

    public function show(){
        $store = auth()->user();
        $store = $store->load('activity','city','country');

        $responseData = [
            'store' => new ProfileResource($store),
        ];
        return $this->sendResponse($responseData);
    }
    public function updatePersonal(array $data){
        $store = auth()->user();
        if(!isset($data['other_phone'])){
            $data['other_phone'] = null;
        }
        if(isset($data['image'])){
            $imagename = FileHelper::update_file('uploads' ,$data['image'], $store ->image );
            $data['image'] = $imagename;
        }
        $store->update($data);
        return $this->sendResponse([]);
    }

    public function updateStore(array $data){
        $store = auth()->user();
        $store->update($data);
        return $this->sendResponse([]);

    }

    public function updatePassword(array $data){
        $store = auth()->user();
        $store->update([
            'password' => Hash::make($data['password']),
        ]);
        return $this->sendResponse([]);
    }

}
