<?php

namespace App\Http\Actions\Kyc;

use App\Http\Actions\AbstractAction;
use App\KycDocument;
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
    public function __invoke(Request $request, KycDocument $kyc)
    {
        /** @var User $user */
        $user = \Auth::user();

        if($kyc->contractor->user_id !== $user->id) {
            abort(500, 'not allowed');
        }

        return view('profile.kyc.form', [
            'user' => $user,
            'contractor' => $kyc->contractor,
            'kyc' => $kyc
        ]);
    }
}