<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MoneyValue extends Model
{
    use SoftDeletes;

    public const TYPE_PASC = 'PASC';
    public const TYPE_BTC = 'BTC';
    public const TYPE_BCH = 'BCH';
    public const TYPE_AUD = 'AUD';
    public const TYPE_USD = 'USD';
    public const TYPE_EUR = 'EUR';

    public const TYPES = [
        self::TYPE_PASC => 'Pascal',
        self::TYPE_BTC => 'Bitcoin',
        self::TYPE_BCH => 'Bitcoin Cash',
        self::TYPE_AUD => 'AUD',
        self::TYPE_USD => 'USD',
        self::TYPE_EUR => 'EUR'
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];
}