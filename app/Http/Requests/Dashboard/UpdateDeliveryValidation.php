<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDeliveryValidation extends FormRequest
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
            'password' => ['nullable' , 'string' , 'min:8'],
            'id_number' => ['required' , 'string'],
            'birth_date' => ['required' , 'string'],
            'address' => ['required' , 'string'],
            'active' => ['required' , 'numeric' , 'min:0' , 'max:1'],
            'city_id' => ['required' , 'numeric'],
            'country_id' => ['required' , 'numeric'],
            'image' => ['nullable' , 'image' , 'mimes:png,jpg,jpeg,svg'],
            'city' => ['required','array','min:1'],
            'city.*' => ['numeric'],
            'worktimes' => ['required' , 'array','min:1'],
            'worktimes.*.start_time' => ['nullable','string'],
            'worktimes.*.end_time' => ['nullable','string'],
            'worktimes.*.day' => ['nullable','string'],
        ];
    }
}
