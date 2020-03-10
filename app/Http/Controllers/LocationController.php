<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Location;
use App\Http\Requests\StoreLocation;
use App\Http\Requests\UpdateLocation;
use Datatables;

class LocationController extends Controller
{
    public function index()
    {
        return view('locations.index', compact('locations'));
    }

    public function data()
    {
        $locs = Datatables(Location::all())->toJson();
        return $locs; 
    }

    public function create()
    {
        return view('locations.index');
    }

    public function edit($id)
    {
        $loc = Location::find($id);
        return view('locations.edit',compact('loc'));
    }

    public function store(StoreLocation $request)
    {
        $loc = Location::create([
            'text' => $request->text
        ]);
        return 'Success';
    }

    public function update(UpdateLocation $request)
    {
        $loc = Location::where('id',$request->location_id)->update([
            'text' => $request->text
        ]);
        return 'Update Success';
    }

    public function destroy(Request $request)
    {
        $del = Location::find($request->id);
        $del->delete();

        return "Delete Success";
    }
}
