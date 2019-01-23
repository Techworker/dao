<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\ModelStatus\HasStatuses;

/**
 * Class KycDocument
 *
 * Holds a single KYC document.
 */
class KycDocument extends Model
{
    use SoftDeletes, HasStatuses;

    public const TYPE_PHOTO_PASSPORT = 'photo_passport';
    public const TYPE_PHOTO_SELFIE = 'photo_selfie';

    public const TYPES = [
        self::TYPE_PHOTO_PASSPORT => 'Passport',
        self::TYPE_PHOTO_SELFIE => 'Selfie with passport'
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    /**
     * Gets the contractor that owns the KYC documents.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function contractor()
    {
        return $this->belongsTo(Contractor::class);
    }
}
