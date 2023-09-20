<?php

namespace App\Http\Resources\Api\Delivery;

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
        return[
            'shipmentCode' => $this->shipment_code,
            'shipmentPrice' => $this->shipment_price,
            'status' => $this->status,
            'deliveryFee' => $this->delivery_fee,
            'weightFee' => $this->weight_fee,
            'discountFee' => $this->discount_fee,
            'collectFee' => $this->collect_fee,
            'totalPrice' => $this->total_price,
            'breakable' => $this->breakable,
            'clientName' => $this->client_name,
            'clientAddress' => $this->client_address,
            'clientPhone' => $this->client_phone,
            'clientOtherPhone' => $this->client_other_phone,
            'shipmentType' => $this->shipmentType->type,
            'quantity' => $this->quantity,
            'description' => $this->description,
            'weight' => $this->weight,
            'paymentType' => $this->payment_type == 1 ? 'cash' : 'visa',
            'payedBy' => 'client',
            'measurementIsAllowed' => $this->measurement_is_allowed,
            'previewAllowed' => $this->preview_allowed,
            'qrCode' =>$this->qr_code_image,
            'images' => ShipmentImageResource::collection($this->images),
        ];
    }
}
