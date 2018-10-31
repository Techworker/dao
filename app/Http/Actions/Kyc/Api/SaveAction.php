<?php

namespace App\Http\Actions\Kyc;

use App\Contractor;
use App\Http\Actions\AbstractAction;
use App\Http\Requests\KycRequest;
use App\KycDocument;
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
    public function __invoke(KycRequest $request)
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
        $kycId = $request->get('id', null);
        if($kycId === null) {
            $kyc = new KycDocument();
        } else {
            $kyc = KycDocument::whereContractorId($contractor->id)->whereId($kycId)->first();
            if($kyc=== null) {
                abort('not allowed.');
            }
        }

        $file = $kyc->file;
        if($request->file('file') !== null) {
            $file = $request->file('file')->store('kyc', 'local');
        }

        $kyc->contractor_id = $contractor->id;
        $kyc->file = $file;
        $kyc->title = $request->get('title');
        $kyc->description = $request->get('description');

        $kyc->save();

        $request->session()->flash('flash', 'KYC Document updated successfully.');

        return response()->json(['success' => true]);
    }
}