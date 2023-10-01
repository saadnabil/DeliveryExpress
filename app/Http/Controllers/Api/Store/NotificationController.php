<?php

namespace App\Http\Controllers\Api\Store;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\NotificationResource;
use App\Http\Traits\ApiResponseTrait;

class NotificationController extends Controller
{
    use ApiResponseTrait;
    public function index(){
        $store = auth()->user();
        $store  = $store->load('notifications');
        return $this->sendResponse(resource_collection(NotificationResource::collection($store->notifications()->simplePaginate())));

    }
}
