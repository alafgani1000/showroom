<?php

namespace App\Role;
use App\Role as RoleApp;

class Role
{
    public function hasRole($param)
    {
        return RoleApp::find($param);
    }

    public function hasRoles(array $param)
    {
        return RoleApp::whereIn('id',$param);
    }

    public function getRoles()
    {
        
    }
}