<?php
/** @var $contractor \App\Contractor */
$contractor = \Auth::user()->contractors->first();
?>

@extends('profile')

@section('sub')
    <div class="row">
        <div class="col-md-12">
            <h3>Dashboard</h3>
            <p>Welcome {{$contractor->public_name}}. This is your dashboard which collects all data connected to your profile.</p>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">

           <h3>Contractor status:</h3>
            <p>
                <b>{{\App\Contractor::STATUS[$contractor->latestStatus()->name]}}:</b><br />{{$contractor->latestStatus()->reason}}
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
    </div>
@endsection