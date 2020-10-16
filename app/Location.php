<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $fillable = ['text'];

    public function exitItems()
    {
        return $this->hasMany('App\ExitItem');
    }
}
