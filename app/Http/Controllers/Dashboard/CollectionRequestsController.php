<?php

namespace App\Http\Controllers\Dashboard;
use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\AddActivityValidation;
use App\Http\Requests\Dashboard\AddCancelReasonValidation;
use App\Http\Requests\Dashboard\AddCollectionRequestValidation;
use App\Http\Requests\Dashboard\AddCouponValidation;
use App\Models\Activity;
use App\Models\CancelReason;
use App\Models\CollectionRequest;
use App\Models\Coupon;
use App\Services\Dashboard\ActivityService;
use App\Services\Dashboard\CancelReasonService;
use App\Services\Dashboard\CollectionRequestService;
use App\Services\Dashboard\CouponsService;

class CollectionRequestsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $collectionRequestService;
    function __construct(CollectionRequestService $collectionRequestService)
    {
        $this->collectionRequestService = $collectionRequestService;
         $this->middleware('permission:coupon-list', ['only' => ['index']]);
         $this->middleware('permission:coupon-create', ['only' => ['create','store']]);
         $this->middleware('permission:coupon-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:coupon-delete', ['only' => ['destroy']]);
    }
    public function index()
    {
        return $this->collectionRequestService->index();
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return $this->collectionRequestService->create();

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AddCollectionRequestValidation $request)
    {
        $data = $request->validated();
        return $this->collectionRequestService->store($data);

    }

    /**
     * Display the specified resource.
     */
    public function show(CollectionRequest $collectionRequest)
    {
        //
        return $this->collectionRequestService->show($collectionRequest);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CollectionRequest $collectionRequest)
    {
        return $this->collectionRequestService->edit($collectionRequest);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AddCollectionRequestValidation $request, CollectionRequest $collectionRequest)
    {
        $data = $request->validated();
        return $this->collectionRequestService->update($data , $collectionRequest);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CollectionRequest $collectionRequest)
    {
        return $this->collectionRequestService->destroy( $collectionRequest);
    }
}
