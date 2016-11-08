<?php
namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $fillable = [
        'first_name',
        'insertion',
        'last_name',
        'email',
        'verified',
        'role_id',
        'enabled',
        'prefered_language',
        'image',
        'password'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    use SoftDeletes;

    public function colloquia()
    {
        return $this->hasMany(Colloquium::class);
    }

    public function hasRole($role)
    {
        return strtolower($this->role()->first()->name) == strtolower($role);
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
