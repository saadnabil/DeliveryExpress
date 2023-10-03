<?php

namespace App\Rules;

use App\Models\CollectionRequest;
use App\Models\CollectionRequestShipment;
use App\Models\Shipment;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class ValidateCollectionRequestShipment implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        //
        $statusArr = [
            1 => ['pending'] ,
             2 =>['fail','returned']
        ];

        $shipment = Shipment::where(['id' => $value , 'store_id' => auth()->user()->id])
                             ->whereIn('status', $statusArr[request('type')])
                             ->first();

        $collectionRequestShipment = CollectionRequest::where(['type' => request('type')])
                                                      ->whereHas('CollectionRequestShipments',function($query) use($value){
                                                            $query->where('shipment_id' , $value);
                                                        })->first();

        if(!$shipment){
            $fail(__('translation.Shipment not found'));
        }
        if($collectionRequestShipment){
            $fail(__('translation.Shipment already exist in collection request'));
        }
    }
}
