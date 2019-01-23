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

class SaveAction extends AbstractAction
{
    /**
     * Displays the login data for the user to change.
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function __invoke(ContractorRequest $request, Contractor $contractor = null)
    {
        /** @var User $user */
        $user = \Auth::user();

        $contractor = $contractor ?? new Contractor();

        $logo = $contractor->logo;
        if($request->file('contractor-logo') !== null) {
            $logo = $request->file('contractor-logo')->store('contractors', 'public');
        }

        $contractor->user_id = $user->id;

        $contractor->logo = $logo;
        $contractor->public_name = $request->get('contractor-public-name');
        $contractor->bio = $request->get('contractor-bio');
        $contractor->bio_html = $request->get('contractor-bio-html');
        $contractor->first_name = $request->get('contractor-first-name');
        $contractor->last_name = $request->get('contractor-last-name');
        $contractor->company_name = $request->get('contractor-company-name');
        $contractor->pasa = $request->get('contractor-pasa');
        $contractor->save();
        $contractor->setStatus(Contractor::STATUS_NOT_APPROVED, 'User updated record.');

        $address = $contractor->addresses->first() ?? new Address();
        $address->contractor_id = $contractor->id;
        $address->street = $request->get('contractor-street');
        $address->house_number = $request->get('contractor-house-number');
        $address->postal_code = $request->get('contractor-postal-code');
        $address->city = $request->get('contractor-city');
        $address->country = $request->get('contractor-country');
        $address->address_line_1 = $request->get('contractor-address-line-1');
        $address->address_line_2 = $request->get('contractor-address-line-2');
        $address->address_line_3 = $request->get('contractor-address-line-3');
        $address->save();

        $contactDetails = $contractor->contactDetails;
        if(!empty($request->get('contractor-contact-email', ''))) {
            $email = $contactDetails->where('type', 'email')->first();
            if($email === null) {
                $email = new ContactDetail();
                $email->type = 'email';
                $email->contractor_id = $contractor->id;
            }

            $email->value = $request->get('contractor-contact-email', '');
            $email->save();
        }

        if(!empty($request->get('contractor-contact-phone', ''))) {
            $phone = $contactDetails->where('type', 'phone')->first();
            if($phone === null) {
                $phone = new ContactDetail();
                $phone->type = 'phone';
                $phone->contractor_id = $contractor->id;
            }

            $phone->value = $request->get('contractor-contact-phone', '');
            $phone->save();
        }

        if(!empty($request->get('contractor-contact-fax', ''))) {
            $fax = $contactDetails->where('type', 'fax')->first();
            if($fax === null) {
                $fax = new ContactDetail();
                $fax->type = 'fax';
                $fax->contractor_id = $contractor->id;
            }

            $fax->value = $request->get('contractor-contact-fax', '');
            $fax->save();
        }

        $files = [
            'passport' => KycDocument::TYPE_PHOTO_PASSPORT,
            'selfie' => KycDocument::TYPE_PHOTO_SELFIE
        ];

        foreach($files as $key => $type) {
            if($request->has('contractor-kyc-' . $key . '-delete') !== null) {
                // now fetch kyc document record
                $kyc = $contractor->kycDocuments->where('type', $type)->first();
                if($kyc !== null) {
                    $kyc->file = null;
                    $kyc->save();
                }
            }

            if($request->file('contractor-kyc-' . $key) !== null) {
                $file = $request->file('contractor-kyc-' . $key)->store('kyc', 'local');
                // now fetch kyc document record
                $kyc = $contractor->kycDocuments->where('type', $type)->first();
                if($kyc === null) {
                    $kyc = new KycDocument();
                    $kyc->contractor_id = $contractor->id;
                    $kyc->type = $type;
                }
                $kyc->file = $file;
                $kyc->save();
            }

        }

        $request->session()->flash('flash', 'Contractor data updated successfully.');

        return response()->json(['success' => true]);
    }

}