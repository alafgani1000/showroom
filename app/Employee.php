<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = ['nip','noid','nama','jenis_kelamin','alamat','tempat','tanggal_lahir','alamat','telp','email'];
}
