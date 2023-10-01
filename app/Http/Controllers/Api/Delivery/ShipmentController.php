<?php

namespace App\Http\Controllers\Api\Delivery;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Delivery\EndDeliverShipmentValidation;
use App\Http\Requests\Api\Delivery\RecieveShipmentValidation;
use App\Http\Requests\Api\Delivery\StartDeliverShipmentValidation;
use App\Http\Requests\Api\Delivery\FailDeliverShipmentValidation;
use App\Http\Requests\Api\Delivery\SearchValidation;
use App\Http\Traits\ApiResponseTrait;
use App\Models\Shipment;
use App\Services\Delivery\ShipmentService;
class ShipmentController extends Controller
{
    use ApiResponseTrait;
    protected $shipmentService;
    public function __construct(ShipmentService $shipmentService)
    {
        $this->shipmentService =  $shipmentService;
    }
    public function index(){
        return $this->shipmentService->index();
    }
    public function recieve(RecieveShipmentValidation $request){
        $data = $request->validated();
        return $this->shipmentService->recieve($data);
    }

    public function startDeliverShipment(StartDeliverShipmentValidation $request){
        $data = $request->validated();
        return $this->shipmentService->startDeliverShipment($data);
    }
    public function endDeliverShipment(EndDeliverShipmentValidation $request){
        $data = $request->validated();
        return $this->shipmentService->endDeliverShipment($data);
    }
    public function failDeliverShipment(FailDeliverShipmentValidation $request){
        $data = $request->validated();
        return $this->shipmentService->failDeliverShipment($data);
    }

    public function shipmentInvoice(){
        $delivery = auth()->user();
        $shipmentsAssignedToDelivery = Shipment::where([
            'delivery_id' =>  $delivery->id,
            'status' => 'recieved_by_delivery',
        ])->get();
        $shipmentsDelivered = Shipment::where([
            'delivery_id' =>  $delivery->id,
            'status' => 'delivered',
        ])->get();
        $data = [
            'totalCount' => count($shipmentsAssignedToDelivery),
            'totalPrice' => $shipmentsAssignedToDelivery->sum('total_price'),
            'deliveredCount' => count($shipmentsDelivered),
            'deliveredPrice' =>  $shipmentsDelivered->sum('total_price'),
        ];
        return response()->json($data );
    }

    public function search(SearchValidation $request)
    {
        $data = $request->validated();
        return $this->shipmentService->search($data);
    }
}
