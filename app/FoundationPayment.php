<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FoundationPayment extends Model
{
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    /**
     * Gets the list of contracts created for this proposal.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function contract()
    {
        return $this->hasMany(Contract::class);
    }
}