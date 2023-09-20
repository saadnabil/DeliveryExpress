<?php

namespace App\Rules;

use App\Models\Shipment;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class ShipmentCodesExist implements ValidationRule
{


    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $row = Shipment::where('shipment_code' , $value)->first();
        if(!$row){
            $fail("The $value is not exists");
        }
    }

}
