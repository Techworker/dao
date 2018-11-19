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
        <div class="form form-proposal-doc">
            <form action="#" id="form-proposal-doc">
                <h2 class="title">
                    @if($document->id === null)
                        Upload Proposal Document
                    @else
                        Update Proposal Document
                    @endif
                </h2>

                <input type="hidden" name="id" id="proposal-document-id" value="{{$document->id}}" />
                <input type="hidden" name="proposal-id" id="proposal-id" value="{{$proposal->id}}" />

                <div class="row-item clearfix">
                    <label class="lbl" for="txt_name1">Title</label>
                    <div class="val">
                        <p class="rs error" id="proposal-error-title"></p>
                        <input class="txt" type="text" id="proposal-title" value="{{$document->title}}">
                    </div>
                </div>
                <div class="row-item clearfix">
                    <label class="lbl" for="txt_bio">Description:</label>
                    <div class="val">
                        <p class="rs error" id="proposal-error-description"></p>
                        <textarea class="txt fill-width" id="proposal-description" cols="30" rows="10">{{$document->description}}</textarea>
                    </div>
                </div>
                <div class="row-item clearfix">
                    <label class="lbl" for="txt_name1">Document:</label>
                    <div class="val">
                        <input type="file" name="file" id="proposal-file">
                    </div>
                </div>
                <p class="wrap-btn-submit rs ta-r">
                    <input type="submit" class="btn btn-pascal btn-submit-all" value="Save document">
                </p>
            </form>
        </div>
    </div>
@endsection