<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rsvp extends Model
{

    public $timestamps = false;


          /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'userid', 'eventid'
    ];

    protected $table = 'rsvp';
}
