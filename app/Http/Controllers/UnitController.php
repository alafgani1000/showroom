<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Unit;
use App\Http\Requests\StoreUnit;
use App\Http\Requests\UpdateUnit;
use Datatables;

class UnitController extends Controller
{
    public function index()
    {
        return view('units.index', compact('units'));
    }

    public function data()
    {
        $units = Datatables(Unit::all())->toJson();
        return $units; 
    }

    public function create()
    {
        return view('units.create');
    }

    public function edit($id)
    {
        $unit = Unit::find($id);
        return view('units.edit', compact('unit'));
    }

    public function store(StoreUnit $request)
    {
        $unit = Unit::create([
            'text' => $request->text
        ]);

        return 'Insert Success';
    }

    public function update(UpdateUnit $request)
    {
        $unit = Unit::where('id', $request->unit_id)->update([
            'text' => $request->text
        ]);

        return 'Update Success';
    }

    public function destroy(Request $request)
    {
        $unit = Unit::find($request->id);
        $unit->delete();

        return "Delete Success";
    }
    
}
