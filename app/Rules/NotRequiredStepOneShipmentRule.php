<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class NotRequiredStepOneShipmentRule implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $shipmentTypeId = request('shipment_type_id');
        if ($shipmentTypeId == 3) {
            if (in_array($attribute, ['quantity' ,'description','shipment_price','weight','length','height','width','breakable','measurement_is_allowed','shipment_packaging','preview_allowed','images','shipment_replaced_id','shipment_replace_reason'])) {
                $fail("The $attribute field is not required for shipment type 3.");
            }
        }

        if ($shipmentTypeId == 2) {
            if (in_array($attribute, ['money'])) {
                $fail("The $attribute field is not required for shipment type 3.");
            }
        }

        if ($shipmentTypeId == 1) {
            if (in_array($attribute, ['money','shipment_replaced_id' , 'shipment_replace_reason'])) {
                $fail("The $attribute field is not required for shipment type 3.");
            }
        }
    }

}
