<?php
/**
 * Mailtemplte
 * @author       Sam Lakerveld
 * @author       Marco
 */
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Mailtemplate
 *
 * @mixin \Eloquent
 * @property integer $id
 * @property string $name
 * @property string $body
 * @property string $subject
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Mailtemplate whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Mailtemplate whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Mailtemplate whereBody($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Mailtemplate whereSubject($value)
 */
class Mailtemplate extends Model
{
    /**
     * Let Eloquent know if the created_at and updated_at fields exists
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * All properties that should be filled
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'subject',
        'body',
    ];
}
