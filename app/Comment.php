<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'comment'
    ];

    protected $table = 'comments';

    protected $dates = [
    	'created_at',
    ];

    
}

