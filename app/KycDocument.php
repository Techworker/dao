<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\ModelStatus\HasStatuses;

class KycDocument extends Model
{
    use SoftDeletes, HasStatuses;

    public const STATUS = [
        'new' => 'New',
        'accepted' => 'Accepted',
        'declined' => 'Declined'
    ];

    const STATUS_NEW = 'new';
    const STATUS_ACCEPTED = 'accepted';
    const STATUS_DECLINED = 'declined';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    /**
     * Gets the user that created the proposal.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function contractor()
    {
        return $this->belongsTo(Contractor::class);
    }


}
