<?php

namespace App\Http\Requests\Api\Store;

use Illuminate\Foundation\Http\FormRequest;

class StoreShipmentStepTwoValidation extends FormRequest
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
            'client_name' => ['required','string'],
            'client_phone' => ['required','string'],
            'client_other_phone' => ['nullable','string'],
            'city_id' => ['required','numeric'],
            'country_id' =>  ['required','numeric'],
            'client_address' =>  ['required','string'],
        ];
    }
}
