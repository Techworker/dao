<?php

/** @var $proposal \App\Proposal */

?>
@extends('layouts.app2')

@section('content')
    <div class="container p-4">
    <div class="row">
        <div class="col-md-12">
            <h2>{{$proposal->title}}</h2>
            <p><span class="text-uppercase font-weight-bold">initiated by</span> <a href="{{\App\Http\Actions\Contractor\ShowAction::route(['contractor' => $proposal->proposerContractor, 'slug' => $proposal->proposerContractor->slug])}}">{{$proposal->proposerContractor->public_name}}</a></p>
        </div>
    </div>
    <div class="row">
        @if($proposal->logo !== null)
        <div class="col-md-5">
            <div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="d-block w-100" src="{{asset('storage/' . $proposal->logo)}}" alt="Proposal logo">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-7">
        @else
        <div class="col-md-12">
        @endif
            <div class="from-editable">
            {!! $proposal->description_html !!}
            </div>

            <h4 class="mt-4">Attachments</h4>
            @if($proposal->documents->where('file', '!=', null)->count() > 0)
                <ul>
                    @foreach($proposal->documents as $document)
                        @if($document->file !== null)
                            <li><a href="{{asset('storage/' . $document->file)}}" target="_blank">{{$document->title}}</a></li>
                        @endif
                    @endforeach
                </ul>
                @else
                This project has no attachments.
            @endif

        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <ul class="nav nav-tabs mt-4">
                <li class="nav-item">
                    <a class="nav-link active" id="info-tab" data-toggle="tab" href="#info" role="tab" aria-controls="info" aria-selected="true">Quick Info</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="discussion-tab" data-toggle="tab" href="#discussion" role="tab" aria-controls="discussion" aria-selected="true">Questions &amp; Answers</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="voting-tab" data-toggle="tab" href="#voting" role="tab" aria-controls="voting" aria-selected="true">Voting</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="contractors-tab" data-toggle="tab" href="#contractors" role="tab" aria-controls="contractors" aria-selected="true">Contracts & Payments</a>
                </li>
            </ul>
            <div class="tab-content p-2 pt-3">
                <div class="tab-pane fade show active" id="info" role="tabpanel" aria-labelledby="info-tab">
                    <h3>Quick Info</h3>
                    <p>The initiator of this project (<a class="font-weight-bold" href="{{\App\Http\Actions\Contractor\ShowAction::route(['contractor' => $proposal->proposerContractor, 'slug' => $proposal->proposerContractor->slug])}}">{{$proposal->proposerContractor->public_name}}</a>) estimates the costs to {{$proposal->proposed_value}} PASC.</p>
                    <h5>Status</h5>
                    <p>The Status of the project is <u>{{$proposal::STATUS_TYPES[$proposal->latestStatus()->name]}}</u></p>
                </div>
                <div class="tab-pane fade" id="discussion" role="tabpanel" aria-labelledby="discussion-tab">
                    <h3>Questions &amp; Answers.</h3>
                    <p>We have set up a forum thread for this project. <a class="font-weight-bold" href="{{$proposal->forum_link}}">Click here</a> to join the discussion</p>

                </div>
                <div class="tab-pane fade" id="voting" role="tabpanel" aria-labelledby="voting-tab">
                    <h3>Voting</h3>
                    <p>
                        @if($proposal->voting_type === $proposal::VOTING_TYPE_BLOCKCHAIN)
                            The vote will happen on the blockchain.
                            @elseif($proposal->voting_type === $proposal::VOTING_TYPE_NONE)
                                No voting setup yet.
                    @else
                        The vote will happen on discord in the #polls channel.
                    @endif
                    </p>
                    <p>
                    @if($proposal->voting_start === null)
                        No voting dates set yet.
                    @else
                            Voting will take place from <u>{{$proposal->voting_start->toDateTimeString()}} to {{$proposal->voting_end->toDateTimeString()}} (UTC)</u>
                    @endif
                    </p>
                </div>
                <div class="tab-pane fade" id="contractors" role="tabpanel" aria-labelledby="contractors-tab">
                    <h3>Contracts & Payments</h3>
                    <p>The list of contracts resulted from the proposal.</p>
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>Contractor</th>
                            <th>Proposal</th>
                            <th>Role</th>
                            <th>Payment</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($contracts as $datum)
                            <tr>
                                <td>
                                    <a href="{{\App\Http\Actions\Contractor\ShowAction::route(['contractor' => $datum['contractor'], 'slug' => $datum['contractor']->slug])}}" class="font-weight-bold">{{$datum['contractor']->public_name}}</a>
                                </td>
                                <td>
                                    <a href="{{\App\Http\Actions\Profile\Proposal\ShowFormAction::route(['proposal' => $datum['proposal']])}}" class="font-weight-bold">{{$datum['proposal']->title}}</a>
                                </td>
                                <td>
                                    {{$datum['contract']->role}}<br />
                                    {{$datum['contract']->role_description}}
                                </td>
                                <td>
                                    Payment Date:
                                    @if($datum['contract']->payment_date !== null)
                                        {{$datum['contract']->payment_date->format('Y-m-d')}}
                                    @else
                                        Unknown
                                    @endif<br />
                                    Payment to: {{$datum['contract']->pasa}}<br />
                                    Amount: {{$datum['contract']->total_value}} PASC<br />
                                    Payload: {{$datum ['contract']->payload()}}<br />
                                </td>
                            </tr>
                            @if($datum['contract']->bc_ophash !== null)
                                <tr>
                                    <td colspan="6" style="padding: 0;">
                                        <div class="alert-info p-2 text-white">
                                            Contract paid in block {{$datum['contract']->bc_block}}. <a class="text-white" href="http://explorer.pascalcoin.org/findoperation.php?ophash={{$datum['contract']->bc_ophash}}">Click here to see the transaction</a>
                                        </div>
                                    </td>
                                </tr>
                            @endif

                        @endforeach
                        </tbody>
                    </table>
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