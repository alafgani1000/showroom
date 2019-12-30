<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    protected $fillable = ['name', 'plan_finish_date','date_of_take'];

    public function todoDetails()
    {
        return $this->hasMany('App\TodoDetail');
    }

    public function todoAttachments()
    {
        return $this->hasOne('App\TodoAttachment');
    }
}
