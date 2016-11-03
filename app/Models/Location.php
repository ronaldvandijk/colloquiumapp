<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    public $timestamps = false;

    public function buildings() 
    {
    	return $this->hasMany(Building::class);
    }

    public function city() 
    {
    	return $this->belongsTo(City::class);
    }
}
