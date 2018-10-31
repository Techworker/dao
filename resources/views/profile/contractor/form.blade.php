<?php
/** @var $contractor \App\Contractor */
/** @var $contactPhone \App\ContactDetail */
/** @var $contactEmail \App\ContactDetail */
/** @var $contactFax \App\ContactDetail */
/** @var $address \App\Address */

?>

@extends('profile')

@section('sub')
    <div style="padding: 20px;">
        <div class="form form-contractor">
            <form action="#" id="form-contractor">
                <h3 class="title">
                    @if($contractor->id === null)
                        Create contractor record
                    @else
                        Update contractor record
                    @endif
                </h3>

                <input type="hidden" name="id" id="contractor-id" value="{{$contractor->id}}" />

                <div class="row-item clearfix">
                    <label class="lbl" for="txt_name1">Logo:</label>
                    <div class="val">
                        <input type="file" name="logo" id="contractor-logo">
                        @if($contractor->logo !== null)
                            <img src="/storage/{{str_replace('public', '', $contractor->logo)}}" style="width: 100px">
                        @endif
                    </div>
                </div>

                <div class="row-item clearfix">
                    <label class="lbl" for="txt_name1">Type</label>
                    <div class="val">
                        <p class="rs error" id="contractor-error-type"></p>
                        <select id="contractor-type">
                            <option value="legal_person"{!! $contractor->type === "legal_person" ? ' selected="selected"' : '' !!}>Company</option>
                            <option value="natural_person"{!! $contractor->type === "natural_person" ? ' selected="selected"' : '' !!}>Person</option>
                        </select>

                    </div>
                </div>
                <div class="row-item clearfix">
                    <label class="lbl" for="txt_name1">First Name:</label>
                    <div class="val">
                        <p class="rs error" id="contractor-error-first-name"></p>
                        <input class="txt" type="text" id="contractor-first-name" value="{{$contractor->first_name}}">
                    </div>
                </div>
                <div class="row-item clearfix">
                    <label class="lbl" for="txt_name1">Last Name:</label>
                    <div class="val">
                        <p class="rs error" id="contractor-error-last-name"></p>
                        <input class="txt" type="text" id="contractor-last-name" value="{{$contractor->last_name}}">
                    </div>
                </div>
                <div class="row-item clearfix">
                    <label class="lbl" for="txt_name1">Organization:</label>
                    <div class="val">
                        <p class="rs error" id="contractor-error-company-name"></p>
                        <input class="txt" type="text" id="contractor-company-name" value="{{$contractor->company_name}}">
                    </div>
                </div>
                <div class="row-item clearfix">
                    <label class="lbl" for="txt_name1">PASA:</label>
                    <div class="val">
                        <p class="rs error" id="contractor-error-pasa"></p>
                        <input class="txt" type="text" id="contractor-pasa" value="{{$contractor->pasa}}">
                    </div>
                </div>
                <div class="row-item clearfix">
                    <label class="lbl" for="txt_bio">Biuo (A short introduction of yourself):</label>
                    <div class="val">
                        <textarea class="txt fill-width" id="contractor-bio" cols="30" rows="10">{{$contractor->bio}}</textarea>
                    </div>
                </div>

                <div class="row-item clearfix">
                <h4>Address / Contact</h4>
                </div>
                <input type="hidden" id="contractor-address-id" value="{{$address->id}}" />
                <div class="row-item clearfix">
                    <label class="lbl" for="txt_name1">Street / Housenumber</label>
                    <div class="val">
                        <p class="rs error" id="contractor-error-street"></p>
                        <input class="txt" type="text" id="contractor-street" value="{{$address->street}}">
                        <input class="txt" size="5" type="text" id="contractor-house-number" value="{{$address->house_number}}">
                    </div>
                </div>
                <div class="row-item clearfix">
                    <label class="lbl" for="txt_name1">Postal Code</label>
                    <div class="val">
                        <p class="rs error" id="contractor-error-postal-code"></p>
                        <input class="txt" type="text" id="contractor-postal-code" value="{{$address->postal_code}}">
                    </div>
                </div>
                <div class="row-item clearfix">
                    <label class="lbl" for="txt_name1">City</label>
                    <div class="val">
                        <p class="rs error" id="contractor-error-city"></p>
                        <input class="txt" type="text" id="contractor-city" value="{{$address->city}}">
                    </div>
                </div>
                <div class="row-item clearfix">
                    <label class="lbl" for="txt_name1">Address lines</label>
                    <div class="val">
                        <p class="rs error" id="contractor-error-address-line-1"></p>
                        <p class="rs error" id="contractor-error-address-line-2"></p>
                        <p class="rs error" id="contractor-error-address-line-3"></p>
                        <input class="txt" type="text" id="contractor-address-line-1" value="{{$address->address_line_1}}">
                        <input class="txt" type="text" id="contractor-address-line-2" value="{{$address->address_line_2}}">
                        <input class="txt" type="text" id="contractor-address-line-3" value="{{$address->address_line_3}}">
                    </div>
                </div>
                <div class="row-item clearfix">
                    <label class="lbl" for="txt_name1">Country</label>
                    <div class="val">
                        <p class="rs error" id="contractor-error-country"></p>
                        <select id="contractor-country">
                            @foreach($countries as $code => $country)
                                <option value="{{$code}}"{!! $address->country === $code || ($address->country === null && $code === 'US') ? ' selected="selected"' : '' !!}>{{$country}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row-item clearfix">
                    <label class="lbl" for="txt_name1">Contact E-Mail</label>
                    <div class="val">
                        <p class="rs error" id="contractor-error-contact-email"></p>
                        <input class="txt" type="text" id="contractor-contact-email" value="{{$contactEmail->value}}">
                    </div>
                </div>
                <div class="row-item clearfix">
                    <label class="lbl" for="txt_name1">Contact Phone</label>
                    <div class="val">
                        <p class="rs error" id="contractor-error-contact-phone"></p>
                        <input class="txt" type="text" id="contractor-contact-phone" value="{{$contactPhone->value}}">
                    </div>
                </div>
                <div class="row-item clearfix">
                    <label class="lbl" for="txt_name1">Contact Fax</label>
                    <div class="val">
                        <p class="rs error" id="contractor-error-contact-fax"></p>
                        <input class="txt" type="text" id="contractor-contact-fax" value="{{$contactFax->value}}">
                    </div>
                </div>

                <p class="wrap-btn-submit rs ta-r">
                    <input type="submit" class="btn btn-pascal btn-submit-all" value="Save all settings">
                </p>
            </form>
        </div>
    </div>
@endsection