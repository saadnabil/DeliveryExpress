<?php

namespace App\Http\Controllers\Api\Store;

use App\Http\Controllers\Controller;
use App\Http\Traits\ApiResponseTrait;
use App\Models\Faq;


class SupportController extends Controller
{
    use ApiResponseTrait;
    protected $collectionRequestService;
    public function index(){
        $rows = Faq::where('application' , 'storeApplication')->get();
        return $this->sendResponse($rows);
    }
}
