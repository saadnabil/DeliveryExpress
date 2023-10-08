<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Delivery extends Authenticatable
{
    use HasApiTokens,HasFactory,SoftDeletes;
    protected $guarded = [];
    protected $hidden = ['password'];
    protected $guard = ['delivery'];

    public function otps(): MorphMany
    {
        return $this->morphMany(Otp::class, 'otpable');
    }

    public function complains(): MorphMany
    {
        return $this->morphMany(Complain::class, 'complainable');
    }

    public function notifications(): MorphMany
    {
        return $this->morphMany(Notification::class,'notificationable');
    }

    public function city(){
        return $this->belongsTo(City::class)->withTrashed();
    }

    public function country(){
        return $this->belongsTo(Country::class)->withTrashed();
    }

    public function deliveryWorkCities(){
        return $this->hasMany(DeliveryWorkCity::class);
    }

    public function deliveryWorkTimes(){
        return $this->hasMany(DeliveryWorkTime::class);
    }

    public function shipments(){
        return $this->has(Delivery::class);
    }
}
