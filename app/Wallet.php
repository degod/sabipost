<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id','type', 'description', 'transaction_id', 'amount'
    ];

    public function user() {
        return $this->belongsTo('App\User','user_id');
    }

    public function transaction() {
        return $this->belongsTo('App\Transaction','transaction_id');
    }
}
