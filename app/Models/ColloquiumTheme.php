<?php
/**
 * ColloquiumTheme
 * @author       Sander van Kasteel <info@sandervankasteel.nl>
 */
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ColloquiumTheme
 * @package App\Models
 */
class ColloquiumTheme extends Model
{

    /**
     * A simple boolean to let Eloquent know if there are created_at and updated_at fields in the database
     * @var bool
     */
    public $timestamps = false;

    /**
     * A simple array to let eloquent know which fields can be updated
     *
     * @var array
     */
    protected $fillable = [
        'colloquium_id',
        'theme_id'
    ];

    /**
     * Returns all colloquia that match this theme
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function colloquium()
    {
        return $this->hasMany(Colloquium::class);
    }

    /**
     * Return all themes that belongs to this colloquiumtheme
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function theme()
    {
        return $this->hasMany(Theme::class);
    }
}