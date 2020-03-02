<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PartChange;

class PartChangeController extends Controller
{
    public function destroy(Request $request)
    {
        $part = PartChange::find($request->id)->first();
        $part->delete();
    }
}
