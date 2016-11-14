<?php
namespace App\Models;

use App\Models\Presenters\UserPresenter;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * App\Models\User
 *
 * @property integer $id
 * @property string $first_name
 * @property string $insertion
 * @property string $last_name
 * @property string $email
 * @property string $password
 * @property boolean $verified
 * @property integer $role_id
 * @property string $image
 * @property boolean $enabled
 * @property string $prefered_language
 * @property string $remember_token
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Colloquium[] $colloquia
 * @property-read \App\Models\Role $role
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Theme[] $themes
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Colloquium[] $interest
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Colloquium[] $examinates
 * @method static \Illuminate\Database\Query\Builder|\App\Models\User whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\User whereFirstName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\User whereInsertion($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\User whereLastName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\User whereEmail($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\User wherePassword($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\User whereVerified($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\User whereRoleId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\User whereImage($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\User whereEnabled($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\User wherePreferedLanguage($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\User whereRememberToken($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\User whereDeletedAt($value)
 * @mixin \Eloquent
 */
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
        'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    use SoftDeletes;

    public function colloquia()
    {
        return $this->hasMany(Colloquium::class);
    }

    /**
     * @param $role string The role you want to check as a string
     * @return bool If user has the role
     */
    public function hasRole($role)
    {
        if (strpos($role, '|') != 0) {
            $roles = explode("|", $role);
            foreach ($roles as $tmpRole) {
                if (strtolower($this->role()->first()->name) == strtolower($tmpRole)) {
                    return true;
                }
            }
        }

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

    public function present()
    {
        return new UserPresenter($this);
    }
}
