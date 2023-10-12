<?php

namespace App\Http\Requests\Api\Delivery;

use Illuminate\Foundation\Http\FormRequest;

class CreateDeliveryStepTwoValidation extends FormRequest
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
        return response()->json(request()->cities_ids);
        return [
            'cities_ids' => ['required','array'],
            'cities_ids.*' => ['numeric'],
        ];
    }
}
