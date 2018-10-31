<?php

namespace App\Http\Actions\Profile;

use App\Address;
use App\Comment;
use App\ContactDetail;
use App\Contractor;
use App\Http\Actions\AbstractAction;
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

class ShowUpdateContractorAction extends AbstractAction
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

        /** @var array $countries */
        $countries = include base_path('vendor/umpirsky/country-list/data/en/country.php');

        return view('profile.contractor.form', [
            'user' => $user,
            'contractor' => $contractor,
            'address' => $contractor->addresses->first(),
            'countries' => $countries,
            'contactPhone' => $contractor->contactDetails->where('type', 'phone')->first() ?? new ContactDetail(),
            'contactFax' => $contractor->contactDetails->where('type', 'fax')->first() ?? new ContactDetail(),
            'contactEmail' => $contractor->contactDetails->where('type', 'email')->first() ?? new ContactDetail()
        ]);
    }
}