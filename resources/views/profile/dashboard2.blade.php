<?php
/** @var $contractor \App\Contractor */
$contractor = \Auth::user()->contractors->first();
?>

@extends('profile')

@section('sub')
    <div style="padding: 20px;border-left: 1px solid #d4d4d4;border-right: 1px solid #d4d4d4;border-bottom: 1px solid #d4d4d4;">
        <h2>Dashboard</h2>
        <p>Welcome {{$contractor->public_name}}. This is your dashboard which collects all data connected to your profile.</p>

        <h3>Contractor status:</h3>
        <p>
            <b>{{\App\Contractor::STATUS[$contractor->latestStatus()->name]}}:</b><br />{{$contractor->latestStatus()->reason}}
        </p>
        <h3>KYC status:</h3>
        <p>
        @if($contractor->kycDocuments->count() > 0)
            <ul>
                @foreach($contractor->kycDocuments as $kycDocument)
                    <li>
                        <b>{{$kycDocument->title}}</b><br />
                        Status: {{\App\KycDocument::STATUS[$kycDocument->latestStatus()->name]}}<br />
                        <i>Comment: {{$kycDocument->latestStatus()->reason}}</i>
                    </li>
                @endforeach
            </ul>
        @else
            No KYC documents found. We'll need them in case you want to actively get paid for proposals.
        @endif
            </p>
            <h3>Proposal status:</h3>
            <p>
            @if($contractor->proposals->count() > 0)
                <ul>
                    @foreach($contractor->proposals as $proposal)
                        <li>
                            <b>{{$proposal->title}}</b><br />
                            Status: {{\App\Proposal::STATUS_TYPES[$proposal->latestStatus()->name]}}<br />
                            <i>Comment: {{$proposal->latestStatus()->reason}}</i>
                        </li>
                    @endforeach
                </ul>
            @else
                No Proposal created yet.
                @endif
                </p>
    </div>
@endsection