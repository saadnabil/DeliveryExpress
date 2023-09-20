<?php

namespace App\Http\Requests\Api\Store;

use Illuminate\Foundation\Http\FormRequest;

class StoreShipmentValidation extends FormRequest
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
            'shipment_type_id' => ['required','numeric'],
            'quantity' => ['required','numeric'],
            'description' => ['nullable','string'],
            'price' => ['required','numeric'],
            'money' =>['required_if:shipment_type_id,3','numeric'], //required when type is عربون
            'weight' => ['required','numeric'],
            'length' => ['required','numeric'],
            'height' => ['required','numeric'],
            'width' => ['required','numeric'],
            'breakable' => ['required','numeric'],
            'measurement_is_allowed' => ['required','numeric'],
            'shipment_packaging' => ['required','numeric'],
            'preview_allowed' => ['required','numeric'],
            'notes' => ['required','string'],
            //required when type is تبادل متعدد
            'shipment_replaced_id' =>  ['required_if:shipment_type_id,2','numeric'],
            'shipment_replace_reason' => ['required_if:shipment_type_id,2','numeric'],
            //required when type is تبادل متعدد
            'client_name' => ['required','string'],
            'client_phone' => ['required','string'],
            'client_other_phone' => ['nullable','string'],
            'city_id' => ['required','numeric'],
            'country_id' =>  ['required','numeric'],
            'client_address' =>  ['required','string'],
            'payment_type' => ['required','numeric'], //0 for cash , 1 for visa
        ];
    }
}
