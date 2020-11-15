<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BugAttachment extends Model
{
    //

    public $timestamps = false;
    protected $table="bug_attachments";

    protected $fillable = [
        'att_name',
        'bug_id',
    ];
}
