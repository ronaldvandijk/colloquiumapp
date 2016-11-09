<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Theme
 *
 * @property integer $id
 * @property string $name
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\User[] $users
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Colloquium[] $colloquia
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Theme whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Theme whereName($value)
 * @mixin \Eloquent
 */
class Theme extends Model
{
    public $timestamps = false;

    public function users() 
    {
    	return $this->belongsToMany(User::class);
    }

    public function colloquia() 
    {
    	return $this->belongsToMany(Colloquium::class);
    }
}
