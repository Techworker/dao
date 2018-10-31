<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MoneyValue extends Model
{
    public const TYPES = [
        'PASC_molina' => 'PASC (Molina)',
        'BTC_satoshi' => 'BTC (satoshi)',
        'BCH_satoshi' => 'BCH (satoshi)',
        'AUD_cent' => 'AUD (cents)',
        'USD_cent' => 'USD (cents)',
        'EUR_cent' => 'EUR (cents)'
    ];

    use SoftDeletes;

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

}
