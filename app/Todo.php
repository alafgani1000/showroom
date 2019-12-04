<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    protected $fillable = ['nama', 'plan_finish_date','date_of_take'];
}
