<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TodoAttachment extends Model
{
    protected $fillable = ['todo_id','name','file'];
}
