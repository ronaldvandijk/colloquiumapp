<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Theme extends Model
{
    public $timestamps = false;

    public function users() 
    {
    	return $this->belongsToMany(User::class);
    }

    public function colloquia() 
    {
    	return $this->belongsToMany(Colloquia::class);
    }
}
