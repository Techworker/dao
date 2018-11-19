@extends('layouts.app2')

@section('content')
    <div class="row">
        <div class="col-md-9">
            @foreach($proposals as $type => $subProposals)
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
                <div class="row">
                    @forelse($subProposals as $proposal)
                        <div class="col-md-4">
                            <div class="card" style="width: 18rem;">
                                @if($proposal->logo !== null)
                                    <img class="card-img-top" src="{{asset('/storage/' . $proposal->logo)}}" alt="Card image cap">
                                @endif
                                <div class="card-body">
                                    <h5 class="card-title">{{$proposal->title}}</h5>
                                    <p class="card-text">{{$proposal->intro}}</p>
                                </div>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">proposed by: {{$proposal->proposerContractor->public_name}}</li>
                                    <li class="list-group-item">Status: {{\App\Proposal::STATUS_TYPES[$proposal->latestStatus()->name]}}</li>
                                </ul>
                                <div class="card-body">
                                    <a href="#" class="card-link float-right">Show proposal</a>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-md-12">No proposals in this category.</div>
                    @endforelse
                </div>
                @endforeach
        </div>
        <div class="col-md-3">
            <ul class="list-group">

                <a href="{{\App\Http\Actions\Proposal\ShowListAction::route(['status' => 'all'])}}" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center{!! $status === 'all' ? ' active' : '' !!}">
                    All
                    <span class="badge badge-warning">{{$counts['all']}}</span>
                </a>
                <a href="{{\App\Http\Actions\Proposal\ShowListAction::route(['status' => \App\Proposal::STATUS_SUBMITTED])}}" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center{!! $status === \App\Proposal::STATUS_SUBMITTED ? ' active' : '' !!}">
                    Submitted
                    <span class="badge badge-warning">{{$counts[\App\Proposal::STATUS_SUBMITTED]}}</span>
                </a>
                <a href="{{\App\Http\Actions\Proposal\ShowListAction::route(['status' => \App\Proposal::STATUS_APPROVED])}}" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center{!! $status === \App\Proposal::STATUS_APPROVED ? ' active' : '' !!}">
                    Approved
                    <span class="badge badge-warning">{{$counts[\App\Proposal::STATUS_APPROVED]}}</span>
                </a>
                <a href="{{\App\Http\Actions\Proposal\ShowListAction::route(['status' => \App\Proposal::STATUS_ACTIVATED])}}" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center{!! $status === \App\Proposal::STATUS_ACTIVATED ? ' active' : '' !!}">
                    Activated
                    <span class="badge badge-warning">{{$counts[\App\Proposal::STATUS_ACTIVATED]}}</span>
                </a>
                <a href="{{\App\Http\Actions\Proposal\ShowListAction::route(['status' => \App\Proposal::STATUS_ABORTED])}}" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center{!! $status === \App\Proposal::STATUS_ABORTED ? ' active' : '' !!}">
                    Aborted
                    <span class="badge badge-warning">{{$counts[\App\Proposal::STATUS_ABORTED]}}</span>
                </a>
                <a href="{{\App\Http\Actions\Proposal\ShowListAction::route(['status' => \App\Proposal::STATUS_COMPLETED])}}" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center{!! $status === \App\Proposal::STATUS_COMPLETED ? ' active' : '' !!}">
                    Completed
                    <span class="badge badge-warning">{{$counts[\App\Proposal::STATUS_COMPLETED]}}</span>
                </a>
                <a href="{{\App\Http\Actions\Proposal\ShowListAction::route(['status' => \App\Proposal::STATUS_SUSPENDED])}}" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center{!! $status === \App\Proposal::STATUS_SUSPENDED ? ' active' : '' !!}">
                    Suspended
                    <span class="badge badge-warning">{{$counts[\App\Proposal::STATUS_SUSPENDED]}}</span>
                </a>
            </ul>
        </div>
    </div>
@endsection