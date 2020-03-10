<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;

class EmployeeController extends Controller
{
    public function index()
    {
        $emps = Employee::all();
        return view('employee.index',compact('emps'));
    }

    public function create()
    {
        return view('employee.create');
    }

    public function store(Request $request)
    {
        $emp = Employee::create([
            'nip' => $request->nip,
            'noid' => $request->noid,
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat' => $request->alamat,
            'tempat' => $request->tempat,
            'tanggal_lahir' => $request->tanggal_lahir,
            'telp' => $request->telp,
            'email' => $request->email
        ]);

        return redirect()
            ->route('emp.index')
            ->with('success', 'Data berhasil diinput.');
    }

    public function edit($id)
    {
        $emp = Employee::find($id);
        return view('employee.edit',compact('emp'));
    }

    public function update(Request $request)
    {
        $emp = Employee::where('id',$idemp)->update([
            'nip' => $request->nip,
            'noid' => $request->noid,
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat' => $request->alamat,
            'tempat' => $request->tempat,
            'tanggal_lahir' => $request->tanggal_lahir,
            'telp' => $request->telp,
            'email' => $request->email
        ]);

        return redirect()
            ->route('emp.index')
            ->with('success', 'Data berhasil diupdate.');
    }

    public function delete(Request $request)
    {
        $emp = Employee::find($id);
        $emp->delete();

        return redirect()
            ->route('emp.index')
            ->with('success', 'Data berhasil dihapus.');        
    }
}
