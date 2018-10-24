<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\KycDocument
 *
 * @property int $id
 * @property int $user_id
 * @property string $filesystem_type
 * @property string $filesystem_ident
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Query\Builder|\App\KycDocument onlyTrashed()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\KycDocument whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\KycDocument whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\KycDocument whereFilesystemIdent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\KycDocument whereFilesystemType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\KycDocument whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\KycDocument whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\KycDocument whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\KycDocument withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\KycDocument withoutTrashed()
 * @mixin \Eloquent
 * @property string $title
 * @property string $description
 * @method static \Illuminate\Database\Eloquent\Builder|\App\KycDocument whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\KycDocument whereTitle($value)
 */
class KycDocument extends Model
{
    use SoftDeletes;
}
