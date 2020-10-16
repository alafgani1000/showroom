<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExitItem extends Model
{
    protected $fillable = ['location_id','incoming_goods_id','qty'];

    public function location()
    {
        return $this->belongsTo('App\Location');
    }

    public function incomingGoods()
    {
        return $this->belongsTo('App\IncomingGoods');
    }
}
