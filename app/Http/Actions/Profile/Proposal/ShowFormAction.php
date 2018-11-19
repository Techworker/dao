<?php

namespace App\Http\Actions\Profile\Proposal;

use App\Contractor;
use App\Http\AbstractAction;
use App\Http\Requests\ProposalRequest;
use App\Proposal;
use App\ProposalDocument;
use App\User;
use Illuminate\Http\Request;

class ShowFormAction extends AbstractAction
{
    /**
     * Displays the login data for the user to change.
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function __invoke(Request $request, Proposal $proposal = null)
    {
        /** @var User $user */
        $user = \Auth::user();
        $contractors = $user->contractors;
        if($proposal === null) {
            $proposal = new Proposal();
        }

        return view('profile.proposal.form', [
            'user' => $user,
            'contractors' => $contractors,
            'proposal' => $proposal,
            'doc_1' => $proposal->documents->get(0) ?? new ProposalDocument(),
            'doc_2' => $proposal->documents->get(1) ?? new ProposalDocument(),
            'doc_3' => $proposal->documents->get(2) ?? new ProposalDocument()
        ]);
    }
}