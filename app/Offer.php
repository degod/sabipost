<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'sabi_man_id', 'sabi_hunter_id', 'description', 'type', 'initial_amount', 'counter_amount', 'status','sabi_man_status','sabi_hunter_status','file_path'
    ];

    public function sabi_man() {
        return $this->belongsTo('App\User','sabi_man_id');
    }

    public function sabi_hunter() {
        return $this->belongsTo('App\User','sabi_hunter_id');
    }
}
