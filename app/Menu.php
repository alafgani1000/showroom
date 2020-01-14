<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $fillable = ['menu_id','role_id'];

    public function roles()
    {
        return $this->belongsToMany('App\Role');
        
    }    
}
