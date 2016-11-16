<?php
/**
 * ColloquiumType
 *
 * @author       Sander van Doorn
 */
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\ColloquiumType
 *
 * @property integer $id
 * @property string $name
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Colloquium[] $colloquia
 * @method static \Illuminate\Database\Query\Builder|\App\Models\ColloquiumType whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\ColloquiumType whereName($value)
 * @mixin \Eloquent
 */
class ColloquiumType extends Model
{
    /**
     * $timestamps is for instructing Eloquent that the table has updated_at and created_at fields
     * @var bool
     */
    public $timestamps = false;

    /**
     * Return the colloquia that belongs to this type
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function colloquia()
    {
        return $this->hasMany(Colloquium::class);
    }
}
