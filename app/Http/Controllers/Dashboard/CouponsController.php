<?php

namespace App\Http\Controllers\Dashboard;
use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\AddActivityValidation;
use App\Http\Requests\Dashboard\AddCancelReasonValidation;
use App\Http\Requests\Dashboard\AddCouponValidation;
use App\Models\Activity;
use App\Models\CancelReason;
use App\Models\Coupon;
use App\Services\Dashboard\ActivityService;
use App\Services\Dashboard\CancelReasonService;
use App\Services\Dashboard\CouponsService;

class CouponsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $couponsService;
    function __construct(CouponsService $couponsService)
    {
        $this->couponsService = $couponsService;
         $this->middleware('permission:coupon-list', ['only' => ['index']]);
         $this->middleware('permission:coupon-create', ['only' => ['create','store']]);
         $this->middleware('permission:coupon-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:coupon-delete', ['only' => ['destroy']]);
    }
    public function index()
    {
        return $this->couponsService->index();
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return $this->couponsService->create();

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AddCouponValidation $request)
    {
        $data = $request->validated();
        return $this->couponsService->store($data);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Coupon $coupon)
    {
        return $this->couponsService->edit($coupon);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AddCouponValidation $request, Coupon $coupon)
    {
        $data = $request->validated();
        return $this->couponsService->update($data , $coupon);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Coupon $coupon)
    {
        return $this->couponsService->destroy( $coupon);
    }
}
