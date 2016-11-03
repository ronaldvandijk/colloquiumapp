<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    public $timestamps = false;

    public function colloquia() 
    {
    	return $this->hasMany(Colloquium::class);
    }

    public function building() 
    {
    	return $this->belongsTo(Building::class);
    }
}
