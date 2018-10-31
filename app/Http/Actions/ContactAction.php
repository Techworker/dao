<?php

namespace App\Http\Actions;

use App\Address;
use App\Comment;
use App\ContactDetail;
use App\Contractor;
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

class ContactAction extends AbstractAction
{
    public function __invoke() {
        return view('contact');
    }
}