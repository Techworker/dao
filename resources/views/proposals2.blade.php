
@extends('layouts.app')

@section('content')
    <div class="layout-2cols">
        <div class="content grid_9">
            <div class="search-result-page">
                <div class="top-lbl-val">
                    <h3 class="common-title">Proposals / <span class="fc-orange">
                        @if($status === "submitted")
                                Submitted
                            @elseif($status === "all")
                                All
                            @elseif($status === "approved")
                                Approved
                            @elseif($status === "activated")
                                Activated
                            @elseif($status === "aborted")
                                Aborted
                            @elseif($status === "completed")
                                Completed
                            @elseif($status === "suspended")
                                Suspended
                            @endif
                    </span></h3>
                    <div class="count-result">
                        <span class="fw-b fc-black">{{$counts[$status]}} proposals</span>
                        @if($status === "submitted")
                            submitted and awaiting approval.
                        @elseif($status === "approved")
                            approved awaiting to be activated.
                        @elseif($status === "activated")
                            activated which are in work.
                        @elseif($status === "aborted")
                            aborted and no longer active.
                        @elseif($status === "completed")
                            completed.
                        @elseif($status === "suspended")
                            that are temporary suspended.
                        @elseif($status === "all")
                            Please use the filter on the right.
                        @endif

                    </div>
                </div>
                @foreach($proposals as $type => $subProposals)
                    <div class="list-proposal-in-category">
                        @if($status !== $type)
                            <div class="lbl-type clearfix">
                                <h4 class="rs title-lbl">
                                    <a href="{{\App\Http\Actions\Proposal\ShowListAction::route(['status' => $type])}}" class="be-fc-orange">
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
                                    </a></h4>
                                @if($status === "all")
                                    <a href="{{\App\Http\Actions\Proposal\ShowListAction::route(['status' => $type])}}" class="view-all be-fc-orange">View all ({{$counts[$type]}})</a>
                                @endif
                                <div class="clearfix"></div>
                            </div>
                        @endif
                        <div class="list-proposal">
                            @forelse($subProposals as $subProposal)
                                <div class="grid_3">
                                    <div class="proposal-short sml-thumb">
                                        <div class="top-proposal-info">
                                            <div class="content-info-short clearfix">
                                                @if($subProposal->logo !== null)
                                                    <a href="#" class="thumb-img">
                                                        <img src="{{asset('storage/' . $subProposal->logo)}}" alt="{{$subProposal->title}}">
                                                    </a>
                                                @endif
                                                <div class="wrap-short-detail"{!! $subProposal->logo === null ? ' style="padding-top: 0"' : '' !!}>
                                                    <h3 class="rs acticle-title"><a class="be-fc-orange" href="{{\App\Http\Actions\Proposal\ShowDetailAction::route(['proposal' => $subProposal, 'slug' => $subProposal->slug])}}">{{$subProposal->title}}</a></h3>
                                                    <p class="rs tiny-desc">proposed by<br /><a href="{{\App\Http\Actions\Contractor\ShowAction::route(['contractor' => $subProposal->proposerContractor, 'slug' => $subProposal->proposerContractor->slug])}}" class="fw-b fc-gray be-fc-orange">{{ $subProposal->proposerContractor->public_name }}</a></p>
                                                    <p class="rs title-description">
                                                        {{substr($subProposal->description, 0, 100)}}..
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @if($loop->iteration % 3 === 0 && $loop->count > $loop->iteration)
                                    <div class="clear"></div>
                                @endif
                            @empty
                                <div class="grid_9" style="background: white; padding: 20px;"><b>No proposals found.</b></div>
                            @endforelse
                            <div class="clear"></div>
                        </div>
                    </div><!--end: .list-proposal-in-category -->
                @endforeach
            </div><!--end: .search-result-page -->
        </div><!--end: .content -->
        <div class="sidebar grid_3">
            <div class="left-list-category">
                <h4 class="rs title-nav">Proposals</h4>
                <ul class="rs nav nav-category">
                    <li{!! $status === 'all' ? ' class="active"' : '' !!}>
                        <a href="{{\App\Http\Actions\Proposal\ShowListAction::route(['status' => 'all'])}}">
                            All proposals
                            <span class="count-val">({{$counts['all']}})</span>
                            <i class="icon iPlugGray"></i>
                        </a>
                    </li>
                    <li{!! $status === 'submitted' ? ' class="active"' : '' !!}>
                        <a href="{{\App\Http\Actions\Proposal\ShowListAction::route(['status' => 'submitted'])}}">
                            Submitted
                            <span class="count-val">({{$counts['submitted']}})</span>
                            <i class="icon iPlugGray"></i>
                        </a>
                    </li>
                    <li{!! $status === 'approved' ? ' class="active"' : '' !!}>
                        <a href="{{\App\Http\Actions\Proposal\ShowListAction::route(['status' => 'approved'])}}">
                            Approved
                            <span class="count-val">({{$counts['approved']}})</span>
                            <i class="icon iPlugGray"></i>
                        </a>
                    </li>
                    <li{!! $status === 'activated' ? ' class="active"' : ''!!}>
                        <a href="{{\App\Http\Actions\Proposal\ShowListAction::route(['status' => 'activated'])}}">
                            Activated
                            <span class="count-val">({{$counts['activated']}})</span>
                            <i class="icon iPlugGray"></i>
                        </a>
                    </li>
                    <li{!! $status === 'aborted' ? ' class="active"' : ''!!}>
                        <a href="{{\App\Http\Actions\Proposal\ShowListAction::route(['status' => 'aborted'])}}">
                            Aborted
                            <span class="count-val">({{$counts['aborted']}})</span>
                            <i class="icon iPlugGray"></i>
                        </a>
                    </li>
                    <li{!! $status === 'completed' ? ' class="active"' : ''!!}>
                        <a href="{{\App\Http\Actions\Proposal\ShowListAction::route(['status' => 'completed'])}}">
                            Completed
                            <span class="count-val">({{$counts['completed']}})</span>
                            <i class="icon iPlugGray"></i>
                        </a>
                    </li>
                    <li{!! $status === 'suspended' ? ' class="active"' : ''!!}>
                        <a href="{{\App\Http\Actions\Proposal\ShowListAction::route(['status' => 'suspended'])}}">
                            Suspended
                            <span class="count-val">({{$counts['suspended']}})</span>
                            <i class="icon iPlugGray"></i>
                        </a>
                    </li>
                </ul>
            </div><!--end: .left-list-category -->
            <div class="left-list-category">
                <h4 class="rs title-nav">Tags</h4>
                <ul class="rs nav nav-category">
                    <li>
                        <a href="#">
                            Tag 1
                            <span class="count-val">(12)</span>
                            <i class="icon iPlugGray"></i>
                        </a>
                    </li>
                    <li class="active">
                        <a href="#">
                            Tag 2
                            <span class="count-val">(12)</span>
                            <i class="icon iPlugGray"></i>
                        </a>
                    </li>
                </ul>
            </div><!--end: .left-list-category -->
        </div><!--end: .sidebar -->
        <div class="clear"></div>
    </div>
@endsection