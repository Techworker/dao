<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\ModelStatus\HasStatuses;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

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
            ->generateSlugsFrom(['id', 'first_name', 'last_name', 'company_name'])
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
     * Gets the user that created the proposal.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Gets various contact details.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function contactDetails()
    {
        return $this->hasMany(ContactDetail::class);
    }

    /**
     * Gets various contact details.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function addresses()
    {
        return $this->hasMany(Address::class);
    }

    public function proposals()
    {
        return $this->hasMany(Proposal::class, 'proposer_contractor_id');
    }

    public function contracts()
    {
        return $this->belongsToMany(Contract::class)->using(ContractContrator::class)->withPivot('type', 'percent', 'role', 'role_description', 'pasa', 'payload');
    }

    public function kycDocuments()
    {
        return $this->hasMany(KycDocument::class);
    }

    public function publicName()
    {
        if($this->type === 'natural_person') {
            return $this->first_name . ' ' . $this->last_name;
        }

        return $this->company_name;
    }
}
