<?php

namespace App\Http\Controllers\Dashboard;
use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\AddActivityValidation;
use App\Http\Requests\Dashboard\AddCityValidation;
use App\Http\Requests\Dashboard\UpdateCityValidation;
use App\Models\Activity;
use App\Models\City;
use App\Services\Dashboard\ActivityService;
use App\Services\Dashboard\CityService;

class ActivitiesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $activityService;
    function __construct(ActivityService $activityService)
    {
        $this->activityService = $activityService;
         $this->middleware('permission:activity-list', ['only' => ['index']]);
         $this->middleware('permission:activity-create', ['only' => ['create','store']]);
         $this->middleware('permission:activity-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:activity-delete', ['only' => ['destroy']]);
    }
    public function index()
    {
        return $this->activityService->index();
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return $this->activityService->create();

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AddActivityValidation $request)
    {
        $data = $request->validated();
        return $this->activityService->store($data);

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
    public function edit(Activity $activity)
    {
        return $this->activityService->edit($activity);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AddActivityValidation $request, activity $activity)
    {
        $data = $request->validated();
        return $this->activityService->update($data , $activity);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Activity $activity)
    {
        //
        return $this->activityService->destroy( $activity);

    }
}
