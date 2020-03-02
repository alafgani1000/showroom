<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['nomor_kendaraan','stnk','bpkb','supplier_id','nama_product','warna','merk','nomesin','norangka'];

    public function supplier()
    {
        return $this->belongsTo('App\Supplier');
    }

    public function partChanges()
    {
        return $this->hasMany('App\PartChange');
    }

    public function purchase()
    {
        return $this->hasOne('App\Purchase');
    }
}
