<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
use App\Todo;
use App\TodoAttachment;
use App\TodoDetail;
use Datatables;

class TodoController extends Controller
{
    public function index()
    {
        $todo = Datatables(Todo::all())->toJson();
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
            'dateoftake' => 'required'
        ]);

        $todo = Todo::create([
            'name' => $request->todo,
            'plan_finish_date' => $request->dateoftake,
            'date_of_take' => $request->dateoftake,
        ]);

        $jumlah = count($request->detail);

        for($i = 0; $i<$jumlah; $i++){
            // upload
            $path = $request->detail['attachment'][$i]->store('attachments');
            // save data
            $todo->todoDetails(
                new TodoDetail([
                    'title' => $request->detail['title'][$i],
                    'attachment' => $path
                ])
            );
        }
        
        return 'Success';
    }

}
