<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = ['name'];
    

    public function hasRole($roleName)
    {
        foreach($this->name as $role)
        {
            if($role === $roleName)
            {
                return true;
            }
        }

        return false;
    }
}
