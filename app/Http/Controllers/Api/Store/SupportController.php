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
        $data['faqs'] = Faq::where('application' , 'storeApplication')->get();
        $data['email'] = setting('email');
        $data['phone'] = setting('phone');
        return $this->sendResponse($data);
    }
}
