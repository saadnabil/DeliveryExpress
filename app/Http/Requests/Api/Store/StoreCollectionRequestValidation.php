<?php

namespace App\Http\Requests\Api\Store;

use App\Rules\NotRequiredStoreCollectionRequest;
use App\Rules\ValidateCollectionRequestShipment;
use Illuminate\Foundation\Http\FormRequest;

class StoreCollectionRequestValidation extends FormRequest
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
            'type' => ['required','numeric', 'in:1,2'], //1 talab tagmee3 , talab tagmee3 bake up
            'date' => ['required_if:type,1', 'date' ,'date_format:Y/m/d' ,new NotRequiredStoreCollectionRequest],
            'time' => ['required_if:type,1', 'string', 'date_format:h:i a',new NotRequiredStoreCollectionRequest],
            'notes' => ['nullable' , 'string',new NotRequiredStoreCollectionRequest],
            'phone' => ['required_if:type,2' , 'string',new NotRequiredStoreCollectionRequest],
            'city_id' => ['required_if:type,2' , 'numeric',new NotRequiredStoreCollectionRequest],
            'country_id' => ['required_if:type,2' , 'numeric',new NotRequiredStoreCollectionRequest],
            'address' => ['required_if:type,2' , 'string',new NotRequiredStoreCollectionRequest],
            'shipments_ids' => ['required' , 'array'],
            'shipments_ids.*' => ['string',new ValidateCollectionRequestShipment],
        ];
    }
}
