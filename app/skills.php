<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class skills extends Model
{
    protected $guarded =[];
    public function project(){
       return  $this->belongsTo('App/Projects','project_id');  //alt way of referencing with the foreign key
    }
}
