<?php

namespace App\Http\Actions\Profile\Proposal;

use App\Contractor;
use App\Http\AbstractAction;
use App\Http\Requests\ProposalRequest;
use App\Proposal;
use App\User;
use Illuminate\Http\Request;

class DeleteAction extends AbstractAction
{
    /**
     * Displays the login data for the user to change.
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function __invoke(Request $request, Proposal $proposal)
    {
        if($request->get('confirmed', null) === null) {
            return view('profile.confirm_delete', [
                'title' => 'Delete proposal',
                'message' => 'Are you sure you want to delete this proposal?'
            ]);
        }

        /** @var User $user */
        $user = \Auth::user();
        $contractor = $user->contractors->first();

        if($proposal->proposerContractor->id !== $contractor->id) {
            abort(500, 'not allowed');
        }

        $proposal->delete();
        return redirect(ShowListAction::route());
    }
}