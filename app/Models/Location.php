<?php
/**
 * Model of a location
 * @author       F Bloggs <gbloggs@email.com>
 */
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
    /**
     * Let Eloquent know if there are created_at and updated_at fields in the table
     * @var bool
     */
    public $timestamps = false;

    /**
     * Fields that Eloquent needs to fill
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'city_id',
    ];

    /**
     * Return all buildings that belong to this location
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function buildings()
    {
    	return $this->hasMany(Building::class);
    }

    /**
     * Return a city that belongs to this location
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function city()
    {
    	return $this->belongsTo(City::class);
    }
}
