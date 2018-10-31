<?php

namespace App\Http\Actions\Proposal;

use App\Contractor;
use App\Http\Actions\AbstractAction;
use App\Http\Requests\ProposalRequest;
use App\Proposal;
use App\User;
use Illuminate\Http\Request;

class ShowUpdateFormAction extends AbstractAction
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

        if($proposal->contractor->user_id !== $user->id) {
            abort(500, 'not allowed');
        }

        return view('profile.proposal.form', [
            'user' => $user,
            'contractor' => $proposal->contractor,
            'proposal' => $proposal
        ]);
    }
}