<?php

namespace App\Http\Resources\Api\Store;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ShipmentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $data =  [
            'shipmentCode' => $this->shipment_code,
            'qrCodeImage' => $this->qr_code_image,
            'shipmentTypeId' => $this->shipmentType->id,
            'shipmentTypeName' =>  $this->shipmentType->type,
            'status' => $this->status,
            'notes' => $this->notes,
            'clientName' => $this->client_name,
            'clientPhone' => $this->client_phone,
            'clientOtherPhone' => $this->client_other_phone,
            'clientAddress' => $this->client_address,
            'paymentType' => $this->payment_type == 1 ? 'cash' : 'visa',
            'deliveryFee' => $this->delivery_fee,
            'weightFee' => $this->weight_fee,
            'discountFee' => $this->discount_fee,
            'totalFee' => $this->total_fee,
            'collectFee' => $this->collect_fee,
            'totalPrice' => $this->total_price,
            'deliveredDate' => $this->delivered_date,
            'images' => ShipmentImageResource::collection($this->images),
            'delivery' => new DeliveryResource($this->delivery),
        ];
        if($this->shipment_type_id == 3){
            $data['money'] = $this->money;
        }
        if($this->shipment_type_id == 1 || $this->shipment_type_id == 2){
            $data['quantity'] = $this->quantity;
            $data['weight'] = $this->weight;
            $data['length'] = $this->length;
            $data['height'] = $this->height;
            $data['width'] = $this->width;
            $data['breakable'] = $this->breakable;
            $data['measurementIsAllowed'] = $this->measurement_is_allowed;
            $data['shipmentPackaging'] = $this->shipment_packaging;
            $data['previewAllowed'] = $this->preview_allowed;
            $data['shipmentPrice'] = $this->shipment_price;
            $data['description'] = $this->description;
            $data['shipmentPrice'] = $this->shipment_price;
        }
        if($this->shipment_type_id == 2){
            $data['shipmentReplacedId'] = $this->shipment_replaced_id;
            $data['shipmentReplacedReason'] = $this->shipment_replace_reason;
            $data['shipmentReplacedCode'] = $this->shipmentReplaced->shipment_code;
        }
        return $data;
    }
}
