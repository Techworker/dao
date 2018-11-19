<?php

namespace App\Http\Actions\Profile\ProposalDocument;

use App\Contractor;
use App\Http\AbstractAction;
use App\Http\Actions\Profile\Proposal\ShowListAction;
use App\Http\Requests\ProposalRequest;
use App\KycDocument;
use App\Proposal;
use App\ProposalDocument;
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
    public function __invoke(Request $request, Proposal $proposal, ProposalDocument $document)
    {
        if($request->get('confirmed', null) === null) {
            return view('profile.confirm_delete', [
                'title' => 'Delete proposal document',
                'message' => 'Are you sure you want to delete this document?'
            ]);
        }

        /** @var User $user */
        $user = \Auth::user();
        $contractor = $user->contractors->first();
        if($proposal->proposer_contractor_id !== $contractor->id) {
            abort(401, 'not allowed');
        }
        if($proposal->id !== $document->proposal_id) {
            abort(401, 'not allowed');
        }

        $document->delete();
        return redirect(ShowListAction::route());
    }
}