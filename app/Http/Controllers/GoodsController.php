<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Request\StoreGoods;
use App\Http\Request\UpdateGoods;
use App\Goods;

class GoodsController extends Controller
{
    public function index()
    {
        $goods = Goods::all();
        return view('goods.index', 'goods');
    }

    public function create()
    {
        return view('goods.create');
    }

    public function store(StoreGoods $request)
    {
        $goods = Goods::create([
            'incoming_good_id' => $request->incoming_good_id,
            'goods_code' => $request->goods_code,
            'goods_name' => $request->goods_name,
            'qty' => $request->qty,
            'unit_id' => $request->unit_id
        ]);
        return 'Success';
    }

    public function update(UpdateGoods $request)
    {
        $goods = Goods::where('id', $request->goods_id)->update([
            'incoming_good_id' => $request->incoming_good_id,
            'goods_code' => $request->goods_code,
            'goods_name' => $request->goods_name,
            'qty' => $request->qty,
            'unit_id' => $request->unit_id
        ]);
        return 'Update Success';
    }

}
