@extends('layouts.app')

@section('content')

    <div class="home-popular-proposal" style="padding-top: 20px;">
        <div class="container_12">
            @foreach($proposals as $type => $subProposals)
            <div class="grid_12 wrap-title" style="background: white; padding: 10px; margin-bottom: 10px;">
                <h2 class="common-title">
                    @if($type === "submitted")
                        Submitted proposals
                    @elseif($type === "approved")
                        Approved proposals
                    @elseif($type === "activated")
                        Activated proposals
                    @elseif($type === "aborted")
                        Aborted proposals
                    @elseif($type === "completed")
                        Completed proposals
                    @elseif($type === "suspended")
                        Suspended proposals
                    @endif
                </h2>
                @if($status === "all")
                <a style="padding-right: 10px;" class="be-fc-orange" href="{{route('proposals', ['status' => $type])}}">View all</a>
                @endif
                <p>
                    @if($type === "submitted")
                        Proposals awaiting approval.
                    @elseif($type === "approved")
                        Approved proposals awaiting to be activated.
                    @elseif($type === "activated")
                        Activated proposals which are in work.
                    @elseif($type === "aborted")
                        Proposals that were aborted.
                    @elseif($type === "completed")
                        Completed that were completed.
                    @elseif($type === "suspended")
                        Proposals that are temporary suspended.
                    @endif
                </p>
            </div>
            <div class="clear"></div>
            <div class="lst-popular-proposal clearfix">
                @forelse($subProposals as $subProposal)
                <div class="grid_3">
                    <div class="proposal-short sml-thumb">
                        <div class="top-proposal-info">
                            <div class="content-info-short clearfix">
                                <a href="#" class="thumb-img">
                                    <img src="/storage/{{str_replace('public', '', $subProposal->logo)}}" alt="$TITLE">
                                </a>
                                <div class="wrap-short-detail">
                                    <h3 class="rs acticle-title"><a class="be-fc-orange" href="{{route('proposal_detail', ['slug' => $subProposal->slug])}}">{{$subProposal->title}}</a></h3>
                                    <p class="rs tiny-desc">proposed by <a href="{{route('contractor', ['slug' => $proposal->proposerContractor->slug])}}" class="fw-b fc-gray be-fc-orange">{{$subProposal->proposerContractor->publicName()}}</a></p>
                                    <p class="rs title-description">{{substr($subProposal->description, 0, 200)}}..</p>
                                    <p class="rs proposal-location">
                                        <i class="icon iLocation"></i>
                                        {{$subProposal->proposerContractor->addresses->first()->country}}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!--end: .grid_3 > .proposal-short-->
                @empty
                    <p style="padding: 10px;">No
                        @if($type === "submitted")
                            submitted proposals
                        @elseif($type === "approved")
                            approved proposals
                        @elseif($type === "activated")
                            activated proposals
                        @elseif($type === "aborted")
                            aborted proposals
                        @elseif($type === "completed")
                            completed proposals
                        @elseif($type === "suspended")
                            suspended proposals
                        @endif
                    found.</p>
                @endforelse
            </div>
            @endforeach
        </div>
    </div><!--end: .home-popular-proposal -->
@endsection
