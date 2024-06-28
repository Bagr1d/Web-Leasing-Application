<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Offer extends Model
{
    use SoftDeletes;

    protected $fillable = ['car_id', 'offer_name', 'monthly_payment', 'lease_term', 'reserved'];

    public function car()
    {
        return $this->belongsTo(Car::class);
    }

    public function cart()
    {
        return $this->hasOne(Cart::class);
    }

    public function leasingContracts()
    {
        return $this->hasMany(LeasingContract::class);
    }
}
