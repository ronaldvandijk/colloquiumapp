<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\City
 *
 * @property integer $id
 * @property string $name
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Location[] $locations
 * @method static \Illuminate\Database\Query\Builder|\App\Models\City whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\City whereName($value)
 * @mixin \Eloquent
 */
class City extends Model
{
    protected $fillable = [
        'name'
    ];

    public $timestamps = false;

    public function locations()
    {
        return $this->hasMany(Location::class);
    }
}
