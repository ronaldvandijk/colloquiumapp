<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Role
 *
 * @property integer $id
 * @property string $name
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\User[] $users
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Role whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Role whereName($value)
 * @mixin \Eloquent
 */
class Role extends Model
{
    public $timestamps = false;

    public function users() 
    {
    	return $this->hasMany(User::class);
    }
}
