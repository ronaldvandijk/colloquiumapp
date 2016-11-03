<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ColloquiumType extends Model
{
    public $timestamps = false;

    public function colloquia()
    {
        return $this->hasMany(Colloquium::class);
    }
}
