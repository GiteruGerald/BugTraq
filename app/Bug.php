<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bug extends Model
{
    //
    protected $fillable=[
        'title',
        'description',
        'reporter',
        'project_id',
        'assigned',
        'type',
        'due_date',
        'priority',
        'status',
    ];

    public function projects(){
        return $this->hasOne('App\Project','id','project_id');
    }
    public function users(){
        return $this->hasOne('App\User');
    }
    public function priority(){
        return $this->hasOne('App\Priority');
    }
    public function status(){
        return $this->hasOne('App\BugStatus');
    }
    public function comments(){
        return $this->morphMany('App\Comment','commentable');
    }

}
