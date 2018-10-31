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
        <div class="form form-kyc">
            <form action="#" id="form-kyc">
                <h3 class="title">
                    @if($kyc->id === null)
                        Upload KYC Document
                    @else
                        Update KYC Document
                    @endif
                </h3>

                <input type="hidden" name="id" id="kyc-id" value="{{$kyc->id}}" />
                <input type="hidden" name="contractor-id" id="kyc-contractor-id" value="{{$contractor->id}}" />

                <div class="row-item clearfix">
                    <label class="lbl" for="txt_name1">Title</label>
                    <div class="val">
                        <p class="rs error" id="kyc-error-title"></p>
                        <input class="txt" type="text" id="kyc-title" value="{{$kyc->title}}">
                    </div>
                </div>
                <div class="row-item clearfix">
                    <label class="lbl" for="txt_bio">Description:</label>
                    <div class="val">
                        <p class="rs error" id="kyc-error-description"></p>
                        <textarea class="txt fill-width" id="kyc-description" cols="30" rows="10">{{$kyc->description}}</textarea>
                    </div>
                </div>
                <div class="row-item clearfix">
                    <label class="lbl" for="txt_name1">Document:</label>
                    <div class="val">
                        <input type="file" name="file" id="kyc-file">
                    </div>
                </div>
                <p class="wrap-btn-submit rs ta-r">
                    <input type="submit" class="btn btn-pascal btn-submit-all" value="Save document">
                </p>
            </form>
        </div>
    </div>
@endsection