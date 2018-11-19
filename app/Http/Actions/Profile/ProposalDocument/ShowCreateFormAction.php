<?php

namespace App\Http\Actions\Profile\ProposalDocument;

use App\Http\AbstractAction;
use App\KycDocument;
use App\Proposal;
use App\ProposalDocument;
use App\User;
use Illuminate\Http\Request;

class ShowCreateFormAction extends AbstractAction
{
    /**
     * Displays the login data for the user to change.
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function __invoke(Request $request, Proposal $proposal)
    {
        /** @var User $user */
        $user = \Auth::user();
        $contractor = $user->contractors->first();
        if($contractor->id !== $proposal->proposer_contractor_id) {
            return abort(401, 'Not allowed');
        }

        return view('profile.proposal_doc.form', [
            'proposal' => $proposal,
            'document' => new ProposalDocument()
        ]);
    }
}