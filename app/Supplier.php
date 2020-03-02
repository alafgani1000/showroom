<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $fillable = ['noid','nama','alamat'];

    public function products()
    {
        return $this->hasMany('App\Product');
    }
}
