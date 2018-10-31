<?php

namespace App\Http\Actions\Profile\Api;

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

class SaveLoginAction extends AbstractAction
{
    public function __invoke(UpdateLogin $request)
    {
        /** @var User $user */
        $user = \Auth::user();
        if($request->has('password')) {
            $user->password = Hash::make($request->get('password'));
        }

        if($request->has('email')) {
            $user->email = $request->get('email');
        }

        $avatar= $user->avatar;
        if($request->file('avatar') !== null) {
            $avatar = $request->file('avatar')->store('user', 'public');
        }
        $user->avatar = $avatar;
        $user->name = $request->get('name');

        $user->save();

        $request->session()->flash('flash', 'User data updated successfully.');

        return response()->json(['success' => true]);
    }
}