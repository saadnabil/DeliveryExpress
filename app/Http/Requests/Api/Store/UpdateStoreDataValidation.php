<?php

namespace App\Http\Requests\Api\Store;

use Illuminate\Foundation\Http\FormRequest;

class UpdateStoreDataValidation extends FormRequest
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
            'name' => ['required' , 'string'],
            'activity_id' => ['required' , 'numeric'],
            'city_id' => ['required' , 'numeric'],
            'country_id' => ['required' , 'numeric'],
            'address' => ['required','string'],
            'website' => ['required' , 'url'],
        ];
    }
}
