<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LeasingContract extends Model
{
    protected $fillable = ['user_id', 'offer_id', 'start_date', 'end_date', 'total_cost'];

    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo(Users::class);
    }

    public function offer()
    {
        return $this->belongsTo(Offer::class);
    }
}
