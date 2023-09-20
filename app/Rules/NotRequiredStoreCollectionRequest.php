<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class NotRequiredStoreCollectionRequest implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {

        $type = request('type');

        if ($type == 1) {
            if (in_array($attribute, ['phone' ,'address','city_id','country_id'])) {
                $fail("The $attribute field is not required for type 1.");
            }
        }

        if ($type == 2) {
            if (in_array($attribute, ['date','time'])) {
                $fail("The $attribute field is not required for type 1.");
            }
        }

    }

}
