<?php

namespace App\Http\Actions\Profile\Proposal;

use App\Http\AbstractAction;
use App\Proposal;
use Illuminate\Http\Request;

class SubmitAction extends AbstractAction
{
    /**
     * Displays the login data for the user to change.
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function __invoke(Request $request, Proposal $proposal)
    {
        $user = \Auth::user();
        $contractor = $user->contractors->first();

        if($proposal->proposer_contractor_id !== $contractor->id) {
            return abort(401, 'Not allowed.');
        }

        if((string)$proposal->status() === Proposal::STATUS_DRAFT) {
            $proposal->setStatus(Proposal::STATUS_SUBMITTED);
            $proposal->save();
            return redirect(ShowListAction::route());
        }

        $request->session()->flash('flash', 'The status of this proposal cannot be changed anymore.');
        return redirect(ShowListAction::route());
    }
}