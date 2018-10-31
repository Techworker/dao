<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\ModelStatus\HasStatuses;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Proposal extends Model
{

    use SoftDeletes, HasSlug, HasStatuses;

    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom(['id', 'title'])
            ->saveSlugsTo('slug');
    }

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    /**
     * Possible proposal status.
     */
    public const STATUS_TYPES = [
        'draft' => 'DRAFT',
        'submitted' => 'SUBMITTED',
        'approved' => 'APPROVED',
        'activated' => 'ACTIVATED',
        'aborted' => 'ABORTED',
        'completed' => 'COMPLETED',
        'suspended' => 'SUSPENDED'
    ];

    public const STATUS_DRAFT = 'draft';
    public const STATUS_SUBMITTED = 'submitted';
    public const STATUS_APPROVED = 'approved';
    public const STATUS_ACTIVATED = 'activated';
    public const STATUS_ABORTED = 'aborted';
    public const STATUS_COMPLETED = 'completed';
    public const STATUS_SUSPENDED = 'suspended';

    /**
     * Gets the user that created the proposal.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function ProposerContractor()
    {
        return $this->belongsTo(Contractor::class, 'proposer_contractor_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function contracts()
    {
        return $this->hasMany(Contract::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function invoices()
    {
        return $this->hasMany(Invoice::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

    /**
     * Gets the list of comments the user created.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comments()
    {
        return $this->hasMany(Comment::class)->orderBy('created_at', 'ASC');
    }
}
