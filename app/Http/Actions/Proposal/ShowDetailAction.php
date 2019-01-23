<?php

namespace App\Http\Actions\Proposal;

use App\Http\AbstractAction;
use App\Proposal;

class ShowDetailAction extends AbstractAction
{
    public function __invoke(Proposal $proposal, string $slug)
    {
        $contracts = [];
        foreach($proposal->contracts as $contract) {
            $contracts[] = [
                'contractor' => $contract->contractor,
                'proposal' => $proposal,
                'contract' => $contract
            ];
        }

        return view('proposal', [
            'proposal' => $proposal,
            'contracts' => $contracts
        ]);
    }
}