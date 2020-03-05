<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    //
    protected $fillable=[
        'pj_name',
        'pj_type',
        'pj_description',
        'pj_manager',
        'user_id',
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }
    public function bugs(){
        return $this->hasMany('App\Bug');
    }

}
