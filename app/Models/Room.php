<?php

namespace App\Models;

use App\BaseModel;
use Illuminate\Database\Eloquent\Model;

class Room extends BaseModel
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
