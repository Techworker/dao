<?php
/** @var $proposal \App\Proposal */

?>

@extends('profile')

@section('sub')
    <div style="padding: 20px;">
        <div class="form form-proposal">
            <form action="#" id="form-proposal">
                <h2 class="title">
                    @if($proposal->id === null)
                        Create proposal
                    @else
                        Update proposal
                    @endif
                </h2>

                <input type="hidden" name="id" id="proposal-id" value="{{$proposal->id}}" />

                <div class="row-item clearfix">
                    <label class="lbl" for="txt_name1">Status</label>
                    <div class="val">
                        <p class="rs error" id="proposal-error-status"></p>
                        @if($proposal->status === "draft" || $proposal->status === "submitted")
                        <select id="proposal-status">
                            <option value="draft"{!! $proposal->status === "draft" ? ' selected="selected"' : '' !!}}>DRAFT</option>
                            <option value="submitted"{!! $proposal->status === "submitted" ? ' selected="selected"' : '' !!}}>SUBMITTED</option>
                        </select>
                            @else
                            @if($proposal->id === null)
                                DRAFT
                                <input type="hidden" name="proposal-status" value="draft" />
                            @else
                                {{$proposal->status}}
                                <input type="hidden" name="proposal-status" value="{{$proposal->status}}" />
                            @endif
                            @endif
                    </div>
                </div>
                <div class="row-item clearfix">
                    <label class="lbl" for="txt_name1">Title</label>
                    <div class="val">
                        <p class="rs error" id="proposal-error-title"></p>
                        <input class="txt" type="text" id="proposal-title" value="{{$proposal->title}}">
                    </div>
                </div>
                <div class="row-item clearfix">
                    <label class="lbl" for="txt_bio">Description:</label>
                    <div class="val">
                        <p class="rs error" id="proposal-error-description"></p>
                        <textarea class="txt fill-width" id="proposal-description" cols="30" rows="10">{{$proposal->description}}</textarea>
                    </div>
                </div>
                <div class="row-item clearfix">
                    <label class="lbl" for="txt_name1">Tags (divided by comma, 5 max)</label>
                    <div class="val">
                        <p class="rs error" id="proposal-error-tags"></p>
                        <input class="txt" type="text" id="proposal-tags" value="{{$proposal->tags()->pluck('name')->implode(',')}}">
                    </div>
                </div>
                <div class="row-item clearfix">
                    <label class="lbl" for="txt_name1">Website</label>
                    <div class="val">
                        <p class="rs error" id="proposal-error-website"></p>
                        <input class="txt" type="text" id="proposal-website" value="{{$proposal->website}}">
                    </div>
                </div>
                <div class="row-item clearfix">
                    <label class="lbl" for="txt_name1">Source Code website:</label>
                    <div class="val">
                        <p class="rs error" id="proposal-error-source-code"></p>
                        <input class="txt" type="text" id="proposal-source-code" value="{{$proposal->source_code}}">
                    </div>
                </div>
                <div class="row-item clearfix">
                    <label class="lbl" for="txt_name1">Logo:</label>
                    <div class="val">
                        <input type="file" name="logo" id="proposal-logo">
                    </div>
                </div>

                <h3>Payment</h3>
                <div class="row-item clearfix">
                    <label class="lbl" for="txt_name1">Costs</label>
                    <div class="val">
                        <p class="rs error" id="proposal-error-proposed-value"></p>
                        <input class="txt" type="text" id="proposal-proposed-value" value="{{$proposal->proposed_value}}">
                    </div>
                </div>
                <div class="row-item clearfix">
                    <label class="lbl" for="txt_name1">Costs Currency</label>
                    <div class="val">
                        <select id="proposal-proposed-currency">
                            <option value=""></option>
                            @foreach(\App\MoneyValue::TYPES as $value => $label)
                                <option value="{{$value}}" {!! $proposal->proposed_currency === $value ? ' selected="selected"' : '' !!}}>{{$label}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row-item clearfix">
                    <label class="lbl" for="txt_bio">Payment description (proposal by you, used internally):</label>
                    <div class="val">
                        <p class="rs error" id="proposal-error-payment-proposal"></p>
                        <textarea class="txt fill-width" id="proposal-payment-proposal" cols="30" rows="10">{{$proposal->payment_proposal}}</textarea>
                    </div>
                </div>

                <p class="wrap-btn-submit rs ta-r">
                    <input type="submit" class="btn btn-pascal btn-submit-all" value="Save proposal">
                </p>
            </form>
        </div>
    </div>
@endsection