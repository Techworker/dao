<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\ModelStatus\HasStatuses;

/**
 * Class ProposalDocument
 *
 * Describes a document attached to a proposal.
 */
class ProposalDocument extends Model
{
    use SoftDeletes, HasStatuses;

    const TYPE_DOC_1 = 'doc_1';
    const TYPE_DOC_2 = 'doc_2';
    const TYPE_DOC_3 = 'doc_3';

    public const TYPES = [
        self::TYPE_DOC_1 => 'Attachment 1',
        self::TYPE_DOC_2 => 'Attachment 2',
        self::TYPE_DOC_3 => 'Attachment 3'
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    /**
     * Gets the owning proposal.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function proposal()
    {
        return $this->belongsTo(Proposal::class);
    }
}