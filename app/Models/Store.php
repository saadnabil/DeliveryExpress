<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Store extends Authenticatable
{

    use HasApiTokens,HasFactory,SoftDeletes;
    protected $guarded = [];
    protected $date = ['deleted_at'];
    protected $hidden = ['password'];
    protected $guard = ['store'];

    public function complains(): MorphMany
    {
        return $this->morphMany(Complain::class, 'complainable');
    }

    public function notifications(): MorphMany
    {
        return $this->morphMany(Notification::class,'notificationable');
    }


    public function otps(): MorphMany
    {
        return $this->morphMany(Otp::class, 'otpable');
    }

    public function city(){
        return $this->belongsTo(City::class);
    }

    public function country(){
        return $this->belongsTo(Country::class);
    }

    public function activity(){
        return $this->belongsTo(Activity::class);
    }

    public function coupons(){
        return $this->hasMany(Coupon::class);
    }
}
