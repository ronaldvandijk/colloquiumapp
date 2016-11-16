<?php
/**
 * Instance of a Invitee
 *
 * @author       Sander van Doorn
 * @author       Maarten Oossting
 * @author       Jamie Schouten
 */

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
    /**
     * Let Eloquent know if there are any created_at and updated_at fields
     * @var bool
     */
    public $timestamps = false;

    /**
     * Return all colloquia that are related to this invitee
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function colloquium()
    {
        return $this->belongsTo(Colloquium::class);
    }
}
