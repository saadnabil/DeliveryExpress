<?php

namespace App\Http\Controllers\Dashboard;
use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\AddActivityValidation;
use App\Http\Requests\Dashboard\AddCityValidation;
use App\Http\Requests\Dashboard\AddFaqValidation;
use App\Http\Requests\Dashboard\UpdateCityValidation;
use App\Models\Activity;
use App\Models\City;
use App\Models\Faq;
use App\Services\Dashboard\ActivityService;
use App\Services\Dashboard\CityService;
use App\Services\Dashboard\FaqService;

class FaqsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $faqService;
    function __construct(FaqService $faqService)
    {
        $this->faqService = $faqService;
         $this->middleware('permission:faq-list', ['only' => ['index']]);
         $this->middleware('permission:faq-create', ['only' => ['create','store']]);
         $this->middleware('permission:faq-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:faq-delete', ['only' => ['destroy']]);
    }
    public function index()
    {
        return $this->faqService->index();
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return $this->faqService->create();

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AddFaqValidation $request)
    {
        $data = $request->validated();
        return $this->faqService->store($data);

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
    public function edit(Faq $faq)
    {
        return $this->faqService->edit($faq);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AddFaqValidation $request, Faq $faq)
    {
        $data = $request->validated();
        return $this->faqService->update($data , $faq);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Faq $faq)
    {
        //
        return $this->faqService->destroy( $faq);

    }
}
