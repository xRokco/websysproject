<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'userid', 'eventid', 'comment', 'created_at'
    ];

    protected $table = 'comments';
}

