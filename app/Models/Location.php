<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Location
 *
 * @property integer $id
 * @property string $name
 * @property integer $city_id
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Building[] $buildings
 * @property-read \App\Models\City $city
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Location whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Location whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Location whereCityId($value)
 * @mixin \Eloquent
 */
class Location extends Model
{
    public $timestamps = false;

    public function buildings() 
    {
    	return $this->hasMany(Building::class);
    }

    public function city() 
    {
    	return $this->belongsTo(City::class);
    }
}
