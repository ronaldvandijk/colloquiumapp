<?php
/**
 * Instance of a Building
 *
 * @author       Sander van Doorn
 * @author       Maarten Oosting
 * @author       Sander van Kasteel
 */

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
    /**
     * Let Eloquent know if there are created_at and updated_at fields
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * All properties Eloquent should fill
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'abbreviation',
        'location_id',
    ];

    /**
     * returns the rooms for a building
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function rooms()
    {
        return $this->hasMany(Room::class);
    }

    /**
     * returns which location this building belongs to.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function location()
    {
        return $this->belongsTo(Location::class);
    }
}
