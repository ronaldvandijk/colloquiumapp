<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ColloquiumTheme extends Model
{

    public $timestamps = false;

    protected $fillable = [
        'colloquium_id',
        'theme_id'
    ];

    public function colloquium()
    {
        return $this->hasMany(Colloquium::class);
    }

    public function theme()
    {
        return $this->hasMany(Theme::class);
    }
}