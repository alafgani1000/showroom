<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PartChange extends Model
{
    protected $fillable = ['product_id','no_part','nama_part','biaya'];

    public function product()
    {
        return $this->belongsTo('App\Product');
    }
}
