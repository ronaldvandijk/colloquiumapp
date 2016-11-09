<?php

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
    public $timestamps = false;

    public function colloquia()
    {
        return $this->hasMany(Colloquium::class);
    }
}
