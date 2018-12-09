@extends('layouts.app2')

@section('content')
    <div class="container p-4">
    <div class="row">
        <div class="col-md-9">
            @foreach($proposals as $type => $subProposals)
                @if($status !== 'all')
                <h2 class="mb-3 mt-3">
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
                @endif
                <div class="row">
                    @foreach($subProposals as $proposal)
                        <div class="col-md-4">
                            <div class="card mb-4">
                                @if($proposal->logo !== null)
                                    <img class="card-img-top" src="{{asset('/storage/' . $proposal->logo)}}" alt="Card image cap">
                                @endif
                                <div class="card-body">
                                    <h5 class="card-title">{{$proposal->title}}</h5>
                                    <p class="card-text">{{$proposal->intro}}</p>
                                    <a href="{{\App\Http\Actions\Proposal\ShowDetailAction::route(['proposal' => $proposal, 'slug' => $proposal->slug])}}" class="card-link float-right">Show proposal</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                @endforeach
        </div>
        <div class="col-md-3">
            <h4>FILTER</h4>
            <ul class="list-group">
                <a href="{{\App\Http\Actions\Proposal\ShowListAction::route(['status' => 'all'])}}" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center{!! $status === 'all' ? ' active' : '' !!}">
                    All
                    <span class="badge badge-{!! $status === 'all' ? 'contrast' : 'main' !!}">{{$counts['all']}}</span>
                </a>
                <a href="{{\App\Http\Actions\Proposal\ShowListAction::route(['status' => \App\Proposal::STATUS_SUBMITTED])}}" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center{!! $status === \App\Proposal::STATUS_SUBMITTED ? ' active' : '' !!}">
                    Submitted
                    <span class="badge badge-{!! $status === \App\Proposal::STATUS_SUBMITTED ? 'contrast' : 'main' !!}">{{$counts[\App\Proposal::STATUS_SUBMITTED]}}</span>
                </a>
                <a href="{{\App\Http\Actions\Proposal\ShowListAction::route(['status' => \App\Proposal::STATUS_APPROVED])}}" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center{!! $status === \App\Proposal::STATUS_APPROVED ? ' active' : '' !!}">
                    Approved
                    <span class="badge badge-{!! $status === \App\Proposal::STATUS_APPROVED ? 'contrast' : 'main' !!}">{{$counts[\App\Proposal::STATUS_APPROVED]}}</span>
                </a>
                <a href="{{\App\Http\Actions\Proposal\ShowListAction::route(['status' => \App\Proposal::STATUS_ACTIVATED])}}" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center{!! $status === \App\Proposal::STATUS_ACTIVATED ? ' active' : '' !!}">
                    Activated
                    <span class="badge badge-{!! $status === \App\Proposal::STATUS_ACTIVATED ? 'contrast' : 'main' !!}">{{$counts[\App\Proposal::STATUS_ACTIVATED]}}</span>
                </a>
                <a href="{{\App\Http\Actions\Proposal\ShowListAction::route(['status' => \App\Proposal::STATUS_ABORTED])}}" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center{!! $status === \App\Proposal::STATUS_ABORTED ? ' active' : '' !!}">
                    Aborted
                    <span class="badge badge-{!! $status === \App\Proposal::STATUS_ABORTED ? 'contrast' : 'main' !!}">{{$counts[\App\Proposal::STATUS_ABORTED]}}</span>
                </a>
                <a href="{{\App\Http\Actions\Proposal\ShowListAction::route(['status' => \App\Proposal::STATUS_COMPLETED])}}" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center{!! $status === \App\Proposal::STATUS_COMPLETED ? ' active' : '' !!}">
                    Completed
                    <span class="badge badge-{!! $status === \App\Proposal::STATUS_COMPLETED ? 'contrast' : 'main' !!}">{{$counts[\App\Proposal::STATUS_COMPLETED]}}</span>
                </a>
                <a href="{{\App\Http\Actions\Proposal\ShowListAction::route(['status' => \App\Proposal::STATUS_SUSPENDED])}}" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center{!! $status === \App\Proposal::STATUS_SUSPENDED ? ' active' : '' !!}">
                    Suspended
                    <span class="badge badge-{!! $status === \App\Proposal::STATUS_SUSPENDED ? 'contrast' : 'main' !!}">{{$counts[\App\Proposal::STATUS_SUSPENDED]}}</span>
                </a>
            </ul>
        </div>
    </div>
    </div>
@endsection