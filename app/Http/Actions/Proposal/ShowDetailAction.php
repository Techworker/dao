<?php

namespace App\Http\Actions\Proposal;

use App\Http\Actions\AbstractAction;
use App\Proposal;

class ShowDetailAction extends AbstractAction
{
    public function __invoke(string $slug)
    {
        $proposal = Proposal::whereSlug($slug)->first();

        return view('proposal', [
            'proposal' => $proposal,
            'contracts' => $proposal->contracts
        ]);
    }
}