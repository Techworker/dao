<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\ModelStatus\HasStatuses;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

/**
 * Class Contractor
 *
 * Holds data of a contractor.
 */
class Contractor extends Model
{
    use SoftDeletes, HasSlug, HasStatuses;

    const STATUS = [
        'not_approved' => 'Not approved',
        'approved' => 'Approved'
    ];

    const STATUS_NOT_APPROVED = 'not_approved';
    const STATUS_APPROVED = 'approved';

    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom(['first_name', 'last_name', 'company_name'])
            ->saveSlugsTo('slug');
    }

    const TYPES = [
        'natural_person' => 'Person',
        'legal_person' => 'Company'
    ];

    public const TYPE_NATURAL_PERSON = 'natural_person';
    public const TYPE_LEGAL_PERSON = 'legal_person';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    /**
     * Gets the user that created the contractor.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Gets all contact details.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function contactDetails()
    {
        return $this->hasMany(ContactDetail::class);
    }

    /**
     * Gets the addresses of a contractor.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function addresses()
    {
        return $this->hasMany(Address::class);
    }

    /**
     * Gets the list of proposals a contractor proposed.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function proposals()
    {
        return $this->hasMany(Proposal::class, 'proposer_contractor_id');
    }

    /**
     * Gets the list of contracts a contractor works / has worked on.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function contracts()
    {
        return $this->hasMany(Contract::class);
    }

    /**
     * Gets the list of KYC documents for the contractor record.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function kycDocuments()
    {
        return $this->hasMany(KycDocument::class);
    }

    /**
     * Gets the name of the contractor.
     *
     * @return mixed|null|string
     */
    public function publicName()
    {
        if($this->type === 'natural_person') {
            return $this->first_name . ' ' . $this->last_name;
        }

        return $this->company_name;
    }
}
