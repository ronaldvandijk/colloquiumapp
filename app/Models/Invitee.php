<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Invitee extends Model
{
    public $timestamps = false;

    public function colloquium()
    {
        return $this->belongsTo(Colloquium::class);
    }
}
