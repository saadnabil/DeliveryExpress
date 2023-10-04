<?php

namespace App\Rules;

use App\Models\Shipment;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class CheckReplacedShipmentExist implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        //
        $replacedShipment = Shipment::where([
            'id' =>  $value,
            'store_id' => auth()->user()->id,
        ])->whereIn('status', ['fail', 'returned'])->first();

        if(!$replacedShipment){
            $fail(__('translation.Replaced shipment not found'));
        }
    }
}
