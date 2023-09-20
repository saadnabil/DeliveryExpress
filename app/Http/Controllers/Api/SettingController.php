<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Traits\ApiResponseTrait;
use App\Models\Activity;
use App\Models\CancelReason;
use App\Models\City;
use App\Models\Country;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    //
    use ApiResponseTrait;
    public function index(){
        $cities = City::get();
        $countries = Country::get();
        $activities = Activity::get();
        $cancelReasons = CancelReason::get();
        $data = [
            'cities' => $cities,
            'countries' => $countries,
            'activites' => $activities,
            'cancelReasons' => $cancelReasons,
        ];
        return $this->sendResponse($data);
    }
}
