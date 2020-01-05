<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TodoDetail extends Model
{
    protected $fillable = ['todo_id','text','attachment','plan_finish_date','finish_date'];

    public function todo()
    {
        return $this->belongsTo('App\Todo');
    }
}
