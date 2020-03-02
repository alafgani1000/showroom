<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Supplier;
use App\PartChange;
use App\Purchase;

class TransactionController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('transactions.index', compact('products'));
    }

    public function create()
    {
        return view('transactions.create');
    }

    public function edit($id)
    {
        $product = Product::where('id', $id)->first();
        return view('transactions.edit', compact('product'));
    }

    public function detail($id)
    {
        $product = Product::where('id', $id)->first();
        return view('transactions.detail',compact('product'));
    }

    public function update(Request $request)
    {
        //
        $r = Supplier::find($request->idsupplier)->first();
        $r->noid = $request->input('noid');
        $r->nama = $request->input('nama');
        $r->alamat = $request->input('alamat');
        $r->save();
        
        // Carbon::parse(date_format($item['created_at'],'d/m/Y H:i:s');
        $stnk = $request->file('stnk');
        $bpkb = $request->file('bpkb');
        // upload data
        if($stnk != null) {
            $upl_stnk = $stnk->store('attchments');
        }
        if($bpkb != null) {
            $upl_bpkb =  $bpkb->store('attchments');
        }
        
        // input data file
        if($stnk != null and $bpkb != null)
        {
            $product = Product::where('id',$request->idproduct)->update([
                    'nomor_kendaraan' => $request->nokend,
                    'stnk' => $request->file('stnk'),
                    'bpkb' => $request->file('bpkb'),
                    'nama_product' => $request->nama_product,
                    'warna' => $request->warna,
                    'norangka' => $request->norangka,
                    'nomesin' => $request->nomesin
                ]);
        }elseif($stnk == null and $bpkb != null) 
        {
            
            $product = Product::where('id',$request->idproduct)->update([
                'nomor_kendaraan' => $request->nokend,
                'bpkb' => $request->file('bpkb'),
                'nama_product' => $request->nama_product,
                'warna' => $request->warna,
                'norangka' => $request->norangka,
                'nomesin' => $request->nomesin
            ]);

        }elseif($stnk != null and $bpkb == null) 
        {
            $product = Product::where('id',$request->idproduct)->update([
                'nomor_kendaraan' => $request->nokend,
                'stnk' => $request->file('stnk'),
                'nama_product' => $request->nama_product,
                'warna' => $request->warna,
                'norangka' => $request->norangka,
                'nomesin' => $request->nomesin
            ]);
        }
        elseif($stnk == null and $bpkb == null) 
        {
            $product = Product::where('id',$request->idproduct)->update([
                'nomor_kendaraan' => $request->nokend,
                'nama_product' => $request->nama_product,
                'warna' => $request->warna,
                'norangka' => $request->norangka,
                'nomesin' => $request->nomesin
            ]);
        }
             
        $jumlah = count($request->detail['nomor']); 
        // dd($jumlah);
        // dd($jumlah);   
        for($i = 0; $i<$jumlah; $i++){
                PartChange::create([
                    'product_id' => $request->idproduct,
                    'no_part' => $request->detail['nomor'][$i],
                    'nama_part' => $request->detail['nama'][$i],
                    'biaya' => $request->detail['cost'][$i],
                ]);

        }

        $purchase = Purchase::where('id',$request->idpurchase)->update([
                'cost' => $request->cost,
                'purchase_date' => $request->purchase_date
            ]);

        return redirect()
            ->route('tr.index')
            ->with('success', 'Data berhasil diupdate.');
    }

    public function store(Request $request)
    {
        //
        $r = new Supplier();
        $r->noid = $request->input('noid');
        $r->nama = $request->input('nama');
        $r->alamat = $request->input('alamat');
        $r->save();
        
        // Carbon::parse(date_format($item['created_at'],'d/m/Y H:i:s');
        $stnk = $request->file('stnk');
        $bpkb = $request->file('bpkb');
        // upload data
        $upl_stnk = $stnk->store('attchments');
        $upl_bpkb =  $bpkb->store('attchments');
        // input data file
        $product = $r->products()->save(new Product([
                'nomor_kendaraan' => $request->nokend,
                'stnk' => $upl_stnk,
                'bpkb' => $upl_stnk,
                'nama_product' => $request->nama_product,
                'warna' => $request->warna,
                'norangka' => $request->norangka,
                'nomesin' => $request->nomesin
            ]));
             
        $jumlah = count($request->detail['nomor']); 
        // dd($jumlah);   
        for($i = 0; $i<$jumlah; $i++){

            // save data
            $product->partChanges()->save(
                new PartChange([
                    'no_part' => $request->detail['nomor'][$i],
                    'nama_part' => $request->detail['nama'][$i],
                    'biaya' => $request->detail['cost'][$i],
                ])
            );
        }

        $purchase = $product->purchase()->save(
            new Purchase([
                'cost' => $request->cost,
                'purchase_date' => $request->purchase_date
            ])
        );

        return redirect()
            ->route('tr.index')
            ->with('success', 'Data berhasil diinput.');
    }
}
