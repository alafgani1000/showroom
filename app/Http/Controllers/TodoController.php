<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
use App\Todo;
use App\TodoAttachment;
use App\TodoDetail;
use App\User;
use Datatables;

class TodoController extends Controller
{
    public function index()
    {
        return view('todo.index');
    }
    public function data()
    {
        $todo = Datatables(Todo::all())->toJson();
        return $todo;
    }
    public function store(Request $request)
    {
        $validateDate = $request->validate([
            'todo' => 'required',
            'plan_finish_date' => 'required'
        ]);

        $todo = Todo::create([
            'name' => $request->todo,
            'plan_finish_date' => $request->plan_finish_date,
            'date_of_take' => NULL,
        ]);

        $jumlah = count($request->detail);
        

        for($i = 0; $i<$jumlah; $i++){
            dd($request->detail['attachment'][$i]);
            // upload
            $path = $request->detail['attachment'][$i]->store('attachments');
            // save data
            $todo->todoDetails(
                new TodoDetail([
                    'text' => $request->detail['title'][$i],
                    'attachment' => $path
                ])
            );

        }


        
        return 'Success';
    }

}
