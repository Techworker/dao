<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class ContactDetail
 *
 * Holds different types of contact details.
 */
class ContactDetail extends Model
{
    use SoftDeletes;

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    public const TYPES = [
        'email' => 'Email',
        'phone' => 'Phone',
        'fax' => 'Fax',
        'other' => 'Other'
    ];

    public const TYPE_EMAIL = 'email';
    public const TYPE_PHONE = 'phone';
    public const TYPE_FAX = 'fax';
    public const TYPE_OTHER = 'other';

    /**
     * Gets the contractor owning the contact details.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function contractor()
    {
        return $this->belongsTo(Contractor::class);
    }
}
