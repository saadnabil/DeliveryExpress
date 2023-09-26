<?php

namespace App\Http\Requests\Api\Store;

use App\Rules\ValidateCoupon;
use App\Rules\ValidateCouponBelongToStore;
use Illuminate\Foundation\Http\FormRequest;

class ApplyCoupon extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'shipment_id' => ['required' , 'numeric'],
            'coupon_id' => ['required' , 'numeric' , new ValidateCoupon()],
        ];
    }
}
