<?php

namespace App\Http\Actions\Profile\ProposalDocument\Api;

use App\Contractor;
use App\Http\AbstractAction;
use App\Http\Requests\ProposalDocumentRequest;
use App\KycDocument;
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
    public function __invoke(ProposalDocumentRequest $request, Proposal $proposal)
    {
        /** @var User $user */
        $user = \Auth::user();
        $contractor = $user->contractors->first();

        if($proposal->proposer_contractor_id !== $contractor->id) {
            return abort(401, 'Not allowed');
        }

        /** @var Contractor $contractor */
        $documentId = $request->get('id', null);
        if($documentId === null) {
            $document = new ProposalDocument();
        } else {
            $document = ProposalDocument::whereProposalId($proposal->id)->whereId($documentId)->first();
            if($document === null) {
                abort('not allowed.');
            }
        }

        $file = $document->file;
        if($request->file('file') !== null) {
            $file = $request->file('file')->store('proposals', 'public');
        }

        $document->proposal_id = $proposal->id;
        $document->file = $file;
        $document->title = $request->get('title');
        $document->description = $request->get('description');

        $document->save();

        $document->setStatus(ProposalDocument::STATUS_NEW);

        $request->session()->flash('flash', 'Proposal Document updated successfully.');

        return response()->json(['success' => true]);
    }
}