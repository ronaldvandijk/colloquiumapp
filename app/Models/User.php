<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Model
{
    use SoftDeletes;

    public function colloquia() 
    {
    	return $this->hasMany(Colloquium::class);
    }

    public function role()
    {
    	return $this->belongsTo(Role::class);
    }
}


