<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controller\Todo;
use App\Http\Controller\TodoAttachment;
use App\Http\Controller\TodoDetail;

class TodoController extends Controller
{
    public function create(Request $request)
    {
        Todo::create([
            'name' => $request->name,
            'plan_finish_date' => $request->plan_finish_date,
            'date_of_take' => $request->date_of_take,
        ]);
    }

    
}
