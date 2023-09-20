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
class StoreOtpService {
    use ApiResponseTrait;

    public function verifyOtp(array $data){
        $store = Store::where('email',$data['email'])->first();
        if(!$store){
            return $this->sendResponse(['error'=>'Email not found'] , 'fail', 404);
        }
        $validOtp = $store->otps()->where('code', $data['otp'])->first();
        if(!$validOtp){
            return $this->sendResponse(['error'=>'Otp is not correct'] , 'fail' , 404);
        }
        $validOtp->delete();
        $store->update([ 'verified' => 1 ]);
        return $this->sendResponse([] , 'success');
    }

    public function sendNewOtp($data){
        $otpCode = generate_otp_function();
        $store = Store::where('email',$data['email'])->first();
        if(!$store){
            return $this->sendResponse(['error' => 'Email not found'] , 'fail', 404);
        }
        $otp = new Otp(['code' => $otpCode]);
        //delete all otps first
            $store->otps()->delete();
        //delete all otps first
        $store->otps()->save($otp);
        $emailData = [
            'otp' => $otpCode, // Replace with your OTP generation logic
            'email' => $store->email
        ];
        RegisterSendMailEvent::dispatch($emailData);
        return $this->sendResponse(['code' =>  $otpCode] , 'success');
    }



}
