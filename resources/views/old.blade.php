<?php
/** @var $user \App\User */
?>

@extends('layouts.app')

@section('content')
    <div class="layout-2cols">
        <div class="content grid_12">
            @if(session()->has('flash'))
                <div id="flash">{{session()->get('flash')}}</div>
            @endif

            <div class="proposal-detail">
                <div class="proposal-tab-detail tabbable accordion">
                    <ul class="nav nav-tabs clearfix">
                        <li{!! $area === 'profile' ? ' class="active"' : '' !!}><a href="#profile">Your Profile</a></li>
                        <li{!! $area === 'contractor' ? ' class="active"' : '' !!}><a href="#contractor-data" class="be-fc-orange">Contractor data</a></li>
                    </ul>
                    <div class="tab-content">
                        <div>
                            <h3 class="rs alternate-tab accordion-label">Profile</h3>
                            <div class="tab-pane accordion-content{!! $area === 'contact' ? ' active' : '' !!}">
                                <div class="info-box">
                                    @if($user->status === 'incomplete')
                                        Your account data is incomplete. Please provide all necessary account data as well as KYC documents. Thank you!
                                    @elseif($user->status === 'rejected')
                                        Your account verification is rejected. <br /><b>Reason:</b><br />{{$user->rejected_reason}}
                                    @elseif($user->status === 'pending')
                                        Your account verified is currently pending.
                                    @elseif($user->status === 'verified')
                                        Your account is verified.
                                    @endif
                                </div>
                                <div class="form form-profile">
                                    <form action="#" id="form-profile">
                                        <div class="row-item clearfix">
                                            <label class="lbl" for="txt_name1">Avatar:</label>
                                            <div class="val">
                                                <input type="file" name="avatar" id="user-avatar">
                                                @if($user->avatar !== null)
                                                    <img src="/storage/{{str_replace('public', '', $user->avatar)}}" alt="$TITLE" style="width: 100px">
                                                @endif
                                            </div>
                                        </div>

                                        <div class="row-item clearfix">
                                            <label class="lbl" for="txt_name1">First Name:</label>
                                            <div class="val">
                                                <p class="rs error" id="user-error-first-name"></p>
                                                <input class="txt" type="text" id="user-first-name" value="{{$user->first_name}}">
                                            </div>
                                        </div>
                                        <div class="row-item clearfix">
                                            <label class="lbl" for="txt_name1">Last Name:</label>
                                            <div class="val">
                                                <p class="rs error" id="user-error-last-name"></p>
                                                <input class="txt" type="text" id="user-last-name" value="{{$user->last_name}}">
                                            </div>
                                        </div>
                                        <div class="row-item clearfix">
                                            <label class="lbl" for="txt_name1">Organization:</label>
                                            <div class="val">
                                                <p class="rs error" id="user-error-organization-name"></p>
                                                <input class="txt" type="text" id="user-organization-name" value="{{$user->organization_name}}">
                                            </div>
                                        </div>
                                        <div class="row-item clearfix">
                                            <label class="lbl" for="txt_name1">Street</label>
                                            <div class="val">
                                                <p class="rs error" id="user-error-street"></p>
                                                <input class="txt" type="text" id="user-street" value="{{$user->street}}">
                                            </div>
                                        </div>
                                        <div class="row-item clearfix">
                                            <label class="lbl" for="txt_name1">Postal Code</label>
                                            <div class="val">
                                                <p class="rs error" id="user-error-postal-code"></p>
                                                <input class="txt" type="text" id="user-postal-code" value="{{$user->postal_code}}">
                                            </div>
                                        </div>
                                        <div class="row-item clearfix">
                                            <label class="lbl" for="txt_name1">City</label>
                                            <div class="val">
                                                <p class="rs error" id="user-error-city"></p>
                                                <input class="txt" type="text" id="user-city" value="{{$user->city}}">
                                            </div>
                                        </div>
                                        <div class="row-item clearfix">
                                            <label class="lbl" for="txt_name1">Address lines</label>
                                            <div class="val">
                                                <p class="rs error" id="user-error-address-line-1"></p>
                                                <p class="rs error" id="user-error-address-line-2"></p>
                                                <p class="rs error" id="user-error-address-line-3"></p>
                                                <input class="txt" type="text" id="user-address-line-1" value="{{$user->address_line_1}}">
                                                <input class="txt" type="text" id="user-address-line-2" value="{{$user->address_line_2}}">
                                                <input class="txt" type="text" id="user-address-line-3" value="{{$user->address_line_3}}">
                                            </div>
                                        </div>
                                        <div class="row-item clearfix">
                                            <label class="lbl" for="txt_name1">Contact 1</label>
                                            <div class="val">
                                                <p class="rs error" id="user-error-contact-type-1"></p>
                                                <p class="rs error" id="user-error-contact-value-1"></p>
                                                <select id="user-contact-type-1">
                                                    <option value=""></option>
                                                    @foreach(\App\User::PHONE_TYPES as $value => $label)
                                                        <option value="{{$value}}" {!! $user->contact_type_1 === $value ? ' selected="selected"' : '' !!}}>{{$label}}</option>
                                                    @endforeach
                                                </select>
                                                <input class="txt" type="text" id="user-contact-value-1" value="{{$user->contact_value_1}}">
                                            </div>
                                        </div>
                                        <div class="row-item clearfix">
                                            <label class="lbl" for="txt_name1">Contact 2</label>
                                            <div class="val">
                                                <p class="rs error" id="user-error-contact-type-2"></p>
                                                <p class="rs error" id="user-error-contact-value-2"></p>
                                                <select id="user-contact-type-2">
                                                    <option value=""></option>
                                                    @foreach(\App\User::PHONE_TYPES as $value => $label)
                                                        <option value="{{$value}}" {!! $user->contact_type_2 === $value ? ' selected="selected"' : '' !!}}>{{$label}}</option>
                                                    @endforeach
                                                </select>
                                                <input class="txt" type="text" id="user-contact-value-2" value="{{$user->contact_value_2}}">
                                            </div>
                                        </div>
                                        <div class="row-item clearfix">
                                            <label class="lbl" for="txt_name1">Contact 3</label>
                                            <div class="val">
                                                <p class="rs error" id="user-error-contact-type-3"></p>
                                                <p class="rs error" id="user-error-contact-value-3"></p>
                                                <select id="user-contact-type-3">
                                                    <option value=""></option>
                                                    @foreach(\App\User::PHONE_TYPES as $value => $label)
                                                        <option value="{{$value}}" {!! $user->contact_type_3 === $value ? ' selected="selected"' : '' !!}}>{{$label}}</option>
                                                    @endforeach
                                                </select>
                                                <input class="txt" type="text" id="user-contact-value-3" value="{{$user->contact_value_3}}">
                                            </div>
                                        </div>
                                        <div class="row-item clearfix">
                                            <label class="lbl" for="txt_name1">Country</label>
                                            <div class="val">
                                                <p class="rs error" id="user-error-country"></p>
                                                <select id="user-country">
                                                    @foreach($countries as $code => $country)
                                                        <option value="{{$code}}"{!! $user->country === $code || ($user->country === null && $code === 'US') ? ' selected="selected"' : '' !!}>{{$country}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row-item clearfix">
                                            <label class="lbl" for="txt_bio">Biuo (A short introduction of yourself):</label>
                                            <div class="val">
                                                <textarea class="txt fill-width" id="user-bio" cols="30" rows="10">{{$user->bio}}</textarea>
                                            </div>
                                        </div>

                                        <p class="wrap-btn-submit rs ta-r">
                                            <input type="submit" class="btn btn-pascal btn-submit-all" value="Save all settings">
                                        </p>
                                    </form>
                                </div>
                            </div><!--end: .tab-pane -->
                        </div>
                        <div>
                            <h3 class="rs alternate-tab accordion-label">KYC documents</h3>
                            <div class="tab-pane accordion-content{!! $area === 'kyc' ? ' active' : '' !!}">
                                <div class="info-box">
                                    @if($user->status === 'incomplete')
                                        Your account data is incomplete. Please provide all necessary account data as well as KYC documents. Thank you!
                                    @elseif($user->status === 'rejected')
                                        Your account verification is rejected. <br /><b>Reason:</b><br />{{$user->rejected_reason}}
                                    @elseif($user->status === 'pending')
                                        Your account verified is currently pending.
                                    @elseif($user->status === 'verified')
                                        Your account is verified.
                                    @endif
                                </div>

                                <div class="tab-pane-inside">
                                    <div class="form">
                                        <form action="#" id="form-documents" style="display: none;">
                                            <div class="row-item clearfix">
                                                <h4>Add document</h4>
                                            </div>
                                            <div class="row-item clearfix">
                                                <label class="lbl" for="txt_name1">Title</label>
                                                <div class="val">
                                                    <p class="rs error" id="kyc-error-title"></p>
                                                    <input class="txt" type="text" id="kyc-title" value="">
                                                </div>
                                            </div>
                                            <div class="row-item clearfix">
                                                <label class="lbl" for="txt_bio">Description:</label>
                                                <div class="val">
                                                    <textarea class="txt fill-width" id="kyc-description" cols="30" rows="10"></textarea>
                                                </div>
                                            </div>
                                            <div class="row-item clearfix">
                                                <label class="lbl" for="txt_name1">Select File:</label>
                                                <div class="val">
                                                    <input type="file" name="file">
                                                </div>
                                            </div>
                                            <p class="wrap-btn-submit rs ta-r">
                                                <input type="submit" class="btn btn-pascal btn-submit-all" value="Upload document">
                                            </p>
                                        </form>
                                        <button class="btn btn-pascal btn-submit-all" id="show-kyc-form" data-alternate-text="Cancel">Add document</button>
                                    </div>
                                    <h4>Your documents</h4>
                                    <div class="box-list-comment">
                                        @forelse($documents as $document)
                                            <div class="media comment-item">
                                                <div class="media-body">
                                                    <h4 class="rs comment-author">
                                                        <a href="#" class="be-fc-orange fw-b">{{$document->title}}<br />
                                                            <small>uploaded at {{$document->created_at}}</small></a>
                                                    </h4>
                                                    <p class="rs comment-content">
                                                        {{$document->description}}
                                                        Status: {{strtoupper($document->status)}}
                                                        <button class="btn btn-pascal btn-submit-all remove-kyc" data-id="{{$document->id}}" style="float: right">Remove</button>
                                                    </p>
                                                </div>
                                            </div>
                                        @empty
                                            <div style="color: red">You did not upload any document yet.</div>
                                        @endforelse
                                    </div>
                                </div>
                            </div><!--end: .tab-pane -->
                        </div>

                        <div>
                            <h3 class="rs alternate-tab accordion-label">Projects</h3>
                            <div class="tab-pane accordion-content{!! $area === 'proposal' ? ' active' : '' !!}">
                                <div class="tab-pane-inside">

                                    <div class="form">
                                        <form action="#" id="form-proposal" style="{!! $proposal === null ? 'display: none' : '' !!}">
                                            @if($proposal !== null)
                                                <input type="hidden" name="proposal-id" id="proposal-id" value="{{$proposal->id}}">
                                            @endif
                                            <div class="row-item clearfix">
                                                <h4>{!! $proposal === null ? 'Add' : 'Update' !!} Project</h4>
                                            </div>
                                            <div class="row-item clearfix">
                                                <label class="lbl" for="txt_name1">Title</label>
                                                <div class="val">
                                                    <p class="rs error" id="proposal-error-title"></p>
                                                    <input class="txt" type="text" id="proposal-title" value="{{optional($proposal)->title}}">
                                                </div>
                                            </div>
                                            <div class="row-item clearfix">
                                                <label class="lbl" for="txt_bio">Description:</label>
                                                <div class="val">
                                                    <p class="rs error" id="proposal-error-description"></p>
                                                    <textarea class="txt fill-width" id="proposal-description" cols="30" rows="10">{{optional($proposal)->description}}</textarea>
                                                </div>
                                            </div>
                                            <div class="row-item clearfix">
                                                <label class="lbl" for="txt_name1">Costs (USD)</label>
                                                <div class="val">
                                                    <p class="rs error" id="proposal-error-costs"></p>
                                                    <input class="txt" type="text" id="proposal-costs" value="{{optional($proposal)->costs}}">
                                                </div>
                                            </div>
                                            <div class="row-item clearfix">
                                                <label class="lbl" for="txt_name1">Destination PASA</label>
                                                <div class="val">
                                                    <p class="rs error" id="proposal-error-pasa"></p>
                                                    <input class="txt" type="text" id="proposal-pasa" value="{{optional($proposal)->pasa}}">
                                                </div>
                                            </div>
                                            <div class="row-item clearfix">
                                                <label class="lbl" for="txt_name1">Website</label>
                                                <div class="val">
                                                    <p class="rs error" id="proposal-error-website"></p>
                                                    <input class="txt" type="text" id="proposal-website" value="{{optional($proposal)->website}}">
                                                </div>
                                            </div>
                                            <div class="row-item clearfix">
                                                <label class="lbl" for="txt_name1">Source Code website:</label>
                                                <div class="val">
                                                    <p class="rs error" id="proposal-error-website"></p>
                                                    <input class="txt" type="text" id="proposal-source-code" value="{{optional($proposal)->source_code}}">
                                                </div>
                                            </div>
                                            <div class="row-item clearfix">
                                                <label class="lbl" for="txt_name1">Logo:</label>
                                                <div class="val">
                                                    <input type="file" name="logo" id="proposal-logo">
                                                </div>
                                            </div>
                                            <p class="wrap-btn-submit rs ta-r">
                                                <input type="submit" class="btn btn-pascal btn-submit-all" value="Save proposal">
                                            </p>
                                        </form>
                                        @if($proposal === null)
                                            <button class="btn btn-pascal btn-submit-all" id="show-proposal-form" data-alternate-text="Cancel">Add proposal</button>
                                        @else
                                            <a class="btn btn-pascal btn-submit-all" href="/profile?area=proposal">Cancel</a>
                                        @endif
                                    </div>
                                </div>
                                @forelse($proposals as $proposal)
                                    <div class="box-marked-proposal proposal-short inside-tab">
                                        <div class="top-proposal-info">
                                            <div class="content-info-short clearfix">
                                                @if($proposal->logo !== null)
                                                    <a href="#" class="thumb-img">
                                                        <img src="/storage/{{str_replace('public', '', $proposal->logo)}}" alt="$TITLE">
                                                    </a>
                                                @endif
                                                <div class="wrap-short-detail">
                                                    <h3 class="rs acticle-title"><a class="be-fc-orange" href="#">{{$proposal->title}}</a></h3>
                                                    <p class="rs tiny-desc">Website: <a href="#" class="fw-b fc-gray be-fc-orange">{{$proposal->website}}</a></p>
                                                    <p class="rs tiny-desc">Source: <a href="#" class="fw-b fc-gray be-fc-orange">{{$proposal->source_code}}</a></p>
                                                    <p class="rs title-description">{{$proposal->description}}</p>
                                                </div>
                                                <p class="rs clearfix comment-view">
                                                    @if($proposal->status === "draft")
                                                        <a href="/profile?area=proposal&proposal-id={{$proposal->id}}&action=propose" class="btn btn-pascal btn-submit-all">Propose proposal</a>
                                                    @endif
                                                    @if($proposal->status === "proposed")
                                                        <a href="/profile?area=proposal&proposal-id={{$proposal->id}}&action=unpropose" class="btn btn-pascal btn-submit-all">Unpropose</a>
                                                    @endif

                                                    @if($proposal->status === "draft")
                                                        <a href="/profile?area=proposal&proposal-id={{$proposal->id}}" class="btn btn-pascal btn-submit-all">Update proposal</a>
                                                    @endif
                                                    <a href="#" class="btn btn-pascal-red btn-submit-all">Delete proposal</a>
                                                </p>
                                            </div>
                                        </div><!--end: .top-proposal-info -->
                                        <div class="bottom-proposal-info clearfix">
                                            <div class="proposal-progress sys_circle_progress" data-percent="0">
                                                <div class="sys_holder_sector"></div>
                                            </div>
                                            <div class="group-fee clearfix">
                                                <div class="fee-item">
                                                    <p class="rs lbl">Pasa</p>
                                                    <span class="val">{{$proposal->pasa}}</span>
                                                </div>
                                                <div class="sep"></div>
                                                <div class="fee-item">
                                                    <p class="rs lbl">Paid/Costs</p>
                                                    <span class="val">0&dollar; / {{$proposal->costs}}&dollar;</span>
                                                </div>
                                                <div class="sep"></div>
                                                <div class="fee-item">
                                                    <p class="rs lbl">Payments left</p>
                                                    <span class="val">25</span>
                                                </div>
                                                <div class="sep"></div>
                                                <div class="fee-item">
                                                    <p class="rs lbl">Status</p>
                                                    <span class="val">{{strtoupper($proposal->status)}}</span>
                                                </div>
                                            </div>
                                            <div class="clear"></div>
                                        </div>
                                    </div><!--end: .box-marked-proposal -->
                                @empty
                                    <div style="color: red; padding: 20px">You did not add any proposal yet.</div>
                                @endforelse

                            </div><!--end: .tab-pane -->
                        </div>
                        <div>
                            <h3 class="rs alternate-tab accordion-label">Login data</h3>
                            <div class="tab-pane accordion-content{!! $area === 'login' ? ' active' : '' !!}">
                                <div class="form form-login">
                                    <form action="#" id="form-login">
                                        <div class="row-item clearfix">
                                            <label class="lbl" for="txt_name1">E-Mail</label>
                                            <div class="val">
                                                <p class="rs error" id="user-error-email"></p>
                                                <input class="txt" type="email" id="user-email" value="{{$user->email}}" data-original="{{$user->email}}">
                                            </div>
                                        </div>
                                        <div class="row-item clearfix">
                                            <p class="rs error" id="user-error-password"></p>
                                            <label class="lbl" for="txt_name1">Password</label>
                                            <div class="val">
                                                <input class="txt" type="password" id="user-password" value="">
                                            </div>
                                        </div>
                                        <div class="row-item clearfix">
                                            <p class="rs error" id="user-error-password-confirmation"></p>
                                            <label class="lbl" for="txt_name1">Password confirmation</label>
                                            <div class="val">
                                                <input class="txt" type="password" id="user-password-confirmation" value="">
                                            </div>
                                        </div>
                                        <p class="wrap-btn-submit rs ta-r">
                                            <input type="submit" class="btn btn-pascal btn-submit-all" value="Save all settings">
                                        </p>
                                    </form>
                                </div>
                            </div><!--end: .tab-pane -->
                        </div>
                    </div>
                </div><!--end: .proposal-tab-detail -->
            </div>
        </div><!--end: .content -->
        <div class="clear"></div>
    </div>
@endsection