<?php

namespace App\Http\Actions\Profile\Proposal\Api;

use App\Contractor;
use App\Http\AbstractAction;
use App\Http\Requests\ProposalRequest;
use App\Nova\Filters\ProposalStatus;
use App\Proposal;
use App\ProposalDocument;
use App\User;
use Illuminate\Http\Request;

class SaveAction extends AbstractAction
{
    /**
     * Displays the login data for the user to change.
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function __invoke(ProposalRequest $request, Proposal $proposal = null)
    {
        /** @var User $user */
        $user = \Auth::user();

        $isNew = false;
        if($proposal === null) {
            $isNew = true;
            $proposal = new Proposal();
        }

        $logo = $proposal->logo;
        if($request->file('proposal-logo') !== null) {
            $logo = $request->file('proposal-logo')->store('proposals', 'public');
        }

        /*if((string)$proposal->status() === Proposal::STATUS_DRAFT || (string)$proposal->status === Proposal::STATUS_SUBMITTED) {
            if($request->get('proposal-status') === Proposal::STATUS_DRAFT || $request->get('proposal-status') === Proposal::STATUS_SUBMITTED) {
                if($request->get('proposal-status') === Proposal::STATUS_DRAFT) {
                    $reason = 'You changed status to draft.';
                } else {
                    $reason = 'Submitted by you, in review.';
                }
                $proposal->setStatus($request->get('proposal-status'), $reason);
            }
        }*/

        $proposal->proposer_contractor_id = $request->get('proposal-contractor');
        $proposal->logo = $logo;
        $proposal->title = $request->get('proposal-title');
        $proposal->intro = $request->get('proposal-intro');
        $proposal->description = $request->get('proposal-description');
        $proposal->description_html = $request->get('proposal-description-html');
        $proposal->proposed_value = $request->get('proposal-proposed-value');
        $proposal->proposed_currency = $request->get('proposal-proposed-currency');
        $proposal->website = $request->get('proposal-website');
        $proposal->payment_proposal = $request->get('proposal-payment-proposal');
        $proposal->source_code = $request->get('proposal-source-code');
        $proposal->notes_contractor = $request->get('proposal-notes-contractor');

        $proposal->save();
        $proposal->syncTags(array_slice(array_filter(array_map('trim', explode(',', $request->get('proposal-tags')))), 0, 5));

        if($isNew) {
            $proposal->setStatus(Proposal::STATUS_DRAFT, 'Proposal created, please submit it for review.');
        }

        for($i = 1; $i <= 3; $i++) {
            $prefix = 'proposal-document-' . $i . '-';
            $document = ProposalDocument::whereProposalId($proposal->id)->orderBy('created_at')->offset($i-1)->take(1)->first();
            if($document === null) {
                $document = new ProposalDocument();
                $document->proposal_id = $proposal->id;
            } else {
                if($request->has($prefix . 'delete')) {
                    $document->file = null;
                }
            }
            $document->title = $request->get($prefix . 'title');


            if ($request->file($prefix . 'file') !== null) {
                $file = $request->file($prefix . 'file')->store('proposal', 'public');
                $document->file = $file;
            }
            $document->save();
        }

        $request->session()->flash('flash', 'Proposal updated successfully.');

        return response()->json(['success' => true]);
    }
}