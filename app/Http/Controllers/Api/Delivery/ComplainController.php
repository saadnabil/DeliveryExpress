<?php

namespace App\Http\Controllers\Api\Delivery;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Delivery\StoreComplainValidation;
use App\Http\Traits\ApiResponseTrait;
use App\Services\Delivery\ComplainService;
class ComplainController extends Controller
{
    use ApiResponseTrait;
    protected $complainService;
    public function __construct(ComplainService $complainService)
    {
        $this->complainService = $complainService;
    }

    public function store(StoreComplainValidation $request ){
        $data = $request->validated();
        return $this->complainService->store($data);
    }

}
