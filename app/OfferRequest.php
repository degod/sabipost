<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OfferRequest extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'offer_id', 'sabi_hunter_id', 'status', 'sabi_man_status', 'sabi_hunter_status'
    ];

    public function offer() {
        return $this->belongsTo('App\Offer','offer_id');
    }

    public function sabi_hunter() {
        return $this->belongsTo('App\User','sabi_hunter_id');
    }
}
