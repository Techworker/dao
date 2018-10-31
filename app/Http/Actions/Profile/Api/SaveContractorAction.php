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

class SaveContractorAction extends AbstractAction
{
    /**
     * Displays the login data for the user to change.
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function __invoke(ContractorRequest $request)
    {
        /** @var User $user */
        $user = \Auth::user();

        /** @var Contractor $contractor */
        $contractorId = $request->get('id', null);
        if($contractorId === null) {
            $contractor = new Contractor();
        } else {
            $contractor = Contractor::whereUserId($user->id)->whereId($contractorId)->first();
            if($contractor === null) {
                abort('not allowed.');
            }
        }

        $logo = $contractor->logo;
        if($request->file('logo') !== null) {
            $logo = $request->file('logo')->store('contractors', 'public');
        }

        $contractor->user_id = $user->id;

        $contractor->logo = $logo;
        $contractor->bio = $request->get('bio');
        $contractor->first_name = $request->get('first_name');
        $contractor->last_name = $request->get('last_name');
        $contractor->company_name = $request->get('company_name');
        $contractor->pasa = $request->get('pasa');
        $contractor->save();

        // trigger slug
        $contractor->updated_at = Carbon::now();
        $contractor->save();

        $address = $contractor->addresses->first();
        if($address === null) {
            $address = new Address();
        }
        $address->contractor_id = $contractor->id;
        $address->street = $request->get('street');
        $address->house_number = $request->get('house_number');
        $address->postal_code = $request->get('postal_code');
        $address->city = $request->get('city');
        $address->country = $request->get('country');
        $address->address_line_1 = $request->get('address_line_1');
        $address->address_line_2 = $request->get('address_line_2');
        $address->address_line_3 = $request->get('address_line_3');
        $address->save();

        $contactDetails = $contractor->contactDetails;
        if(!empty($request->get('contact_email', ''))) {
            $email = $contactDetails->where('type', 'email')->first();
            if($email === null) {
                $email = new ContactDetail();
                $email->type = 'email';
                $email->contractor_id = $contractor->id;
            }

            $email->value = $request->get('contact_email', '');
            $email->save();
        }

        if(!empty($request->get('contact_phone', ''))) {
            $phone = $contactDetails->where('type', 'phone')->first();
            if($phone === null) {
                $phone = new ContactDetail();
                $phone->type = 'phone';
                $phone->contractor_id = $contractor->id;
            }

            $phone->value = $request->get('contact_phone', '');
            $phone->save();
        }

        if(!empty($request->get('contact_fax', ''))) {
            $fax = $contactDetails->where('type', 'fax')->first();
            if($fax === null) {
                $fax = new ContactDetail();
                $fax->type = 'fax';
                $fax->contractor_id = $contractor->id;
            }

            $fax->value = $request->get('contact_fax', '');
            $fax->save();
        }


        $user->save();

        $request->session()->flash('flash', 'Contractor data updated successfully.');

        return response()->json(['success' => true]);
    }

}