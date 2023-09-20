<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CollectionRequest extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = [];
    public function store(){
        return $this->belongsTo(Store::class);
    }

    public function city(){
        return $this->belongsTo(City::class);
    }

    public function country(){
        return $this->belongsTo(Country::class);
    }
    public function CollectionRequestShipments(){
        return $this->hasMany(CollectionRequestShipment::class);
    }
}
