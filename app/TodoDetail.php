<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TodoDetail extends Model
{
    protected $fillable = ['todo_id','title','text','attachment'];
}
