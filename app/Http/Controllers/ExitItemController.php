<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Location;
use App\IncomingGoods;
use App\ExitItem;
use Datatables;

class ExitItemController extends Controller
{
    public function index()
    {
        return view('exit_items.index');
    }

    Public function data()
    {
        $data = Datatables(ExitItem::with(['Location','IncomingGoods'])->get())->toJson();
        return $data;
    }

    public function store(Request $request)
    {
        $store = ExitItem::create([
            'location_id' => $request->location_id,
            'incoming_goods_id' => $request->incoming_goods_id,
            'qty' => $request->qty
        ]);

        return "Input Success";
    }

    public function update(Request $request)
    {
        $update = ExitItem::where('id', $request->id)->update([
            'location_id' => $request->e_location_id,
            'incoming_goods_id' => $request->e_incoming_goods_id,
            'qty' => $request->e_qty
        ]);

        return "Update Success";
    }

    public function destroy($id)
    {
        $data = ExitItem::where('id',$id)->first();

        $data = IncomingGoods::where('id',$data->incoming_goods_id)->update([

        ]);
    }
}
