<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Building
 *
 * @property integer $id
 * @property string $name
 * @property string $abbreviation
 * @property integer $location_id
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Building[] $rooms
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Location[] $location
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Building whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Building whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Building whereAbbreviation($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Building whereLocationId($value)
 * @mixin \Eloquent
 */
class Building extends Model
{
    public $timestamps = false;

    public function rooms()
    {
        return $this->hasMany(Building::class);
    }

    public function location()
    {
        return $this->belongsTo(Location::class);
    }
}
