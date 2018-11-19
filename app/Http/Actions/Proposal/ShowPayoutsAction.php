<?php

namespace App\Http\Actions\Proposal;

use App\Contract;
use App\Http\AbstractAction;
use App\Proposal;

class ShowPayoutsAction extends AbstractAction
{
    public function __invoke(Proposal $proposal, string $slug, Contract $contract)
    {
        return view('proposal', [
            'proposal' => $proposal,
            'contracts' => $proposal->contracts
        ]);
    }
}