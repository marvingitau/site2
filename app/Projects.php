<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Projects extends Model
{
    use SoftDeletes;
    // protected $fillable=[
    //     'title','description','user_id'
    // ];
    protected $guarded =[]; //black list i.e when included the attribute will not be mass assignable
    protected $casts = [
        'skillz' => 'array',
    ];


    public function task(){
       return $this->hasMany(Tasks::class);
    }
    public function skills(){
        return $this->hasMany(skills::class);
     }

    public function admin(){
        return $this-> belongsTo(User::class);
    }
}
