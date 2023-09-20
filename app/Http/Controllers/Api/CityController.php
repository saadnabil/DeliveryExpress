<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Traits\ApiResponseTrait;
use App\Models\City;
use Illuminate\Http\Request;

class CityController extends Controller
{
    //
    use ApiResponseTrait;
    public function index(){
        $cities = City::get();
        return $this->sendResponse($cities);
    }
}
