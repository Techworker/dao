@extends('layouts.app2')

@section('content')
    <div class="container p-4">
        <div class="row">
            <div class="col-md-12">
                <h2>Upcoming Voting(s)</h2>
            </div>
        </div>
        @if(count($upcoming) == 0)
            <div class="row">
                <div class="col-md-12">
                    No upcoming votes.
                </div>
            </div>
        @endif
        <div class="row">
            @foreach($upcoming as $proposal)
                <div class="col-md-4 d-flex align-items-stretch">
                    <div class="card mb-4" style="width: 100%;">
                        @if($proposal->logo !== null)
                            <img class="card-img-top" src="{{asset('/storage/' . $proposal->logo)}}" alt="Card image cap">
                        @endif
                        <div class="card-body">
                            <span class="item-status item-status-{{strtolower($proposal->latestStatus()->name)}}" data-readable="{{\App\Proposal::STATUS_TYPES[$proposal->latestStatus()->name]}}"><i class="fas fa-check"></i></span>
                            <h5 class="card-title {{$proposal->logo === null ? 'mt-3' : ''}}">{{$proposal->title}}</h5>
                            <h6 class="card-subtitle mb-2 text-muted">{{$proposal->proposerContractor->public_name}}</h6>
                            <p>{{$proposal->intro}}</p>
                            <p>Voting starts at {{$proposal->voting_start->format('Y-m-d H:i')}}</p>
                            <a href="{{\App\Http\Actions\Proposal\ShowDetailAction::route(['proposal' => $proposal, 'slug' => $proposal->slug])}}" class="card-link float-right">Details</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection