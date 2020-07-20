<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
    protected $fillable =[
        'body',
        'url',
        'attachment',
        'commentable_id',
        'commentable_type',
        'user_id',
    ];

    public function commentable(){

        return $this->morphTo();
    }
//todo: use this ro return project associated with a bug
    public function user()
    {
        return $this->hasOne('App\User','id','user_id');
    }
}
