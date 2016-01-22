<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class events extends Model{
	
	 /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'name', 'city', 'venue', 'capacity','date', 
    ];
}