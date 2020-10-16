<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreIncomingGoods;
use App\Http\Requests\UpdateIncomingGoods;
use App\Supplier;
use App\Unit;
use App\IncomingGoods;
use Datatables;

class IncomingGoodsController extends Controller
{
    public function index()
    {
        return view('incoming_goods.index');
    }

    public function data()
    {
        $data = Datatables(IncomingGoods::with(['unit','supplier'])->get())->toJson();
        return $data;
    }

    public function dataByIncomingCode($code)
    {
        $data = Datatables(IncomingGoods::with(['unit','supplier'])->where('incoming_code', $code)->get())->toJson();
        return $data;
    }

    public function create()
    {
        $units = Unit::all();
        $suppliers = Supplier::all();
        return view('incoming_goods.create', compact('units','suppliers'));
    }

    public function store(StoreIncomingGoods $request)
    {
        $inc = IncomingGoods::create([
            'incoming_code' => ''.date('Y').date('m').date('d').Auth::user()->id.'',
            'goods_name' => $request->goods_name,
            'qty' => $request->qty,
            'price' => $request->price,
            'date_buy' => $request->date_of_buy,
            'unit_id' => $request->unit_id,
            'supplier_id' => $request->supplier_id
        ]);
        return 'Success';
    }

    public function edit($id)
    {
        $units = Unit::all();
        $suppliers = Supplier::all();
        $inc = IncomingGoods::find($id);
        return view('incoming_goods.edit', compact('inc','units','suppliers'));
    }

    public function update(UpdateIncomingGoods $request)
    {
        $update = IncomingGoods::where('id',$request->incoming_goods_id)->update([
            'goods_name' => $request->goods_name,
            'qty' => $request->qty,
            'price' => $request->price,
            'date_buy' => $request->date_of_buy,
            'unit_id' => $request->unit_id,
            'supplier_id' => $request->supplier_id

        ]);
        return 'Update Success';
    }
}
