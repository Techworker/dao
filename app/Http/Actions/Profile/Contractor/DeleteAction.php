<?php

namespace App\Http\Actions\Profile\Contractor;

use App\Contractor;
use App\Http\AbstractAction;
use App\Http\Requests\ProposalRequest;
use App\KycDocument;
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
    public function __invoke(Request $request, Contractor $contractor)
    {
        if($request->get('confirmed', null) === null) {
            return view('profile.confirm_delete', [
                'title' => 'Delete Contractor',
                'message' => 'Are you sure you want to delete this contractor record?'
            ]);
        }

        $contractor->delete();
        return redirect(ShowListAction::route());
    }
}