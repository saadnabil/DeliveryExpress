<?php

namespace App\Http\Controllers\Dashboard;
use App\Http\Controllers\Controller;
use App\Models\Complain;
use App\Services\Dashboard\ComplainService;
class ComplainsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $complainService;
    function __construct(ComplainService $complainService)
    {
        $this->complainService = $complainService;
         $this->middleware('permission:complain-list', ['only' => ['index']]);
         $this->middleware('permission:complain-create', ['only' => ['create','store']]);
         $this->middleware('permission:complain-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:complain-delete', ['only' => ['destroy']]);
    }
    public function index()
    {
        return $this->complainService->index();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Complain $complain)
    {
        //
        return $this->complainService->destroy( $complain);

    }
}
