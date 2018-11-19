<?php

namespace App\Http\Actions\Proposal;

use App\Http\AbstractAction;
use App\Proposal;

class ShowDetailAction extends AbstractAction
{
    public function __invoke(Proposal $proposal, string $slug)
    {
        return view('proposal', [
            'proposal' => $proposal,
            'contracts' => $proposal->contracts
        ]);
    }
}