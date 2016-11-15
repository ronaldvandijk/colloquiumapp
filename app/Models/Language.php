<?php
/**
 * A simple model for the Languages in the database
 * @author       Sander van Doorn
 */
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Language
 *
 * @property integer $id
 * @property string $name
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Colloquium[] $colloquia
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Language whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Language whereName($value)
 * @mixin \Eloquent
 */
class Language extends Model
{
    /**
     * A field to let Eloquent know if created_at and updated_fields in the database
     * @var bool
     */
    public $timestamps = false;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function colloquia()
    {
        return $this->hasMany(Colloquium::class);
    }
}
