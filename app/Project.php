<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
   // use SoftDeletes;
    //
    protected $fillable=[
        'pj_name',
        'pj_type',
        'owner',
        'status',
        'pj_description',
        'user_id',
    ];
    protected $dates=['created_at'];

    public function users(){
        return $this->belongsToMany('App\User');
    }
    public function bugs(){
        return $this->hasMany('App\Bug');
    }
    public function comments(){
        return $this->morphMany('App\Comment','commentable');
    }
    public function getCreatedAtAttribute($value){
        return Carbon::parse($value)->format('d/m/Y');
    }
}
