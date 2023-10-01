<?php

namespace App\Http\Controllers\Api\Delivery;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Delivery\StoreComplainValidation;
use App\Http\Resources\Api\NotificationResource;
use App\Http\Traits\ApiResponseTrait;
use App\Services\Delivery\ComplainService;
class NotificationController extends Controller
{
    use ApiResponseTrait;
    public function index(){
        $delivery = auth()->user();
        $delivery  = $delivery->load('notifications');
        return $this->sendResponse(resource_collection(NotificationResource::collection($delivery->notifications()->simplePaginate())));
    }
}
