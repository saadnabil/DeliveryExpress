<?php

namespace App\Http\Requests\Api\Delivery;

use Illuminate\Foundation\Http\FormRequest;

class CreateDeliveryStepOneValidation extends FormRequest
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
            'birth_date' => ['required', 'date' , 'date_format:Y/m/d'],
            'phone' => ['required', 'string','max:20'],
            'other_phone' => ['nullable', 'string','max:20'],
            'email' => ['required' , 'email','unique:deliveries,email'],
            'country_id' => ['required', 'numeric'],
            'address' => ['required', 'string'],
            'city_id' => ['required', 'numeric'],
            'id_number' => ['required', 'string'],
            'image' => ['required', 'image' , 'mimes:png,jpg,jpeg,svg'],
            'password' => ['required', 'string','min:8'],
            'repassword' => ['required', 'string','same:password'],
        ];
    }
}
