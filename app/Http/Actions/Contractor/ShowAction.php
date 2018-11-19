<?php

namespace App\Http\Actions\Contractor;

use App\Contractor;
use App\Http\AbstractAction;
use App\Services\ContractorService;

/**
 * Class ShowAction
 *
 * Displays a single contractor.
 */
class ShowAction extends AbstractAction
{
    /**
     * The service to work with contractor data.
     *
     * @var ContractorService
     */
    protected $contractorService;

    /**
     * DetailAction constructor.
     * @param ContractorService $contractorService
     */
    public function __construct(ContractorService $contractorService)
    {
        $this->contractorService = $contractorService;
    }

    /**
     * @param Contractor $contractor
     * @param string $slug
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function __invoke(Contractor $contractor, string $slug)
    {
        $proposedProposals = $this->contractorService->getPublicProposedProposals($contractor);
        $contractedProposals = $this->contractorService->getContractedProposals($contractor);

        return view('contractor', [
            'contractor' => $contractor,
            'proposed' => $proposedProposals,
            'contracted' => $contractedProposals
        ]);
    }
}