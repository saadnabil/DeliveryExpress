<?php

namespace App\Http\Controllers\Dashboard;
use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\AddDeliveryValidation;
use App\Http\Requests\Dashboard\UpdateDeliveryValidation;
use App\Models\Delivery;
use App\Services\Dashboard\DeliveryService;
use App\Services\Dashboard\ShipmentService;

class ShipmentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $shipmentService;
    function __construct(ShipmentService $shipmentService)
    {
        $this->shipmentService = $shipmentService;
         $this->middleware('permission:store-list', ['only' => ['index']]);
         $this->middleware('permission:store-create', ['only' => ['create','store']]);
         $this->middleware('permission:store-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:store-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        return $this->shipmentService->index();
    }

    public function create(){
        return $this->shipmentService->create();
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
