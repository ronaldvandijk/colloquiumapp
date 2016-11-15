<?php
/**
 * Instance of a theme
 *
 * @author       Sander van Doorn
 * @author       Maarten Oosting
 * @author       Melle Dijkstra
 * @author       Rik van den Top
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\Rule;

/**
 * App\Models\Theme
 *
 * @property integer $id
 * @property string $name
 * @property string $color
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\User[] $users
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Colloquium[] $colloquia
 * @method static Builder|Theme whereId($value)
 * @method static Builder|Theme whereName($value)
 * @mixin \Eloquent
 */
class Theme extends Model
{
    /**
     * @var bool
     */
    public $timestamps = false;

    /**
     * Get all users that are subscribed to this theme
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users() 
    {
    	return $this->belongsToMany(User::class);
    }

    /**
     * Get all colloquia that belong to this theme
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function colloquia() 
    {
    	return $this->belongsToMany(Colloquium::class);
    }

    /**
     * This renders the Theme as a bootstrap label
     * @param null $fontsize The fontsize for the label
     * @return string The label as html
     */
    public function render($fontsize = null, $ellipse = 255) {
        $fontsize = (is_int($fontsize)) ? 'font-size: '.$fontsize.'px;' : '';
        return "<div style=\"background-color: {$this->color};{$fontsize}\" class=\"label\">" . ellipsis($this->name, $ellipse) . "</div>";
    }

    /**
     * Gets the rules for this model
     * @param $ignoreId int The id to ignore when checking for unique columns
     * @return array rules array
     */
    public static function getRules($ignoreId = null) {
        return [
            'name' => [
                'required',
                (is_numeric($ignoreId)) ? 'unique:themes,name,'.$ignoreId : 'unique:themes,name',
            ],
            'color' => [
                'required',
                // This regex checks on hex colors
                'regex:/^#([A-Fa-f0-9]{6}|[A-Fa-f0-9]{3})$/'
            ],
        ];
    }
}

