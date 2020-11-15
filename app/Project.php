<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    //
    protected $fillable=[
        'pj_name',
        'pj_type',
        'owner',
        'status',
        'pj_description',
        'user_id',
    ];

    public function users(){
        return $this->belongsToMany('App\User');
    }
    public function bugs(){
        return $this->hasMany('App\Bug');
    }
    public function comments(){
        return $this->morphMany('App\Comment','commentable');
    }

}
