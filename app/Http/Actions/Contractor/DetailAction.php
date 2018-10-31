<?php

namespace App\Http\Actions\Contractor;

use App\Http\Actions\AbstractAction;
use App\Services\ContractorService;

class DetailAction extends AbstractAction
{
    public function __invoke(ContractorService $contractorService, string $slug)
    {
        $contractor = $contractorService->getBySlug($slug);
        if($contractor === null) {
            return abort(404);
        }

        $proposedProposals = $contractorService->getPublicProposedProposals($contractor);
        $contractedProposals = $contractorService->getContractedProposals($contractor);

        return view('contractor', [
            'contractor' => $contractor,
            'proposed' => $proposedProposals,
            'contracted' => $contractedProposals
        ]);
    }
}