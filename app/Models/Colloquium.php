<?php
/**
 * An instance of a colloquium
 *
 * @package      Some Package
 * @subpackage   Some Subpackage
 * @category     Some Category
 * @author       F Bloggs <gbloggs@email.com>
 */
namespace App\Models;

use App\Models\Presenters\ColloquiumPresenter;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Sofa\Eloquence\Eloquence;

/**
 * App\Models\Colloquium
 *
 * @property integer $id
 * @property string $title
 * @property string $description
 * @property integer $user_id
 * @property integer $room_id
 * @property string $start_date
 * @property string $end_date
 * @property integer $type_id
 * @property string $invite_email
 * @property string $company_image
 * @property string $company_url
 * @property boolean $approval
 * @property integer $language_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 * @property-read \App\Models\User $user
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Invitee[] $invitees
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Theme[] $themes
 * @property-read \App\Models\ColloquiumType $type
 * @property-read \App\Models\Language $language
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\User[] $examinated
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Colloquium[] $interested
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Colloquium whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Colloquium whereTitle($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Colloquium whereDescription($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Colloquium whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Colloquium whereRoomId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Colloquium whereStartDate($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Colloquium whereEndDate($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Colloquium whereTypeId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Colloquium whereInviteEmail($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Colloquium whereCompanyImage($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Colloquium whereCompanyUrl($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Colloquium whereApproval($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Colloquium whereLanguageId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Colloquium whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Colloquium whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Colloquium whereDeletedAt($value)
 * @mixin \Eloquent
 */
class Colloquium extends Model
{
    use SoftDeletes;
    use Eloquence;

    /**
     * All fields Eloquent is allowed to fill
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'description',
        'room_id',
        'start_date',
        'end_date',
        'type_id',
        'invite_email',
        'company_image',
        'company_url',
        'approved',
        'language_id',
    ];

    /**
     * The table to which this model corresponds
     *
     * @var string
     */
    protected $table = 'colloquia';

    /**
     * Configuration for eloquence search engine.
     *
     * @var array
     */
    protected $searchableColumns = [
        'title' => 10,
        'description' => 5,
        'user.first_name' => 10,
        'user.last_name' => 10,
        'room.building.location.name' => 8,
    ];

    /**
     * All dates
     * @var array
     */
    protected $dates = [
        'start_date',
        'end_date',
    ];

    /**
     * The room that belongs to this colloquium
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function room()
    {
        return $this->belongsTo(Room::class);
    }

    /**
     * The user that belongs to this colloquim
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * The invitees that belong to this colloquium
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function invitees()
    {
        return $this->hasMany(Invitee::class);
    }

    /**
     * The type that belongs to this colloquium
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function type()
    {
        return $this->belongsTo(ColloquiumType::class);
    }

    /**
     * The language that belongs to this colloquium
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function language()
    {
        return $this->belongsTo(Language::class);
    }

    /**
     * The theme that belongs to this colloquium
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function themes()
    {
        return $this->belongsToMany(Theme::class, 'colloquium_themes', 'colloquium_id', 'theme_id');
    }

    /**
     * The examinators that belongs to this colloquium
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function examinated()
    {
        return $this->belongsToMany(User::class, 'colloquium_examinators', 'user_id', 'colloquium_id');
    }

    /**
     *
     * The interessted people beloging to this colloquium
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function interested()
    {
        return $this->belongsToMany(Colloquium::class);
    }

    /**
     * Check if the an instance of a user is the owner
     *
     * @param User $user
     * @return bool
     */
    public function isOwner(User $user)
    {
        return $user->id === $this->user_id;
    }

    /**
     * Check if this colloquium has a particular instance of a theme
     *
     * @param Theme $theme
     * @return bool
     */
    public function hasTheme(Theme $theme)
    {
        return count(ColloquiumTheme::where('colloquium_id', $this->id)->where('theme_id', $theme->id)->get()) > 0;
    }

    /**
     * Returns a ColloquiumPresenter
     * @return ColloquiumPresenter
     */
    public function present()
    {
        return new ColloquiumPresenter($this);
    }
}
