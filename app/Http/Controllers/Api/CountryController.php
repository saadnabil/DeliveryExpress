<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Traits\ApiResponseTrait;
use App\Models\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    //
    use ApiResponseTrait;
    public function index(){
        $countries = Country::get();
        return $this->sendResponse($countries);
    }
}
