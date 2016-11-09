<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
class Room extends Model
{
    public $timestamps = false;

    public function colloquia() 
    {
    	return $this->hasMany(Colloquium::class);
    }

    public function building() 
    {
    	return $this->belongsTo(Building::class);
    }
}
