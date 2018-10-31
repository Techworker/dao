<?php

namespace App\Http\Actions\Proposal\Api;

use App\Contractor;
use App\Http\Actions\AbstractAction;
use App\Http\Requests\ProposalRequest;
use App\Proposal;
use App\User;
use Illuminate\Http\Request;

class SaveProposal extends AbstractAction
{
    /**
     * Displays the login data for the user to change.
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function __invoke(ProposalRequest $request)
    {
        /** @var User $user */
        $user = \Auth::user();

        /** @var Contractor $contractor */
        $contractorId = $request->get('contractor_id', null);
        $contractor = Contractor::whereUserId($user->id)->whereId($contractorId)->first();
        if($contractor === null) {
            abort('not allowed.');
        }

        /** @var Contractor $contractor */
        $proposalId = $request->get('id', null);
        if($proposalId === null) {
            $proposal = new Proposal();
        } else {
            $proposal = Proposal::whereContractorId($contractor->id)->whereId($proposalId)->first();
            if($proposal === null) {
                abort('not allowed.');
            }
        }

        $logo = $proposal->logo;
        if($request->file('logo') !== null) {
            $logo = $request->file('logo')->store('proposals', 'public');
        }

        if($proposal->status === "draft" || $proposal->status === "submitted") {
            $proposal->status = $request->get('status');
        }

        $proposal->proposer_contractor_id = $contractor->id;
        $proposal->logo = $logo;
        $proposal->title = $request->get('title');
        $proposal->description = $request->get('description');
        $proposal->proposed_value = $request->get('proposed_value');
        $proposal->proposed_currency = $request->get('proposed_currency');
        $proposal->website = $request->get('website');
        $proposal->source_code = $request->get('source_code');

        $proposal->save();

        $request->session()->flash('flash', 'Proposal updated successfully.');

        return response()->json(['success' => true]);
    }
}