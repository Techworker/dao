<?php
/** @var $contractor \App\Contractor */
/** @var $contactPhone \App\ContactDetail */
/** @var $contactEmail \App\ContactDetail */
/** @var $contactFax \App\ContactDetail */
/** @var $address \App\Address */

?>

@extends('profile')

@section('sub')
    @if($contractor->id === null)
        <h3>Create a new contractor record</h3>
    @else
        <h3>Update contractor record</h3>
    @endif
    <p>Use this form to change your login data and private profile.</p>
    @if($contractor->id === null)
    <form id="form-contractor" action="{{\App\Http\Actions\Profile\Contractor\ShowFormAction::route()}}" data-redirect="{{\App\Http\Actions\Profile\Contractor\ShowListAction::route()}}">
    @else
    <form id="form-contractor" action="{{\App\Http\Actions\Profile\Contractor\ShowFormAction::route(['contractor' => $contractor])}}" data-redirect="{{\App\Http\Actions\Profile\Contractor\ShowListAction::route()}}">
    @endif
        <h4>Publicly visible data</h4>
        <div class="form-group">
            <label for="contractor-logo">Choose logo</label>
            <input type="file" class="form-control-file" id="contractor-logo" name="contractor-logo">
            <small class="form-text text-muted">A logo displayed next to your public contractor record.</small>
        </div>

        @if($contractor->logo !== null)
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="1" id="contractor-delete-logo">
            <label class="form-check-label" for="contractor-delete-logo">
                Delete existing logo
            </label>
        </div>
        @endif

        <div class="form-group">
            <label for="user-name">Name (public)</label>
            <input type="text" class="form-control" id="contractor-public-name" name="contractor-public-name" required value="{{$contractor->public_name}}">
            <div class="invalid-feedback"></div>
            <small class="form-text text-muted">This is the public name that is displayed in proposals.</small>
        </div>
        <h4>Internal data (private)</h4>
        <div class="form-group">
            <label for="contractor-type">Type</label>
            <select class="form-control" id="contractor-type" name="contractor-type">
                <option value="legal_person"{!! $contractor->type === "legal_person" ? ' selected="selected"' : '' !!}>Company</option>
                <option value="natural_person"{!! $contractor->type === "natural_person" ? ' selected="selected"' : '' !!}>Person</option>
            </select>
            <div class="invalid-feedback"></div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="contractor-first-name">Firstname</label>
                <input type="text" class="form-control" id="contractor-first-name" name="contractor-first-name" required value="{{$contractor->first_name}}">
                <div class="invalid-feedback"></div>
            </div>
            <div class="form-group col-md-6">
                <label for="contractor-last-name">Lastname</label>
                <input type="text" class="form-control" id="contractor-last-name" name="contractor-last-name" required value="{{$contractor->last_name}}">
                <div class="invalid-feedback"></div>
            </div>
        </div>
        <div class="form-group">
            <label for="contractor-company-name">Organization</label>
            <input type="text" class="form-control" id="contractor-company-name" name="contractor-company-name" required value="{{$contractor->company_name}}">
            <div class="invalid-feedback"></div>
        </div>
        <div class="form-group">
            <label for="contractor-pasa">PASA</label>
            <input type="text" class="form-control" id="contractor-pasa" name="contractor-pasa" required value="{{$contractor->pasa}}">
            <div class="invalid-feedback"></div>
        </div>
        <div class="form-group">
            <label for="contractor-bio">Bio</label>
            <textarea class="form-control" id="contractor-bio" name="contractor-bio" rows="5">{{$contractor->bio}}</textarea>
            <small class="form-text text-muted">A short introduction of the contractor.</small>
        </div>
        <h4>Address / Contact</h4>
        <input type="hidden" id="contractor-address-id" value="{{$address->id}}" />
        <div class="row">
            <div class="col-md-6">
        <div class="form-row">
            <div class="form-group col-md-9">
                <label for="contractor-street">Street</label>
                <input type="text" class="form-control" id="contractor-street" name="contractor-street" required value="{{$address->street}}">
                <div class="invalid-feedback"></div>
            </div>
            <div class="form-group col-md-3">
                <label for="contractor-house-number">House No.</label>
                <input type="text" class="form-control" id="contractor-house-number" name="contractor-house-number" required value="{{$address->house_number}}">
                <div class="invalid-feedback"></div>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-3">
                <label for="contractor-postal-code">Postal-Code</label>
                <input type="text" class="form-control" id="contractor-postal-code" name="contractor-postal-code" required value="{{$address->postal_code}}">
                <div class="invalid-feedback"></div>
            </div>
            <div class="form-group col-md-9">
                <label for="contractor-city">City</label>
                <input type="text" class="form-control" id="contractor-city" name="contractor-city" required value="{{$address->city}}">
                <div class="invalid-feedback"></div>
            </div>
        </div>
        <div class="form-group">
            <label for="contractor-address-line-1">Address Lines</label>
            <input type="text" class="form-control mb-1" id="contractor-address-line-1" name="contractor-address-line-1" value="{{$address->address_line_1}}">
            <input type="text" class="form-control mb-1" id="contractor-address-line-2" name="contractor-address-line-2" value="{{$address->address_line_3}}">
            <input type="text" class="form-control mb-1" id="contractor-address-line-3" name="contractor-address-line-3" value="{{$address->address_line_3}}">
            <div class="invalid-feedback"></div>
        </div>
        <div class="form-group">
            <label for="contractor-country">Country</label>
            <select class="form-control" id="contractor-country" name="contractor-country">
                @foreach($countries as $code => $country)
                    <option value="{{$code}}"{!! $address->country === $code || ($address->country === null && $code === 'US') ? ' selected="selected"' : '' !!}>{{$country}}</option>
                @endforeach
            </select>
            <div class="invalid-feedback"></div>
        </div>
            </div>
            <div class="col-md-6">
        <div class="form-group">
            <label for="contractor-contact-email">Contact E-Mail address</label>
            <input type="text" class="form-control" id="contractor-contact-email" name="contractor-contact-email" value="{{$contactEmail->value}}">
            <div class="invalid-feedback"></div>
        </div>
        <div class="form-group">
            <label for="contractor-contact-phone">Contact Phone</label>
            <input type="text" class="form-control" id="contractor-contact-phone" name="contractor-contact-phone" value="{{$contactPhone->value}}">
            <div class="invalid-feedback"></div>
        </div>
        <div class="form-group">
            <label for="contractor-contact-fax">Contact fax</label>
            <input type="text" class="form-control" id="contractor-contact-fax" name="contractor-contact-fax" value="{{$contactFax->value}}">
            <div class="invalid-feedback"></div>
        </div>
            </div>
        </div>
        <h4>KYC documents</h4>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="contractor-kyc-passport">Passport</label>
                    <input type="file" class="form-control-file" id="contractor-kyc-passport" name="contractor-kyc-passport">
                    <small class="form-text text-muted">A logo displayed next to your public contractor record.</small>
                </div>
                @if($kycPassport->file !== null)
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="1" id="contractor-kyc-passport-delete" name="contractor-kyc-passport-delete">
                    <label class="form-check-label" for="contractor-kyc-passport-delete">
                        Delete existing passport attachment (cannot be displayed publically)
                    </label>
                </div>
                @endif
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="contractor-kyc-address">Address verification</label>
                    <input type="file" class="form-control-file" id="contractor-kyc-address" name="contractor-kyc-address">
                    <small class="form-text text-muted">A logo displayed next to your public contractor record.</small>
                </div>
                @if($kycAddress->file !== null)
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="1" id="contractor-kyc-address-delete" name="contractor-kyc-address-delete">
                    <label class="form-check-label" for="contractor-kyc-address-delete">
                        Delete existing address attachment (cannot be displayed publically)
                    </label>
                </div>
                @endif
            </div>
        </div>

        <button type="submit" class="btn btn-primary mt-4" id="submit">Save</button>
    </form>
@endsection