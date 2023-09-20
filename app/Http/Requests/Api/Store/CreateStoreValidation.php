<?php

namespace App\Http\Requests\Api\Store;

use Illuminate\Foundation\Http\FormRequest;

class CreateStoreValidation extends FormRequest
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
            'name' => ['required','string','max:50'],
            'email' => ['required' , 'email','unique:stores,email'],
            'phone' => ['required', 'string','max:20'],
            'other_phone' => ['nullable', 'string','max:20'],
            'password' => ['required', 'string','min:8'],
            'store_name' => ['required', 'string'],
            'address' => ['required', 'string'],
            'website' => ['required', 'url'],
            'activity_id' => ['required', 'numeric'],
            'city_id' => ['required', 'numeric'],
            'country_id' => ['required', 'numeric'],
        ];
    }
}
