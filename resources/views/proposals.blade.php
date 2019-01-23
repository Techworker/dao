@extends('layouts.app2')

@section('content')
    <div class="container p-4">
    <div class="row">
        <div class="col-md-9">
            @foreach($proposals as $type => $subProposals)
                <h2 class="mb-3 mt-3">
                @if($type === "public")
                    Submitted and Public Projects
                @elseif($type === "all")
                    All Projects
                @elseif($type === "approved")
                    Approved Projects
                @elseif($type === "activated")
                    Activated Projects
                @elseif($type === "aborted")
                    Aborted Projects
                @elseif($type === "completed")
                    Completed Projects
                @elseif($type === "suspended")
                    Suspended Projects
                @endif
                </h2>
                    @if(count($subProposals) === 0)
                        <div class="alert alert-primary">No Projects found.</div>@endif
                <div class="row">
                    @foreach($subProposals as $proposal)
                        @include('_common.proposal-item', ['proposal' => $proposal, 'admin' => false, 'colSize' => 6])
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
                <a href="{{\App\Http\Actions\Proposal\ShowListAction::route(['status' => \App\Proposal::STATUS_PUBLIC_REVIEW])}}" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center{!! $status === \App\Proposal::STATUS_PUBLIC_REVIEW ? ' active' : '' !!}">
                    Submitted & Public
                    <span class="badge badge-{!! $status === \App\Proposal::STATUS_PUBLIC_REVIEW ? 'contrast' : 'main' !!}">{{$counts[\App\Proposal::STATUS_PUBLIC_REVIEW]}}</span>
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