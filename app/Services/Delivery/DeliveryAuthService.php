<?php
namespace App\Services\Delivery;

use App\Events\RegisterSendMailEvent;
use App\Helpers\FileHelper;
use App\Http\Resources\Api\Delivery\DeliveryResource;
use App\Http\Resources\Api\Store\StoreResource;
use App\Http\Traits\ApiResponseTrait;
use App\Models\Delivery;
use App\Models\DeliveryWorkCity;
use App\Models\DeliveryWorkTime;
use App\Models\Otp;
use App\Models\Store;
use Illuminate\Support\Facades\Hash;
class DeliveryAuthService {
    use ApiResponseTrait;

    public function registerStepOne(array $data){
        $data['password'] = Hash::make($data['password']);
        $otpCode = generate_otp_function();
        if(isset($data['image'])){
            $imagename = FileHelper::upload_file('uploads' ,$data['image']);
            $data['image'] = $imagename;
        }
        unset($data['repassword']);
        $delivery =  Delivery::create($data);
        $otp = new Otp(['code' => $otpCode]);
        $delivery->otps()->save($otp);
        $emailData = [
            'otp' => $otpCode, // Replace with your OTP generation logic
            'email' => $data['email']
        ];
        RegisterSendMailEvent::dispatch($emailData);
        $delivery['token'] = $delivery->createToken('myApp')->plainTextToken;
        $delivery = $delivery->load(['city' , 'country']);
        return $this->sendResponse(new DeliveryResource($delivery));
    }

    public function registerStepTwo(array $data){
        $delivery = auth()->user();
        foreach ($data['cities_ids'] as $cityId) {
            DeliveryWorkCity::create([
                'city_id' => $cityId,
                'delivery_id' => $delivery->id
            ]);
        }
        return $this->sendResponse(new DeliveryResource($delivery));
    }

    public function registerStepThree(array $data){
        $delivery = auth()->user();
        foreach ($data['days'] as $day) {
            DeliveryWorkTime::create([
                'day' => $day['day'],
                'start_time' => $day['start_time'],
                'end_time' => $day['end_time'],
                'delivery_id' => auth()->user()->id,
            ]);
        }
        $delivery->update(['verified' => 1]);
        return $this->sendResponse(new DeliveryResource($delivery));
    }

    public function login(array $data){
        if(auth()->guard('delivery')->attempt(['password' => $data['password'],'email' => $data['email']])){
            $delivery = auth()->guard('delivery')->user();
            $delivery['token'] = $delivery->createToken('myApp')->plainTextToken;
            return $this->sendResponse(new DeliveryResource($delivery));
        }
        return response()->json(['message' => 'Password or email is not correct'] , 401);
    }

    public function changePassword(array $data){
        $delivery = Delivery::where([
            'email' => $data['email'],
        ])->first();
        if(!$delivery){
            return $this->sendResponse(['error'=>'Email not found'] , 'fail', 404);
        }
        $delivery->update(['password' => Hash::make($data['password'])]);
        return $this->sendResponse([] , 'success');
    }

    public function logout()
    {
        // Revoke the current user's token
        auth()->user()->tokens()->delete();
        return $this->sendResponse([] , 'success');
    }

}
