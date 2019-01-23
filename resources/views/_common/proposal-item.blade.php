<?php if(!isset($colSize)) $colSize = 4; ?>
<div class="col-md-{{$colSize}} d-flex align-items-stretch">
    <div class="card mb-4" style="width: 100%;">
        @if($proposal->logo !== null)
            <a href="{{\App\Http\Actions\Profile\Proposal\ShowFormAction::route(['proposal' => $proposal])}}"><img class="card-img-top" src="{{asset('storage/' . $proposal->logo)}}" alt="{{$proposal->title}}"></a>
        @else
            <a href="{{\App\Http\Actions\Profile\Proposal\ShowFormAction::route(['proposal' => $proposal])}}"><img class="card-img-top" src="{{asset('images/default-header.png')}}" alt="{{$proposal->title}}"></a>
        @endif
        <div class="card-body">
            <span class="item-status item-status-{{strtolower($proposal->latestStatus()->name)}}" data-readable="{{\App\Proposal::STATUS_TYPES[$proposal->latestStatus()->name]}}"><i class="fas fa-check"></i></span>
            <h5 class="card-title">
                @if($admin === true)
                    <a href="{{\App\Http\Actions\Profile\Proposal\ShowFormAction::route(['proposal' => $proposal])}}">{{$proposal->title}}</a>
                @else
                    <a href="{{\App\Http\Actions\Proposal\ShowDetailAction::route(['proposal' => $proposal, 'slug' => $proposal->slug])}}">{{$proposal->title}}</a>
                @endif
            </h5>
            @if($admin === true)
                <h6 class="card-subtitle mb-2 text-muted">{{$proposal->proposerContractor->publicName()}} ({{$proposal->proposerContractor->public_name}})</h6>
            @else
                <h6 class="card-subtitle mb-2 text-muted">{{$proposal->proposerContractor->public_name}}</h6>
            @endif
            <p>{{$proposal->intro}}</p>
            @if($admin === true)
            <dl>
                <dt>Status: {{\App\Proposal::STATUS_TYPES[$proposal->latestStatus()->name]}} ({{$proposal->latestStatus()->created_at->format('Y-m-d')}})</dt>
                <dd>{{$proposal->latestStatus()->reason}}</dd>
            </dl>
            <div>
                <a href="{{\App\Http\Actions\Profile\Proposal\ShowFormAction::route(['proposal' => $proposal])}}" class="card-link"><i class="fas fa-user-edit"></i> Update</a>
                <a href="{{\App\Http\Actions\Profile\Proposal\DeleteAction::route(['proposal' => $proposal])}}" class="card-link delete"><i class="fas fa-user-times"></i> Delete</a>
            </div>
            @if($proposal->latestStatus()->name === \App\Proposal::STATUS_SUBMITTED || $proposal->latestStatus()->name === \App\Proposal::STATUS_DRAFT)
                <div class="mt-4">
                    @if($proposal->latestStatus()->name === \App\Proposal::STATUS_DRAFT)
                        <a href="{{\App\Http\Actions\Profile\Proposal\Api\SubmitAction::route(['proposal' => $proposal])}}" class="card-link submit-proposal"><i class="fas fa-check"></i> Submit</a>
                    @endif
                    @if($proposal->latestStatus()->name === \App\Proposal::STATUS_SUBMITTED)
                        <a href="{{\App\Http\Actions\Profile\Proposal\Api\SubmitRevokeAction::route(['proposal' => $proposal])}}" class="card-link submit-proposal-revoke"><i class="fas fa-check"></i> Revoke Submission</a>
                    @endif
                </div>
            @endif
            @else
                <a href="{{\App\Http\Actions\Proposal\ShowDetailAction::route(['proposal' => $proposal, 'slug' => $proposal->slug])}}" class="card-link float-right">Details</a>
            @endif
        </div>
    </div>
</div>