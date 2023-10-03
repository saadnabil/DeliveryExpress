<?php

namespace App\Http\Requests\Api\Delivery;
use Illuminate\Foundation\Http\FormRequest;
class SearchValidation extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true ;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'query' => ['required' , 'string'],
            'status' => ['required' , 'in:assigned_to_delivery,recieved_by_delivery,out_for_delivery,delivered,fail,returned']
        ];
    }
}
