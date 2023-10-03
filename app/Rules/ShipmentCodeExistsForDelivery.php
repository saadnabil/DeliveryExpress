<?php

namespace App\Rules;

use App\Models\Shipment;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class ShipmentCodeExistsForDelivery implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        //
        $shipment = Shipment::where([
            'delivery_id' => auth()->user()->id,
            'status' => 'assigned_to_delivery',
            'shipment_code' => $value,
        ])->first();
        if(!$shipment){
            $fail( __('translation.Shipment #NO is not assigned to this delivery or not found in the stock!') .'#' .$value);
        }
    }
}
