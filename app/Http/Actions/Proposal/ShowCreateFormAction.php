<?php

namespace App\Http\Actions\Proposal;

use App\Contractor;
use App\Http\Actions\AbstractAction;
use App\Http\Requests\ProposalRequest;
use App\Proposal;
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
    public function __invoke(Request $request)
    {
        /** @var User $user */
        $user = \Auth::user();
        $contractorId = $request->query->get('contractor_id');
        $contractor = Contractor::whereUserId($user->id)->whereId($contractorId)->first();
        if($contractor === null) {
            abort(500, 'Not allowed');
        }

        return view('profile.proposal.form', [
            'contractor' => $contractor,
            'proposal' => new Proposal()
        ]);
    }

}