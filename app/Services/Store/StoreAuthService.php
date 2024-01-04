<?php
namespace App\Services\Store;

use App\Events\RegisterSendMailEvent;
use App\Http\Resources\Api\Store\StoreResource;
use App\Http\Traits\ApiResponseTrait;
use App\Mail\OtpMail;
use App\Models\Otp;
use App\Models\Store;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
class StoreAuthService {
    use ApiResponseTrait;
    
    public function register(array $data){
        $data['password'] = Hash::make($data['password']);
        $otpCode = generate_otp_function();
        $store =  Store::create($data);
        $otp = new Otp(['code' => $otpCode]);
        $store->otps()->save($otp);
        $emailData = [
            'otp' => $otpCode, // Replace with your OTP generation logic
            'email' => $data['email']
        ];
        RegisterSendMailEvent::dispatch($emailData);
        //event(new RegisterSendMailEvent($emailData));
        $store['token'] = $store->createToken('myApp')->plainTextToken;
        $store = $store->load(['activity','city' , 'country']);
        return $this->sendResponse(new StoreResource($store));
    }

    public function login(array $data){
        if(auth()->guard('store')->attempt(['password' => $data['password'],'email' => $data['email']])){
            $store = auth()->guard('store')->user();
            $store = $store->load(['activity','city' , 'country']);
            $store['token'] = $store->createToken('myApp')->plainTextToken;
            return $this->sendResponse(new StoreResource($store));
        }
        return response()->json(['message' => 'Password or email is not correct'] , 401);
    }

    public function changePassword(array $data){
        $store = Store::where([
            'email' => $data['email'],
        ])->first();

        if(!$store){
            return $this->sendResponse(['error'=>'Email not found'] , 'fail', 404);
        }
        $store->update(['password' => Hash::make($data['password'])]);
        return $this->sendResponse([] , 'success');
    }

    public function logout()
    {
        // Revoke the current user's token
        auth()->user()->tokens()->delete();
        return $this->sendResponse([] , 'success');
    }

}
