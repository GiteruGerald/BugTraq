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
        'user_id',
    ];

    public function user(){
        return $this->belongsToMany('App\User');
    }
    public function bugs(){
        return $this->hasMany('App\Bug');
    }
    public function comments(){
        return $this->morphMany('App\Comment','commentable');
    }
}
