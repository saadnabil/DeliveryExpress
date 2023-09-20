<?php

namespace App\Http\Requests\Api\Delivery;

use App\Rules\ShipmentCodeExistsForDelivery;
use Illuminate\Foundation\Http\FormRequest;

class FailDeliverShipmentValidation extends FormRequest
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
            'cancel_reason_id' => ['required' , 'numeric'],
            'cancel_reason_note' => ['required' , 'string'],
        ];
    }
}
