<?php

namespace App;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Bug extends Model
{
    //
    protected $fillable=[
        'title',
        'description',
        'reporter',
        'reporter_id',
        'project_id',
        'assigned',
        'type',
        'due_date',
        'priority',
        'status',
    ];

    protected $dates = ['due_date'];


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
    public function bug_attachments(){
        return $this->hasMany('App\BugAttachment');
    }
    public function getDueDateAttribute($value){
        return Carbon::parse($value)->diffForHumans();
    }
}
