<?php

namespace App\Http\Controllers\Dashboard;
use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\AddActivityValidation;
use App\Http\Requests\Dashboard\AddCancelReasonValidation;
use App\Models\Activity;
use App\Models\CancelReason;
use App\Services\Dashboard\ActivityService;
use App\Services\Dashboard\CancelReasonService;

class CancelReasonsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $cancelReasonService;
    function __construct(CancelReasonService $cancelReasonService)
    {
        $this->cancelReasonService = $cancelReasonService;
         $this->middleware('permission:cancelReason-list', ['only' => ['index']]);
         $this->middleware('permission:cancelReason-create', ['only' => ['create','store']]);
         $this->middleware('permission:cancelReason-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:cancelReason-delete', ['only' => ['destroy']]);
    }
    public function index()
    {
        return $this->cancelReasonService->index();
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return $this->cancelReasonService->create();

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AddCancelReasonValidation $request)
    {
        $data = $request->validated();
        return $this->cancelReasonService->store($data);

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
    public function edit(CancelReason $cancelReason)
    {
        return $this->cancelReasonService->edit($cancelReason);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AddCancelReasonValidation $request, CancelReason $cancelReason)
    {
        $data = $request->validated();
        return $this->cancelReasonService->update($data , $cancelReason);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CancelReason $cancelReason)
    {
        //
        return $this->cancelReasonService->destroy( $cancelReason);

    }
}
