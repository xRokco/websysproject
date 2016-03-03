<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Event extends Model{

    use SoftDeletes;
    protected $softDelete = true;


	
	 /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'name', 'city', 'venue', 'price', 'information', 'description', 'capacity', 'date', 'end_time', 'image'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
    	'deleted_at',
        'date',
        'end_time',
    ];
}