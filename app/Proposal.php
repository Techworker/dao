<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\ModelStatus\HasStatuses;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Spatie\Tags\HasTags;

/**
 * Class Proposal
 * 
 * Describes the data of a proposal.
 */
class Proposal extends Model
{
    use SoftDeletes, HasSlug, HasStatuses, HasTags;

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    public const STATUS_DRAFT = 'draft';
    public const STATUS_SUBMITTED = 'submitted';
    public const STATUS_APPROVED = 'approved';
    public const STATUS_ACTIVATED = 'activated';
    public const STATUS_ABORTED = 'aborted';
    public const STATUS_COMPLETED = 'completed';
    public const STATUS_SUSPENDED = 'suspended';

    /**
     * Possible proposal status.
     */
    public const STATUS_TYPES = [
        self::STATUS_DRAFT => 'DRAFT',
        self::STATUS_SUBMITTED => 'SUBMITTED',
        self::STATUS_APPROVED => 'APPROVED',
        self::STATUS_ACTIVATED => 'ACTIVATED',
        self::STATUS_ABORTED => 'ABORTED',
        self::STATUS_COMPLETED => 'COMPLETED',
        self::STATUS_SUSPENDED => 'SUSPENDED'
    ];

    /**
     * Slug generation callback.
     *
     * @return SlugOptions
     */
    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom(['title'])
            ->saveSlugsTo('slug');
    }

    /**
     * Gets the contractor that created the proposal.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function ProposerContractor()
    {
        return $this->belongsTo(Contractor::class, 'proposer_contractor_id');
    }

    /**
     * Gets the list of contracts created for this proposal.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function contracts()
    {
        return $this->hasMany(Contract::class);
    }

    /**
     * Gets the list of documents associated with the proposal.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function documents()
    {
        return $this->hasMany(ProposalDocument::class)->orderBy('created_at', 'ASC');
    }

    /**
     * Gets the list of comments for the proposal.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comments()
    {
        return $this->hasMany(Comment::class)->orderBy('created_at', 'ASC');
    }
}
