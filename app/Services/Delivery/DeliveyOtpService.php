<?php
namespace App\Services\Delivery;

use App\Events\RegisterSendMailEvent;
use App\Http\Traits\ApiResponseTrait;
use App\Mail\OtpMail;
use App\Models\Delivery;
use App\Models\Otp;
use App\Models\Store;

class DeliveyOtpService {
    use ApiResponseTrait;
    public function verifyOtp(array $data){
        $delivery = Delivery::where('email',$data['email'])->first();
        if(!$delivery){
            return $this->sendResponse(['error'=>'Email not found'] , 'fail', 404);
        }
        $validOtp = $delivery->otps()->where('code', $data['otp'])->first();
        if(!$validOtp){
            return $this->sendResponse(['error'=>'Otp is not correct'] , 'fail' , 404);
        }
        $validOtp->delete();
        return $this->sendResponse([] , 'success');
    }
    public function sendNewOtp($data){
        $otpCode = generate_otp_function();
        $delivery = Delivery::where('email',$data['email'])->first();
        if(!$delivery){
            return $this->sendResponse(['error' => 'Email not found'] , 'fail', 404);
        }
        $otp = new Otp(['code' => $otpCode]);
        //delete all otps first
            $delivery->otps()->delete();
        //delete all otps first
        $delivery->otps()->save($otp);
        $emailData = [
            'otp' => $otpCode, // Replace with your OTP generation logic
            'email' => $delivery->email
        ];
        RegisterSendMailEvent::dispatch($emailData);
        return $this->sendResponse(['code' =>  $otpCode] , 'success');
    }
}
