<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IncomingGoods extends Model
{
    protected $fillable = ['incoming_code','goods_name','qty','price','date_of_buy','unit_id','supplier_id'];

    public function unit()
    {
        return $this->belongsTo('App\Unit');
    }

    public function supplier()
    {
        return $this->belongsTo('App\Supplier');
    }
}
