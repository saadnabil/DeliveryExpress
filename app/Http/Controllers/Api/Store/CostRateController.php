<?php

namespace App\Http\Controllers\Api\Store;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Store\CalculateCostRateValidation;
use App\Http\Traits\ApiResponseTrait;
use App\Models\City;
use App\Models\Faq;
use Illuminate\Http\Request;

class CostRateController extends Controller
{
    use ApiResponseTrait;
    protected $collectionRequestService;
    public function calculateCostRate(CalculateCostRateValidation $request){
        $data = $request->validated();
        $city = City::find($data['city_id']);
        if(!$city){
            return $this->sendResponse(['error' => 'City not found !'] , 'fail' , 404);
        }
        $weightPrice = 10; //constant
        $result = ( $data['weight'] *  $weightPrice )  + ( $city-> shipmentPrice );
        return $this->sendResponse([
            'shipmentCostRate' => $result,
        ]);
    }
}
