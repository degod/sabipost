<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'transactionId', 'user_id', 'sabi_man_id', 'sabi_hunter_id', 'offer_description', 'offer_id', 'status'
    ];

    public function sabi_man() {
        return $this->belongsTo('App\User','sabi_man_id');
    }

    public function sabi_hunter() {
        return $this->belongsTo('App\User','sabi_hunter_id');
    }

    public function user() {
        return $this->belongsTo('App\User','user_id');
    }

    public function offer() {
        return $this->belongsTo('App\Offer','offer_id');
    }
}
