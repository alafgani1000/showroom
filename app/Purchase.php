<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    protected $fillable = ['cost','product_id','purchase_date']; 

    public function product()
    {
        return $this->belongsTo('App\product');
    }
}
