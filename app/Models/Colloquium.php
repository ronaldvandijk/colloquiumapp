<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

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
    protected $table = 'colloquia';

    use SoftDeletes;

    public function room()
    {
        return $this->belongsTo(Room::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function invitees()
    {
        return $this->hasMany(Invitee::class);
    }

    public function type()
    {
        return $this->belongsTo(ColloquiumType::class);
    }

    public function language()
    {
        return $this->belongsTo(Language::class);
    }

    public function examinated()
    {
        return $this->belongsToMany(User::class, 'colloquium_examinators', 'user_id', 'colloquium_id');
    }

    public function interested()
    {
        return $this->belongsToMany(Colloquium::class);
    }

}
