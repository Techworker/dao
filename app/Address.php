<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Address extends Model
{
    use SoftDeletes;

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    public function contractor()
    {
        return $this->belongsTo(Contractor::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function countryName()
    {
        return (include base_path('vendor/umpirsky/country-list/data/en/country.php'))[$this->country];
    }
}
