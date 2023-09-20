<?php
namespace App\Services\Delivery;
use App\Helpers\FileHelper;
use App\Http\Resources\Api\Delivery\ShipmentResource;
use App\Http\Traits\ApiResponseTrait;
use App\Models\Shipment;
class ShipmentService{
    use ApiResponseTrait;

    public function index(){
        $shipments = Shipment::with(['shipmentType','images'])->where([
            'delivery_id' => auth()->user()->id,
        ])->latest()->get();
        $shipmentsRecievedByDelivery =  $shipments->filter(function($shipment){
            return $shipment->status === 'recieved_by_delivery';
        });
        $outForDelivery =  $shipments->filter(function($shipment){
            return $shipment->status === 'out_for_delivery';
        });
        $delivered =  $shipments->filter(function($shipment){
            return $shipment->status === 'delivered';
        });
        $returned =  $shipments->filter(function($shipment){
            return $shipment->status === 'returned';
        });
        $data = [
            'all' =>  ShipmentResource::collection($shipments),
            'shipmentsRecievedByDelivery' => ShipmentResource::collection($shipmentsRecievedByDelivery),
            'outForDelivery' => ShipmentResource::collection($outForDelivery),
            'delivered' => ShipmentResource::collection($delivered),
            'returned' => ShipmentResource::collection($returned),
        ];
        return $this->sendResponse($data);
    }

    public function recieve(array $data){
        $totalAmount = 0;
        $delivery_signature_uploaded = 0;
        $delivery_signature_image = null;
        foreach($data['shipment_codes'] as $shipmentCode){
            $shipment = Shipment::where([
                'delivery_id' => auth()->user()->id,
                'status' => 'in_stock',
                'shipment_code' => $shipmentCode,
            ])->first();
            if($data['delivery_signature'] && $delivery_signature_uploaded == 0){
                $delivery_signature_image = FileHelper::upload_file('uploads' , $data['delivery_signature'] );
                $delivery_signature_uploaded = 1;
            }
            $shipment->update([
                'status' => 'recieved_by_delivery',
                'delivery_signature' =>  $delivery_signature_image,
            ]);
            $totalAmount += $shipment->total_price;
            return $this->sendResponse([
                'totalAmount' => $totalAmount,
            ]);
        }
    }

    public function startDeliverShipment(array $data){
        $shipment = Shipment::where([
            'delivery_id' => auth()->user()->id,
            'status' => 'recieved_by_delivery',
            'shipment_code' => $data['shipment_code'],
        ])->first();
        if(!$shipment){
            return $this->sendResponse(['error' => 'Shipment not found !'] , 'fail' , 404);
        }
        $shipment->update([
            'status' => 'out_for_delivery',
        ]);
        return $this->sendResponse([]);
    }

    public function endDeliverShipment(array $data){
        $shipment = Shipment::where([
            'delivery_id' => auth()->user()->id,
            'status' => 'out_for_delivery',
            'shipment_code' => $data['shipment_code'],
        ])->first();
        if(!$shipment){
            return $this->sendResponse(['error' => 'Shipment not found !'] , 'fail' , 404);
        }
       $client_signature_image = FileHelper::upload_file('uploads',$data['client_signature_image']);
        $shipment->update([
            'status' => 'delivered',
            'client_signature' => $client_signature_image,
            'delivered_date' => now()
        ]);
        return $this->sendResponse([]);
    }

    public function failDeliverShipment(array $data){
        $shipment = Shipment::where([
            'delivery_id' => auth()->user()->id,
            'status' => 'out_for_delivery',
            'shipment_code' => $data['shipment_code'],
        ])->first();
        if(!$shipment){
            return $this->sendResponse(['error' => 'Shipment not found !'] , 'fail' , 404);
        }
        $shipment->update([
            'status' => 'fail',
            'cancel_reason_id' => $data['cancel_reason_id'],
            'cancel_reason_note' => $data['cancel_reason_note'],
        ]);
        return $this->sendResponse([]);
    }
}
