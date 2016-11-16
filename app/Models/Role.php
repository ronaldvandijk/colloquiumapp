<?php
/**
 * A instance of a role
 * @author       Sander van Doorn
 */

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
    /**
     * Let Eloquent know if there are created_at and updated_at fields in the database
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Return all users that are associated with this role
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function users()
    {
    	return $this->hasMany(User::class);
    }
}
