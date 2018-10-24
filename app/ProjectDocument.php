<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\ProjectDocument
 *
 * @property int $id
 * @property int $user_id
 * @property string $filesystem_type
 * @property string $filesystem_ident
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Query\Builder|\App\ProjectDocument onlyTrashed()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ProjectDocument whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ProjectDocument whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ProjectDocument whereFilesystemIdent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ProjectDocument whereFilesystemType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ProjectDocument whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ProjectDocument whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ProjectDocument whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\ProjectDocument withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\ProjectDocument withoutTrashed()
 * @mixin \Eloquent
 */
class ProjectDocument extends Model
{
    use SoftDeletes;
}
