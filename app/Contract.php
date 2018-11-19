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

    public const TYPE_SALARY = 'salary';
    public const TYPE_FIXED_PRICE = 'fixed_price';
    public const TYPE_PAY_PER_HOUR = 'pay_per_hour';
    public const TYPE_PAY_PER_DELIVERABLE = 'pay_per_deliverable';

    public const TYPES = [
        self::TYPE_SALARY => 'Salary',
        self::TYPE_FIXED_PRICE => 'Fixed Price',
        self::TYPE_PAY_PER_HOUR => 'Pay per hour',
        self::TYPE_PAY_PER_DELIVERABLE => 'Pay per deliverable'
    ];


    public const STATUS_INACTIVE = 'inactive';
    public const STATUS_ACTIVE = 'active';
    public const STATUS_FINISHED = 'finished';
    public const STATUS_PAUSED = 'paused';
    public const STATUS_CANCELLED = 'cancelled';

    public const STATUS = [
        self::STATUS_INACTIVE => 'In-Active',
        self::STATUS_ACTIVE => 'Active',
        self::STATUS_FINISHED => 'Finished',
        self::STATUS_PAUSED => 'Paused',
        self::STATUS_CANCELLED => 'Cancelled'
    ];

    public const PAYOUT_TYPES = [
        self::PAYOUT_TYPE_ONCE => 'Once',
        self::PAYOUT_TYPE_DAILY => 'Daily',
        self::PAYOUT_TYPE_WEEKLY => 'Weekly',
        self::PAYOUT_TYPE_MONTHLY => 'Monthly',
        self::PAYOUT_TYPE_YEARLY => 'Yearly'
    ];

    public const PAYOUT_TYPE_ONCE = 'once';
    public const PAYOUT_TYPE_DAILY = 'daily';
    public const PAYOUT_TYPE_WEEKLY = 'weekly';
    public const PAYOUT_TYPE_MONTHLY = 'monthly';
    public const PAYOUT_TYPE_YEARLY = 'yearly';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
        'start',
        'end'
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
     * Gets the list of invoices for the contract.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function invoices()
    {
        return $this->hasMany(Invoice::class);
    }
}