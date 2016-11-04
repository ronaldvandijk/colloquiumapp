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

    public function themes()
    {
        return $this->belongsToMany(Theme::class);
    }

    public function interest()
    {
        return $this->belongsToMany(Colloquium::class);
    }

    public function examinates()
    {
        return $this->belongsToMany(Colloquium::class, 'colloquium_examinators', 'user_id', 'colloquium_id');
    }
}
