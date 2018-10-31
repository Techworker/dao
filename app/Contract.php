<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;
use Spatie\ModelStatus\HasStatuses;

class Contract extends Model implements Auditable
{
    use SoftDeletes, HasStatuses, \OwenIt\Auditing\Auditable;

    public const TYPES = [
        'salary' => 'Salary',
        'fixed_price' => 'Fixed Price',
        'pay_per_hour' => 'Pay per hour',
        'pay_per_deliverable' => 'Pay per deliverable'
    ];

    public const STATUS = [
        'inactive' => 'InActive',
        'active' => 'Active',
        'finished' => 'Finished',
        'paused' => 'Paused',
        'cancelled' => 'Cancelled'
    ];

    public const STATUS_INACTIVE = 'inactive';
    public const STATUS_ACTIVE = 'active';
    public const STATUS_FINISHED = 'finished';
    public const STATUS_PAUSED = 'paused';
    public const STATUS_CANCELLED = 'cancelled';

    public const TYPE_SALARY = 'salary';
    public const TYPE_FIXED_PRICE = 'fixed_price';
    public const TYPE_PAY_PER_HOUR = 'pay_per_hour';
    public const TYPE_PAY_PER_DELIVERABLE = 'pay_per_deliverable';

    public const PAYOUT_TYPES = [
        'once' => 'Once',
        'daily' => 'Daily',
        'weekly' => 'Weekly',
        'monthly' => 'Monthly',
        'yearly' => 'Yearly'
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
     * Gets a value indicating whether the given status is valid.
     *
     * @param string $name
     * @param null|string $reason
     * @return bool
     */
    public function isValidStatus(string $name, ?string $reason = null): bool
    {
        return isset(self::STATUS[$name]);
    }

    /**
     * Gets the proposal.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function proposal()
    {
        return $this->belongsTo(Proposal::class);
    }

    public function contractors()
    {
        return $this->belongsToMany(Contractor::class)
            ->using(ContractContrator::class)
            ->withPivot('type', 'percent', 'role', 'role_description', 'pasa', 'payload');
    }

    /**
     * Gets the address.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function address()
    {
        return $this->belongsTo(Address::class);
    }
}
