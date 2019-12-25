<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todo;
use App\TodoAttachment;
use App\TodoDetail;

class TodoController extends Controller
{
    public function index()
    {
        return view('todo.index');
    }
    public function store(Request $request)
    {
        $validateDate = $request->validate([
            'name' => 'required',
            'dateoftake' => 'required'
        ]);

        $todo = Todo::create([
            'name' => $request->todo,
            'plan_finish_date' => $request->dateoftake,
            'date_of_take' => $request->dateoftake,
        ]);

        foreach($request->detail as $item)
        {
            
            foreach($item as $detail)
            {
                $todo->todoDetails(
                    new TodoDetail([
                        'title' => $item
                    ])
                );
            }
            
        }
    }

}
