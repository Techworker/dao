<?php

/** @var $proposal \App\Proposal */
?>

@extends('layouts.app2')

@section('content')
    <div class="row">
        <div class="col-12">
            <h1>PascalCOin DAO</h1>
            <p><p>The decentralized autonomous organization website for the PascalCoin proposal.</p></p>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <h2>Recently updated proposals</h2>
        </div>
        @foreach($proposals as $proposal)
        <div class="col-md-4">
            <div class="card" style="width: 18rem;">
                @if($proposal->logo !== null)
                <img class="card-img-top" src="{{asset('/storage/' . $proposal->logo)}}" alt="Card image cap">
                @endif
                <div class="card-body">
                    <h5 class="card-title">{{$proposal->title}}</h5>
                    <p class="card-text">{{substr($proposal->description, 0, 100)}}</p>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">proposed by: {{$proposal->proposerContractor->public_name}}</li>
                    <li class="list-group-item">Status: {{\App\Proposal::STATUS_TYPES[$proposal->latestStatus()->name]}}</li>
                </ul>
                <div class="card-body">
                    <a href="#" class="card-link">Show proposal</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
@endsection
