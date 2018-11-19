<?php
/** @var $proposal \App\Proposal */
?>

@extends('profile')

@section('sub')
    <div style="border-left: 1px solid #d4d4d4;border-right: 1px solid #d4d4d4;border-bottom: 1px solid #d4d4d4;padding: 20px;">
        <h2 class="title">Proposals</h2>
        <p>This displays a list of contractors for your account. Each contractor records can own multiple proposals and all invoicing will be made against these records.</p>
        <div id="list-blog-ajax" class="list-last-post">
            @forelse($proposals as $proposal)
            <div class="media other-post-item" style="margin-top: 10px; margin-bottom: 10px; border-bottom: 2px solid #d4d4d4">
                @if($proposal->logo !== null)
                <a href="#" class="thumb-left" style="min-height: 100px;">
                    <img src="{{asset('storage/' . $proposal->logo)}}" alt="{{$proposal->title}}">
                </a>
                @endif
                <div class="media-body">
                    <h4 class="rs title-other-post">
                        <a href="#" class="be-fc-orange fw-b">{{$proposal->title}}</a>
                    </h4>
                    <p class="rs fc-gray time-post pb10">
                        Status: {{ucfirst($proposal->status())}}
                        @if((string)$proposal->status() === \App\Proposal::STATUS_DRAFT)
                            <br />This proposal is not visible for anyone except yourself.
                        @endif
                        @if((string)$proposal->status() === \App\Proposal::STATUS_SUBMITTED)
                            <br />Waiting for approval.
                        @endif
                    </p>
                    <b>Documents:</b>
                    <ul>
                        @forelse($proposal->documents as $document)
                            <li>
                                <a href="/storage/{{$document->file}}" target="_blank">[{{$document->latestStatus()}}] {{$document->title}}</a>
                                <br />
                                <a class="btn btn-pascal btn-small" href="{{\App\Http\Actions\Profile\ProposalDocument\ShowUpdateFormAction::route(['proposal' => $proposal, 'document' => $document])}}">update</a>
                                <a class="btn btn-pascal-red btn-small" href="{{\App\Http\Actions\Profile\ProposalDocument\DeleteAction::route(['proposal' => $proposal, 'document' => $document])}}">delete</a>
                            </li>
                        @empty
                            <li>No documents found.</li>
                        @endforelse
                    </ul>
                </div>

                @if((string)$proposal->status() === \App\Proposal::STATUS_DRAFT)
                    <a class="btn btn-pascal" href="{{\App\Http\Actions\Profile\Proposal\SubmitAction::route(['proposal' => $proposal])}}">Submit proposal</a>
                @else
                    <a class="btn btn-pascal" href="{{\App\Http\Actions\Profile\Proposal\RevokeAction::route(['proposal' => $proposal])}}">Revoke</a>
                @endif

                <a class="btn btn-pascal" href="{{\App\Http\Actions\Profile\ProposalDocument\ShowCreateFormAction::route(['proposal' => $proposal])}}">Add document</a>
                <a class="btn btn-pascal" href="{{\App\Http\Actions\Profile\Proposal\ShowUpdateFormAction::route(['proposal' => $proposal])}}">Update proposal</a>
                <a class="btn btn-pascal-red " href="{{\App\Http\Actions\Profile\Proposal\DeleteAction::route(['proposal' => $proposal])}}">Delete proposal</a>
            </div><!--end: .other-post-item -->
                @empty
                No proposals
            @endforelse

            <a style="float: right;" class="btn btn-pascal btn-submit-all" href="{{\App\Http\Actions\Profile\Proposal\ShowCreateFormAction::route()}}">Create new proposal</a>
            <div class="clearfix"></div>
        </div>
    </div>
@endsection