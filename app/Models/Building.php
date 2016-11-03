<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Building extends Model
{
    public $timestamps = false;

    public function rooms()
    {
        return $this->hasMany(Building::class);
    }

    public function location()
    {
        return $this->hasMany(Location::class);
    }
}
