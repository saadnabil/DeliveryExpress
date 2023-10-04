<?php

namespace App\Http\Controllers\Dashboard;
use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\AddDeliveryValidation;
use App\Http\Requests\Dashboard\StoreShipmentValidation;
use App\Http\Requests\Dashboard\UpdateDeliveryValidation;
use App\Http\Requests\Dashboard\UpdateShipmentValidation;
use App\Models\Delivery;
use App\Models\Shipment;
use App\Services\Dashboard\DeliveryService;
use App\Services\Dashboard\ShipmentService;
use Illuminate\Http\Request;

class ShipmentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $shipmentService;
    function __construct(ShipmentService $shipmentService)
    {
        $this->shipmentService = $shipmentService;
         $this->middleware('permission:shipment-list', ['only' => ['index']]);
         $this->middleware('permission:shipment-create', ['only' => ['create','store']]);
         $this->middleware('permission:shipment-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:shipment-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        return $this->shipmentService->index();
    }

    public function create(){
        return $this->shipmentService->create();
    }

    public function show(Shipment $shipment){
        return view('dashboard.shipments.show' ,compact('shipment'));
    }

    public function store(StoreShipmentValidation $request){
        $data = $request->validated();
        return $this->shipmentService->store($data);
    }

    public function edit(Shipment $shipment){
        return $this->shipmentService->edit($shipment);
    }

    public function update(UpdateShipmentValidation $request ,Shipment $shipment){
        $data = $request->validated();
        return $this->shipmentService->update($data , $shipment);
    }

    /**
    * Remove the specified resource from storage.
    */
    public function destroy(Shipment $shipment)
    {
        return $this->shipmentService->destroy($shipment);
    }

    public function getStoreReturnedShipments(Request $request){
        $store_id = $request->store_id;
        return $this->shipmentService->getStoreReturnedShipments($store_id);

    }
    public function assignDeliveryInStockShipment(Request $request , Shipment $shipment){
        $shipment->update([
            'status' => 'assigned_to_delivery',
            'delivery_id' => $request->delivery_id,
        ]);
        return redirect()->route('shipments.index')->with(['success' => __('translation.Delivery Assigned Successfully')]);

    }
}
