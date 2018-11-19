<?php

namespace App\Services;

use App\Contractor;
use App\Proposal;

/**
 * Class ContractorService
 *
 * A service to fetch data related to a contractor.
 */
class ContractorService
{
    /**
     * Tries to find a contractor by the given slug.
     *
     * @param string $slug
     * @return Contractor|null
     */
    public function getBySlug(string $slug): ?Contractor
    {
        return Contractor::whereSlug($slug)->first();
    }

    /**
     * Gets the list of proposals by the contractor that are not in draft status.
     *
     * @param Contractor $contractor
     * @return Proposal[]|\Illuminate\Database\Eloquent\Collection|mixed
     */
    public function getPublicProposedProposals(Contractor $contractor)
    {
        $proposals = $contractor->proposals;
        return $this->filterNonDraft($proposals);
    }

    /**
     * Gets the list of proposals from the given contractor that has a proposal
     * that is or was contracted.
     *
     * @param Contractor $contractor
     * @return Proposal[]|\Illuminate\Database\Eloquent\Collection
     */
    public function getContractedProposals(Contractor $contractor)
    {
        $contractedProposalIds = $contractor->contracts->pluck('proposal_id');
        $proposals = Proposal::whereIn('id', $contractedProposalIds)
            ->get();

        return $this->filterNonDraft($proposals);
    }

    protected function filterNonDraft($proposals)
    {
        return $proposals->filter(function(Proposal $proposal) {
            return $proposal->status() !== Proposal::STATUS_DRAFT;
        });
    }
}