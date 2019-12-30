<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TodoDetail extends Model
{
    protected $fillable = ['todo_id','title','attachment'];

    public function todo()
    {
        return $this->belongsTo('App\Todo');
    }
}
