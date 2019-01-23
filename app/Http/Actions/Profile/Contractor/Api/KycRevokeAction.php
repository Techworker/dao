<?php

namespace App\Http\Actions\Profile\Contractor\Api;

use App\Address;
use App\Comment;
use App\ContactDetail;
use App\Contractor;
use App\Http\AbstractAction;
use App\Http\Requests\ContractorRequest;
use App\Http\Requests\ProposalRequest;
use App\Http\Requests\UpdateContact;
use App\Http\Requests\UpdateLogin;
use App\KycDocument;
use App\Proposal;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Laravel\Nova\Tests\Fixtures\CommentPolicy;

class KycRevokeAction extends AbstractAction
{
    /**
     * Displays the login data for the user to change.
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function __invoke(Request $request, Contractor $contractor)
    {
        /** @var User $user */
        $user = \Auth::user();
        $contractor->setStatus(Contractor::STATUS_NOT_APPROVED, 'Revoked KYC status');
        $request->session()->flash('flash', 'Revoked KYC status.');

        return response()->json(['success' => true]);
    }

}