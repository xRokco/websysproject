<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Message extends Model
{
    use SoftDeletes;
    protected $softDelete = true;

    protected $fillable = array('userid', 'email', 'subject', 'message');

}
