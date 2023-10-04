<?php

namespace App\Http\Requests\Api\Store;

use App\Rules\CheckReplacedShipmentExist;
use App\Rules\NotRequiredStepOneShipmentRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreShipmentStepOneValidation extends FormRequest
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
            'quantity' => ['required_if:shipment_type_id,1','required_if:shipment_type_id,2',new NotRequiredStepOneShipmentRule,'numeric'],
            'description' => ['required_if:shipment_type_id,1','required_if:shipment_type_id,2',new NotRequiredStepOneShipmentRule,'string'],
            'shipment_price' => ['required_if:shipment_type_id,1','required_if:shipment_type_id,2',new NotRequiredStepOneShipmentRule,'numeric'],
            'weight' => ['required_if:shipment_type_id,1','required_if:shipment_type_id,2',new NotRequiredStepOneShipmentRule, 'numeric'],
            'length' => ['required_if:shipment_type_id,1','required_if:shipment_type_id,2',new NotRequiredStepOneShipmentRule, 'numeric'],
            'height' => ['required_if:shipment_type_id,1','required_if:shipment_type_id,2',new NotRequiredStepOneShipmentRule, 'numeric'],
            'width' => ['required_if:shipment_type_id,1','required_if:shipment_type_id,2',new NotRequiredStepOneShipmentRule, 'numeric'],
            'breakable' => ['required_if:shipment_type_id,1','required_if:shipment_type_id,2',new NotRequiredStepOneShipmentRule,'numeric'],
            'measurement_is_allowed' => ['required_if:shipment_type_id,1','required_if:shipment_type_id,2',new NotRequiredStepOneShipmentRule,'numeric'],
            'shipment_packaging' => ['required_if:shipment_type_id,1','required_if:shipment_type_id,2',new NotRequiredStepOneShipmentRule,'numeric'],
            'preview_allowed' => ['required_if:shipment_type_id,1','required_if:shipment_type_id,2',new NotRequiredStepOneShipmentRule,'numeric'],
            'images' => ['required_if:shipment_type_id,1','required_if:shipment_type_id,2',new NotRequiredStepOneShipmentRule , 'array'],
            'images.*' => [ 'image' , 'mimes:png,jpg,jpeg,svg'],
            'notes' => ['required','string'],
            'money' =>['required_if:shipment_type_id,3',new NotRequiredStepOneShipmentRule,'numeric'], //required when type is عربون
            //required when type is تبادل متعدد
            'shipment_replaced_id' =>  ['required_if:shipment_type_id,2',new NotRequiredStepOneShipmentRule,new CheckReplacedShipmentExist,'numeric'],
            'shipment_replace_reason' => ['required_if:shipment_type_id,2',new NotRequiredStepOneShipmentRule,'string'],
            //required when type is تبادل متعدد
        ];
    }
}
