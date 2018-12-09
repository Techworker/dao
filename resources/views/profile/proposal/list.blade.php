<?php
/** @var $proposal \App\Proposal */
?>

@extends('profile')

@section('sub')
    <div class="row">
        <div class="col-md-12">
            <h2>Proposals</h2>
            <p>dasdas</p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-9">
            <div class="row">
                @foreach($proposals as $proposal)
                    <div class="col-md-6 col-sm-12">
                        <div class="card">
                            @if($proposal->logo !== null)
                                <img class="card-img-top" src="{{asset('storage/' . $proposal->logo)}}" alt="Card image cap">
                            @endif
                            <div class="card-body">
                                <h5 class="card-title">{{$proposal->title}}</h5>
                                <p>{{$proposal->intro}}</p>
                                <p class="card-text">
                                    Status: {{ucfirst($proposal->status())}}
                                    @if((string)$proposal->status() === \App\Proposal::STATUS_DRAFT)
                                        <br />This proposal is not visible for anyone except yourself.
                                    @endif
                                    @if((string)$proposal->status() === \App\Proposal::STATUS_SUBMITTED)
                                        <br />Waiting for approval.
                                    @endif
                                </p>
                            </div>
                            <div class="card-body">
                                <a href="{{\App\Http\Actions\Profile\Proposal\ShowFormAction::route(['proposal' => $proposal])}}" class="card-link">Update</a>
                                <a href="{{\App\Http\Actions\Profile\Proposal\DeleteAction::route(['proposal' => $proposal])}}" class="card-link">Delete</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="col-md-3">
            <a class="btn btn-primary" href="{{\App\Http\Actions\Profile\Proposal\ShowFormAction::route()}}">Create new Proposal</a>
            Notifications
        </div>
    </div>

@endsection