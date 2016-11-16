<?php
/**
 * Instance of a City
 * @author       Sander van Doorn
 * @author       Maarten Oosting
 * @author       Sander van Kasteel <info@sandervankasteel.nl>
 */

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
    /**
     * All fields that Eloquent needs to fill
     * @var array
     */
    protected $fillable = [
        'name'
    ];

    /**
     * Let Eloquent know if there are updated_at and created_at fields in the table
     * @var bool
     */
    public $timestamps = false;

    /**
     * Returns all locations that are in this city
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function locations()
    {
        return $this->hasMany(Location::class);
    }

    /**
     * Returns all buildings that are in this city
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function buildings()
    {
        return $this->hasMany(Building::class);
    }

}
