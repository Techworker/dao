<?php

/** @var $proposal \App\Proposal */

?>
@extends('layouts.app2')

@section('content')
    <div class="container p-4">
    <div class="row">
        <div class="col-md-12">
            <h2>{{$proposal->title}}</h2>
            <p><span class="text-uppercase font-weight-bold">proposed by</span> <a href="{{\App\Http\Actions\Contractor\ShowAction::route(['contractor' => $proposal->proposerContractor, 'slug' => $proposal->proposerContractor->slug])}}">{{$proposal->proposerContractor->public_name}}</a></p>
        </div>
    </div>
    <div class="row">
        @if($proposal->logo !== null)
        <div class="col-md-5">
            <div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="d-block w-100" src="{{asset('storage/' . $proposal->logo)}}" alt="First slide">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
        <div class="col-md-7">
        @else
        <div class="col-md-12">
        @endif
            {!! $proposal->description_html !!}
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <ul class="nav nav-tabs mt-4">
                <li class="nav-item">
                    <a class="nav-link active" id="info-tab" data-toggle="tab" href="#info" role="tab" aria-controls="info" aria-selected="true">Info</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="discussion-tab" data-toggle="tab" href="#discussion" role="tab" aria-controls="discussion" aria-selected="true">Questions &amp; Answers</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="voting-tab" data-toggle="tab" href="#voting" role="tab" aria-controls="voting" aria-selected="true">Voting</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="contractors-tab" data-toggle="tab" href="#contractors" role="tab" aria-controls="contractors" aria-selected="true">Contracts</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="payments-tab" data-toggle="tab" href="#payments" role="tab" aria-controls="payments" aria-selected="true">Payments</a>
                </li>
            </ul>
            <div class="tab-content p-2 pt-3">
                <div class="tab-pane fade show active" id="info" role="tabpanel" aria-labelledby="info-tab">
                    <h3>Information</h3>
                    <ul>
                        <li>The proposed costs for this project are <u>{{$proposal->proposed_value}} {{$proposal->proposed_currency}}</u></li>
                        <li>The Status of the project is <u>{{$proposal::STATUS_TYPES[$proposal->latestStatus()->name]}}</u></li>
                        <li>Website: <a href="{{$proposal->website}}">{{$proposal->website}}</a></li>
                        <li>Source: <a href="{{$proposal->source_code}}">{{$proposal->source_code}}</a></li>
                    </ul>
                    @if($proposal->documents->count() > 0)
                    <h4>Attachments</h4>
                    <ul>
                    @foreach($proposal->documents as $document)
                        @if($document->file !== null)
                                <li><a href="{{asset('storage/' . $document->file)}}" target="_blank">{{$document->title}}</a></li>
                        @endif
                    @endforeach
                    </ul>
                    @endif
                </div>
                <div class="tab-pane fade" id="discussion" role="tabpanel" aria-labelledby="discussion-tab">
                    <h3>Questions &amp; Answers.</h3>
                    <p>Embedded forum thread (Flarum)</p>

                </div>
                <div class="tab-pane fade" id="voting" role="tabpanel" aria-labelledby="voting-tab">
                    <h3>Voting</h3>
                    <p>
                    @if($proposal->voting_type === $proposal::VOTING_TYPE_BLOCKCHAIN)
                        The vote will happen on the blockchain.
                    @else
                        The vote will happen on discord in the #polls channel.
                    @endif
                    </p>
                    <p>
                    @if($proposal->vote_from === null)
                        No voting dates set yet.
                    @else
                        Voting will take place from {{$proposal->voting_start->toDateTimeString()}} to {{$proposal->voting_end->toDateTimeString()}} (UTC)
                    @endif
                    </p>
                </div>
                <div class="tab-pane fade" id="contractors" role="tabpanel" aria-labelledby="contractors-tab">
                    <h3>Contracts</h3>
                    <p>The list of contracts resulted from the proposal.</p>
                    @if($proposal->contracts->count() === 0)
                        <div class="alert alert-info">No contracts yet.</div>
                    @else
                        @foreach($proposal->contracts as $contract)
                            <div class="card">
                                <div class="card-body">
                                    @if($contract->contractor->logo !== null)
                                    <img src="{{asset('storage/' . $contract->contractor->logo)}}" alt="..." class="img-thumbnail float-left mr-3">
                                    @endif
                                    <h5 class="card-title">{{$contract->contractor->public_name}}</h5>
                                    <p class="card-subtitle">{{$contract->role}}</p>
                                    <p class="card-text">
                                        {{$contract->role_description}}
                                        <br />
                                        <u>Duration:</u> {{$contract->start->toDateString()}} - {{$contract->end !== null ? $contract->end->toDateString() : 'open end'}}<br />
                                        <u>Payment:</u> {{$contract::PAYOUT_TYPES[$contract->payout_type]}} - {{$contract::TYPES[$contract->type]}}<br />
                                        <u>Total value:</u> {{$contract->total_value}} {{$contract->total_currency}} to pasa {{$contract->pasa}}
                                    </p>
                                </div>
                            </div>

                        @endforeach
                    @endif
                </div>
                <div class="tab-pane fade" id="payments" role="tabpanel" aria-labelledby="payments-tab">
                    <h3>Payments</h3>
                    <p>The list of payments made by the foundation for the proposal.</p>
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>Date</th>
                            <th>PASA</th>
                            <th>Payload</th>
                            <th>Contract</th>
                            <th class="text-right">Amount</th>
                        </tr>
                        </thead>
                        <body>
                        <tr>
                            <td>2018-12-12</td>
                            <td>6780-12</td>
                            <td>Project/test/1</td>
                            <td><a href="contract">Contract #12321</a></td>
                            <td class="text-right">1200.0000 PASC</td>
                        </tr>
                        </body>
                    </table>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection