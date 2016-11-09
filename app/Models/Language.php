<?php

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
    public $timestamps = false;

    public function colloquia()
    {
        return $this->hasMany(Colloquium::class);
    }
}
