<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;
use Spatie\ModelStatus\HasStatuses;

/**
 * Class Contract
 *
 *
 */
class Contract extends Model implements Auditable
{
    use SoftDeletes, HasStatuses, \OwenIt\Auditing\Auditable;

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
        'start_date',
        'payment_date'
    ];

    /**
     * Gets the proposal related to the contract.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function proposal()
    {
        return $this->belongsTo(Proposal::class);
    }

    /**
     * Gets the contractor for the contract.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function contractor()
    {
        return $this->belongsTo(Contractor::class);
    }

    /**
     * Gets the contractor for the contract.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function payments()
    {
        return $this->hasMany(FoundationPayment::class);
    }

    /**
     * Gets the list of invoices for the contract.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function invoices()
    {
        return $this->hasMany(Invoice::class);
    }

    public function payload() {
        if($this->payload_overwrite !== null) {
            return $this->payload_overwrite;
        }

        return $this->contractor_id . '-' . $this->proposal->id . '-' . $this->id . '-' . $this->proposal->title;
    }
}