<?php

namespace App\Http\Actions\Profile;

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

class DashboardAction extends AbstractAction
{
    /**
     * Displays a dashboard.
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function __invoke(Request $request)
    {
        return view('profile.dashboard', [
            'user' => \Auth::user(),
        ]);
    }
}