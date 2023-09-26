<?php

namespace App\Http\Requests\Api\Store;

use App\Rules\NotRequiredStepOneShipmentRule;
use App\Rules\NotRequiredStoreCollectionRequest;
use App\Rules\w;
use Illuminate\Foundation\Http\FormRequest;

class ShipmentTypeValidation extends FormRequest
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
        ];
    }
}
