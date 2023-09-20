<?php

namespace App\Http\Controllers\Dashboard;
use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\AddCityValidation;
use App\Http\Requests\Dashboard\UpdateCityValidation;
use App\Models\City;
use App\Services\Dashboard\CityService;

class CitiesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $cityService;
    function __construct(CityService $cityService)
    {
        $this->cityService = $cityService;
         $this->middleware('permission:city-list', ['only' => ['index']]);
         $this->middleware('permission:city-create', ['only' => ['create','store']]);
         $this->middleware('permission:city-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:city-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        return $this->cityService->index();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return $this->cityService->create();

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AddCityValidation $request)
    {
        $data = $request->validated();
        return $this->cityService->store($data);

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
    public function edit(City $city)
    {
        return $this->cityService->edit($city);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCityValidation $request, City $city)
    {
        $data = $request->validated();
        return $this->cityService->update($data , $city);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(City $city)
    {
        //
        return $this->cityService->destroy( $city);

    }
}
