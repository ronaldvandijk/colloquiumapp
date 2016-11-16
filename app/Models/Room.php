<?php
/**
 * A instance of the model Room
 * @author       Sander van Doorn
 * @author       Maarten Oosting
 * @author       Sander van Kasteel
 */
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Room
 * @package App\Models
 */
class Room extends Model
/**
 * App\Models\Room
 *
 * @property integer $id
 * @property string $name
 * @property integer $capacity
 * @property integer $building_id
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Colloquium[] $colloquia
 * @property-read \App\Models\Building $building
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Room whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Room whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Room whereCapacity($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Room whereBuildingId($value)
 * @mixin \Eloquent
 */

{
    /**
     * All properties Eloquent can fill
     * @var array
     */
    protected $fillable = [
        'name',
        'capacity',
        'building_id',
    ];

    /**
     * Let Eloquent know if there are any created_at and updated_at fields
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Return all colloquia that belong to this rooms
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function colloquia()
    {
        return $this->hasMany(Colloquium::class);
    }

    /**
     * Return the building that belong to this room
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function building()
    {
        return $this->belongsTo(Building::class);
    }
}
