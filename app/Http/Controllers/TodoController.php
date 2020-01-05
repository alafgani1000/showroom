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
        $todo = Datatables(Todo::with('todoDetails')->get())->toJson();
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
            // upload
            $path = $request->detail['attachment'][$i]->store('attachments');

            // save data
            $todo->todoDetails()->save(
                new TodoDetail([
                    'text' => $request->detail['title'][$i],
                    'plan_finish_date' => $request->detail['detail_plan_finish'][$i],
                    'attachment' => $path
                ])
            );
        }

        return 'Success';
    }

    public function edit(Request $request)
    {
        $todo = Todo::find($request->id);
        return view('todo.edit', compact('todo'));
    }

    public function update(Request $request)
    {
        $validateDate = $request->validate([
            'todo' => 'required',
            'plan_finish_date' => 'required'
        ]);

        $todo = Todo::where('id', $request->id)->update([
            'name' => $request->todo,
            'plan_finish_date' => $request->plan_finish_date,
            'date_of_take' => NULL,
        ]);

        if(isset($request->detail))
        {
            $jumlah = $request->nilai_edit;
           
        
            for($i = 1; $i<=$jumlah; $i++){
                // upload
                $path = $request->detail['attachment'][$i]->store('attachments');

                // save data
                TodoDetail::create([
                    'todo_id' => $request->id,
                    'text' => $request->detail['title'][$i],
                    'plan_finish_date' => $request->detail['detail_plan_finish'][$i],
                    'attachment' => $path
                ]);
            }
        }

        return 'Success';
    }

    public function deleteDetail(Request $request)
    {
        $todoDetail = TodoDetail::where('id', $request->id)->delete();

        return 'Delete Success';
    }

    public function delete(Request $request)
    {
        $todo = Todo::find($request->id)->delete();

        $todoDetail = TodoDetail::where('todo_id', $request->id)->delete();

        return 'Delete Success';
    }
}
