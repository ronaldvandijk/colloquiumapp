<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Invitee
 *
 * @property integer $id
 * @property integer $colloquium_id
 * @property string $email
 * @property-read \App\Models\Colloquium $colloquium
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Invitee whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Invitee whereColloquiumId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Invitee whereEmail($value)
 * @mixin \Eloquent
 */
class Invitee extends Model
{
    public $timestamps = false;

    public function colloquium()
    {
        return $this->belongsTo(Colloquium::class);
    }
}
