<?php

namespace App\Http\Requests\Api\Delivery;

use App\Rules\ShipmentCodeExistsForDelivery;
use Illuminate\Foundation\Http\FormRequest;

class EndDeliverShipmentValidation extends FormRequest
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
            'shipment_code' => ['required' , 'string'],
            'client_signature_image' => ['required', 'image' , 'mimes:png,jpg,jpeg,svg'],
        ];
    }
}
