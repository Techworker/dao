<?php

/** @var $proposal \App\Proposal */

?>
@extends('layouts.app')

@section('content')

    <div class="layout-2cols">
    <div class="content grid_8">
        <div class="proposal-detail">
            <h2 class="rs proposal-title">{{$proposal->title}}</h2>
            <p class="rs post-by">proposed by <a href="{{\App\Http\Actions\Contractor\ShowAction::route(['contractor' => $proposal->proposerContractor, 'slug' => $proposal->proposerContractor->slug])}}">{{$proposal->proposerContractor->public_name}}</a></p>
            @if($proposal->logo !== null)
            <div class="proposal-short big-thumb">
                <div class="top-proposal-info">
                    <div class="content-info-short clearfix">
                        <div class="thumb-img">
                            <div class="rslides_container">
                                <ul class="rslides" id="slider1">
                                    <li><img src="/storage/{{str_replace('public', '', $proposal->logo)}}" alt=""></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div><!--end: .top-proposal-info -->
            </div>
            @endif
            <div class="proposal-tab-detail tabbable accordion">
                <ul class="nav nav-tabs clearfix">
                    <li class="active"><a href="#">About</a></li>
                    <li><a href="#" class="be-fc-orange">Documents</a></li>
                    <li><a href="#" class="be-fc-orange">Comments ({{$proposal->comments->count()}})</a></li>
                </ul>
                <div class="tab-content">
                    <div>
                        <h3 class="rs alternate-tab accordion-label">About</h3>
                        <div class="tab-pane active accordion-content">
                            <div class="editor-content">
                                {!! parsedown($proposal->description)!!}
                            </div>
                        </div><!--end: .tab-pane(About) -->
                    </div>
                    <div>
                        <h3 class="rs alternate-tab accordion-label">Documents</h3>
                        <div class="tab-pane accordion-content">
                            <div class="editor-content">
                                <h3 class="rs title-inside">Attached documents</h3>
                                @forelse($proposal->documents as $document)
                                    <p><b>{{$document->title}}</b><br />
                                        {{$document->description}}<br />
                                        <a href="/storage/{{$document->file}}" target="_blank">&raquo; Download.</a>
                                    </p>
                                    @empty
                                    <p>No documents attached to this proposal.</p>
                                @endforelse
                            </div>
                        </div><!--end: .tab-pane(About) -->
                    </div>
                    <div>
                        <h3 class="rs active alternate-tab accordion-label">Comments ({{$proposal->comments->count()}})</h3>
                        <div class="tab-pane accordion-content">
                            <div class="tab-pane-inside">
                            <div class="form">
                                <form action="#" id="form-comment" style="display: none">
                                    <input type="hidden" id="comment-proposal-id" value="{{$proposal->id}}">
                                    <div class="row-item clearfix">
                                        <h4>Add comment</h4>
                                    </div>
                                    <div class="row-item clearfix">
                                        <label class="lbl" for="txt_bio">Author:</label>
                                        <div class="val">{{\Auth::user()->name}}</div>
                                    </div>
                                    <div class="row-item clearfix">
                                        <label class="lbl" for="txt_bio">Text:</label>
                                        <div class="val">
                                            <p class="rs error" id="comment-error-description"></p>
                                            <textarea class="txt fill-width" id="comment-description" cols="30" rows="10"></textarea>
                                        </div>
                                    </div>
                                    <p class="wrap-btn-submit rs ta-r">
                                        <input type="submit" class="btn btn-pascal btn-submit-all" value="Save comment">
                                    </p>
                                </form>
                                <button class="btn btn-pascal btn-submit-all" id="show-comment-form" data-alternate-text="Cancel">Add comment</button>
                            </div>
                            </div>
                            @forelse($proposal->comments as $comment)
                            <div class="box-list-comment" style="padding: 20px">
                                <div class="media comment-item">
                                    <div class="media-body">
                                        <h4 class="rs comment-author">
                                            <a href="#" class="be-fc-orange fw-b">
                                                @if($comment->user->id === $proposal->proposerContractor->user->id) [Owner]@endif
                                                {{$comment->user->name}}</a>
                                            <span class="fc-gray">says:</span>
                                        </h4>
                                        <p class="rs comment-content">{{$comment->description}}</p>
                                        <p class="rs time-post">{{$comment->created_at}}</p>
                                    </div>
                                </div><!--end: .comment-item -->
                            </div>
                            @empty
                            No comments yet!
                            @endforelse
                        </div><!--end: .tab-pane(Comments) -->
                    </div>
                </div>
            </div><!--end: .proposal-tab-detail -->
        </div>
    </div><!--end: .content -->
    <div class="sidebar grid_4">
        <div class="proposal-runtime">
            <div class="box-gray">
                <div class="proposal-date clearfix">
                    <i class="icon iCalendar"></i>
                    <span class="val"><span class="fw-b">Proposed at </span>{{$proposal->created_at->toDateString()}}</span>
                </div>
                <p class="rs description">
                    @if($proposal->status === "submitted")
                        This proposal was submitted by <a href="{{\App\Http\Actions\Contractor\ShowAction::route(['contractor' => $proposal->proposerContractor, 'slug' => $proposal->proposerContractor->slug])}}">{{$proposal->proposerContractor->public_name}}</a> and is waiting for it's approval.
                    @elseif($proposal->status === "approved")
                        This proposal was approved submitted by {{$proposal->proposerContractor->public_name}} and is waiting for it to get contracted and activated.
                    @elseif($proposal->status === "activated")
                        This proposal is contracted and in active development.
                    @elseif($proposal->status === "aborted")
                        This proposal was aborted.
                    @elseif($proposal->status === "completed")
                        This proposal was completed and the contract ended.
                    @elseif($proposal->status === "suspended")
                        This proposal was suspended and is paused.
                    @endif
                </p>
            </div>
        </div>
        @foreach($proposal->contracts as $contract)
        <div class="proposal-author">
            <div class="box-gray">
                <h3 class="title-box">Contract {{$loop->iteration}}</h3>
                <div class="media">
                    @if($contract->contractor->logo !== null)
                        <a href="#" class="thumb-left">
                            <img src="/storage/{{$contract->contractor->logo}}" alt="{{$contract->contractor->public_name}}"/>
                        </a>
                    @endif
                    <div class="media-body">
                        <h4 class="rs pb10"><a href="{{\App\Http\Actions\Contractor\ShowAction::route(['contractor' => $contract->contractor, 'slug' => $contract->contractor->slug])}}" class="be-fc-orange fw-b">{{$contract->contractor->public_name}}</a></h4>
                        <p>
                            <b>Status: </b> {{$contract->latestStatus()}}<br />
                            <b>Runtime:</b> {{$contract->start->toDateString()}} - {{$contract->end ? $contract->end->toDateString() : 'Unknown'}}<br />
                            <b>Type:</b> {{$contract->type}}<br />
                            <b>Payout-Type:</b> {{$contract->payout_type}}<br />
                            <b>Amount:</b> {{$contract->total_value}} {{$contract->total_currency}}<br />
                            <b>Role:</b> {{$contract->role}}<br />
                            {{$contract->role_description}}
                        </p>
                    </div>
                </div>
                <div class="author-action">
                    <a class="btn btn-white" href="{{\App\Http\Actions\Proposal\ShowPayoutsAction::route(['proposal' => $proposal, 'slug' => $proposal->slug, 'contract' => $contract])}}">See payouts</a>
                </div>
            </div>
        </div>
        @endforeach

        <div class="proposal-author">
            <div class="box-gray">
                <h3 class="title-box">Proposed by</h3>
                <div class="media">
                    @if($proposal->proposerContractor->logo !== null)
                        <a href="#" class="thumb-left">
                            <img src="/storage/{{$proposal->proposerContractor->logo}}" alt="{{$proposal->perop}}"/>
                        </a>
                    @endif
                    <div class="media-body">
                        <h4 class="rs pb10"><a href="{{\App\Http\Actions\Contractor\ShowAction::route(['contractor' => $proposal->proposerContractor, 'slug' => $proposal->proposerContractor->slug])}}" class="be-fc-orange fw-b">{{$proposal->proposerContractor->public_name}}</a></h4>
                        <p class="rs fc-gray">{{$proposal->proposerContractor->proposals->count() - 1}} other proposals</p>
                    </div>
                </div>
                <div class="author-action">
                    <a class="btn btn-white" href="{{\App\Http\Actions\Contractor\ShowAction::route(['contractor' => $proposal->proposerContractor, 'slug' => $proposal->proposerContractor->slug])}}">See full bio</a>
                </div>
            </div>
        </div><!--end: .proposal-author -->
        <div class="clear clear-2col"></div>
    </div><!--end: .sidebar -->
    <div class="clear"></div>
</div>
    @endsection