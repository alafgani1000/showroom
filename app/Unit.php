<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    protected $fillable = ['text'];

    public function incomingGoods()
    {
        return $this->hasMany('App\IncomingGoods');
    }
    
}
