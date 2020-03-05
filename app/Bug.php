<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bug extends Model
{
    //
    protected $fillable=[
        'description',
        'title',
        'reporter',
        'project_id',
        'assigned',
        'type',
        'due_date',
        'priority',
        'status',
    ];

    public function projects(){
        $this->belongsTo('App\Models\Project');
    }
    public function users(){
        $this->hasOne('App\Models\User');
    }
    public function priority(){
        $this->hasOne('App\Models\Priority');
    }
    public function status(){
        $this->hasOne('App\Models\BugStatus');
    }
}
