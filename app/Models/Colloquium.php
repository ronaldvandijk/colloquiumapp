<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Colloquium extends Model
{
    use SoftDeletes;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function invitees()
    {
        return $this->hasMany(Invitee::class);
    }

    public function type()
    {
        return $this->belongsTo(ColloquiumType::class);
    }

    public function language()
    {
        return $this->belongsTo(Language::class);
    }

    public function examinated()
    {
        return $this->belongsToMany(User::class, 'colloquium_examinators', 'user_id', 'colloquium_id');
    }

    public function interested()
    {
        return $this->belongsToMany(Colloquium::class);
    }

}
