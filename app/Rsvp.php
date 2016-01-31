<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rsvp extends Model
{
          /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'userid', 'eventid'
    ];

}
