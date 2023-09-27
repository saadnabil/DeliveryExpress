<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Shipment extends Model
{

    use HasFactory , SoftDeletes;
    protected $guarded =[];
    protected $date =['deleted_at'];

    public function delivery(){
        return $this->belongsTo(Delivery::class);
    }

    public function shipmentType(){
        return $this->belongsTo(ShipmentType::class);
    }

    public function images(){
        return $this->hasMAny(ShipmentImage::class);
    }

    public function cancelReason(){
        return $this->belongsTo(CancelReason::class);
    }

    public function coupon(){
        return $this->belongsTo(Coupon::class);
    }
    public function city(){
        return $this->belongsTo(City::class);
    }
    public function country(){
        return $this->belongsTo(Country::class);
    }
    public function store(){
        return $this->belongsTo(Store::class);
    }

    public function shipmentReplaced()
    {
        return $this->hasOne(Shipment::class, 'id', 'shipment_replaced_id');
    }

    function calculateShipmentInvoice(){
        $data = [
            'delivery_fee' => $this->city->shipmentPrice,
            'weight_fee' => setting('weight_fee') ?? 0,
            'collect_fee' => setting('collect_fee') ?? 0,
            'tax_fee' => setting('tax_fee') ?? 0
        ];

        $data['total_price'] =$this->shipment_price + $data['delivery_fee']  +$data['weight_fee'] +   $data['collect_fee'];
        if($this->shipment_price > 1000 && in_array($this->city->direction , ['south' , 'east']) ){
            $data['total_price']= $data['total_price'] + ($data['total_price'] * $data['tax_fee'] / 100 );
        }
       $this->update($data);
        return ;
    }

    function printShipmentInvoice(){
        $invoice =  [
            'shipmentId' =>$this->id,
            'shipmentCode' => $this->shipment_code,
            'shipmentPrice' => (double)$this->shipment_price,
            'deliveryFee' => (double) $this->delivery_fee,
            'weightFee' =>(double)$this->weight_fee,
            'collectFee' => (double)$this->collect_fee,
            'tax_fee' => $this->tax_fee. '% '. __('translation.Of Total Price'),
            'discount' =>$this->discount_fee.'%',
            'total' => (double)$this->total_price,
        ];
        return $invoice;
    }

}
