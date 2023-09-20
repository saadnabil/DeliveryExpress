<?php

namespace App\Http\Controllers\Dashboard;
use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\AddFaqValidation;
use App\Http\Requests\Dashboard\AddStoreValidation;
use App\Http\Requests\Dashboard\AddUserValidation;
use App\Http\Requests\Dashboard\UpdateStoreValidation;
use App\Http\Requests\Dashboard\UpdateUserValidation;
use App\Models\Complain;
use App\Models\Store;
use App\Models\User;
use App\Services\Dashboard\ComplainService;
use App\Services\Dashboard\StoreService;
use App\Services\Dashboard\UserService;
use Spatie\Permission\Models\Role;

class StoresController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $storeService;
    function __construct(StoreService $storeService)
    {
        $this->storeService = $storeService;
         $this->middleware('permission:store-list', ['only' => ['index']]);
         $this->middleware('permission:store-create', ['only' => ['create','store']]);
         $this->middleware('permission:store-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:store-delete', ['only' => ['destroy']]);
    }
    public function index()
    {
        return $this->storeService->index();
    }

    public function create(){
        return $this->storeService->create();
    }

    public function store(AddStoreValidation $request){
        $data = $request->validated();
        return $this->storeService->store($data);
    }

    public function edit(Store $store){

        return $this->storeService->edit($store);
    }

    public function update(UpdateStoreValidation $request ,Store $store){
        $data = $request->validated();
        return $this->storeService->update($data , $store);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Store $store)
    {
        return $this->storeService->destroy($store);
    }
}
