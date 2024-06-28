<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Users;
use App\Models\Offer;

class Cart extends Model
{
    public $timestamps = false;
    
    protected $fillable = ['user_id', 'offer_id', 'status'];

    public function user()
    {
        return $this->belongsTo(Users::class);
    }

    public function offer()
    {
        return $this->belongsTo(Offer::class);
    }
}
