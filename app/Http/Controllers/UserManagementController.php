<?php

namespace App\Http\Controllers;
use App\Role;
use App\Employee;
use App\User;

use Illuminate\Http\Request;

class UserManagementController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('user_management.index',compact('users'));
    }

    public function create()
    {
        $roles = Role::all();
        return view('user_management.create',compact('roles'));
    }

    public function edit($id)
    {
        $user =  User::find($id);
        return view('user_management.edit',compact('user'));
    }
    
}
