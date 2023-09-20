<?php

namespace App\Http\Controllers\Dashboard;
use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\AddDeliveryValidation;
use App\Http\Requests\Dashboard\AddFaqValidation;
use App\Http\Requests\Dashboard\AddStoreValidation;
use App\Http\Requests\Dashboard\AddUserValidation;
use App\Http\Requests\Dashboard\UpdateDeliveryValidation;
use App\Http\Requests\Dashboard\UpdateStoreValidation;
use App\Http\Requests\Dashboard\UpdateUserValidation;
use App\Models\Complain;
use App\Models\Delivery;
use App\Models\Store;
use App\Models\User;
use App\Services\Dashboard\ComplainService;
use App\Services\Dashboard\DeliveryService;
use App\Services\Dashboard\StoreService;
use App\Services\Dashboard\UserService;
use Spatie\Permission\Models\Role;

class DeliveriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $deliveryService;
    function __construct(DeliveryService $deliveryService)
    {
        $this->deliveryService = $deliveryService;
         $this->middleware('permission:store-list', ['only' => ['index']]);
         $this->middleware('permission:store-create', ['only' => ['create','store']]);
         $this->middleware('permission:store-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:store-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        return $this->deliveryService->index();
    }

    public function create(){
        return $this->deliveryService->create();
    }

    public function store(AddDeliveryValidation $request){
        $data = $request->validated();
        return $this->deliveryService->store($data);
    }

    public function edit(Delivery $delivery){
        return $this->deliveryService->edit($delivery);
    }

    public function update(UpdateDeliveryValidation $request ,Delivery $delivery){
        $data = $request->validated();
        return $this->deliveryService->update($data , $delivery);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Delivery $delivery)
    {
        return $this->deliveryService->destroy($delivery);
    }
}
