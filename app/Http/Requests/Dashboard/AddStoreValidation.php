<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

class AddStoreValidation extends FormRequest
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
            'email' => ['required' , 'email'],
            'phone' => ['required' , 'string'],
            'other_phone' => ['nullable' , 'string'],
            'password' => ['required' , 'string' , 'min:8'],
            'store_name' => ['required' , 'string'],
            'address' => ['required' , 'string'],
            'website' => ['required', 'url'],
            'active' => ['required' , 'numeric' , 'min:0' , 'max:1'],
            'activity_id' => ['required' , 'numeric'],
            'city_id' => ['required' , 'numeric'],
            'country_id' => ['required' , 'numeric'],
            'image' => ['nullable' , 'image' , 'mimes:png,jpg,jpeg,svg'],
        ];
    }
}
