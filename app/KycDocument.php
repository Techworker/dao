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

    public const TYPE_PASSPORT = 'passport';
    public const TYPE_ADDRESS_VERIFICATION = 'address_verification';

    public const TYPES = [
        self::TYPE_PASSPORT => 'Passport',
        self::TYPE_ADDRESS_VERIFICATION => 'Address verification'
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
