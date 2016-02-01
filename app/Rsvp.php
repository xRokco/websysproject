<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Rsvp extends Model
{

	use SoftDeletes;
    protected $softDelete = true;
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

    protected $dates = [
    	'deleted_at',
    ];

}
