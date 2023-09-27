<?php

namespace App\Rules;

use App\Models\Coupon;
use Carbon\Carbon;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class ValidateCoupon implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $coupon = Coupon::where([
            'id' => $value,
            'store_id' => auth()->user()->id,
        ])->first();

        if(!$coupon){
            $fail( __('translation.Coupon not found') );
        }

        elseif (Carbon::parse($coupon->expire_date)->isPast() || $coupon->is_used == 1) {
            $fail( __('translation.Coupon is expired') );
        }
    }
}
