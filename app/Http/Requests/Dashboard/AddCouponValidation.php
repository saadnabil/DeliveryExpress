<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

class AddCouponValidation extends FormRequest
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
            'expire_date' => ['required' , 'string'],
            'discount' => ['required' , 'numeric','min:1','max:100'],
            'store_id' => ['required' , 'numeric'],
            'title' => ['required' , 'string','max:20'],
        ];
    }
}
