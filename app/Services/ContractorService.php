<?php

namespace App\Services;

use App\Contractor;
use App\Proposal;

class ContractorService
{
    public function getBySlug(string $slug) : ?Contractor
    {
        return Contractor::whereSlug($slug)->first();
    }

    public function getPublicProposedProposals(Contractor $contractor)
    {
        return $contractor->proposals->where('status', '!=', 'draft');
    }

    public function getContractedProposals(Contractor $contractor)
    {
        return Proposal::whereIn('id', $contractor->contracts->pluck('proposal_id'))
            ->where('status', '!=', 'draft')
            ->get();
    }
}