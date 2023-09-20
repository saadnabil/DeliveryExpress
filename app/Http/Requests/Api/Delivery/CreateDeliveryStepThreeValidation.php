<?php

namespace App\Http\Requests\Api\Delivery;

use Illuminate\Foundation\Http\FormRequest;

class CreateDeliveryStepThreeValidation extends FormRequest
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
            'days' => ['required','array'],
            'days.*.day' => ['required','distinct',  'string' ,'in:Sunday,Monday,Tuesday,Wednesday,Thursday,Friday,Saturday'],
            'days.*.start_time' => ['required','string' ,'date_format:h:i a'],
            'days.*.end_time' => ['required','string' ,'date_format:h:i a'],
        ];
    }
}
