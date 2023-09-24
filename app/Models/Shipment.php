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

    public function shipmentReplaced(){
        return $this->hasOne(Shipment::class);
    }

}
