<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Project
 *
 * @property int $id
 * @property string $title
 * @property string $description
 * @property string $website
 * @property string $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Query\Builder|\App\Project onlyTrashed()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Project whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Project whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Project whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Project whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Project whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Project whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Project whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Project whereWebsite($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Project withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Project withoutTrashed()
 * @mixin \Eloquent
 * @property string $costs
 * @property string $pasa
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Project whereCosts($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Project wherePasa($value)
 * @property int $user_id
 * @property string $logo
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Comment[] $comments
 * @property-read \App\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Project whereLogo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Project whereUserId($value)
 */
class Project extends Model
{
    use SoftDeletes;

    public function user() {
        return $this->belongsTo(User::class);
    }
    public function comments() {
        return $this->hasMany(Comment::class)->orderBy('created_at', 'ASC');
    }
}
