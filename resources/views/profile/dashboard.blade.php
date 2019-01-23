<?php
/** @var $contractor \App\Contractor */
$contractor = \Auth::user()->contractors->first();
?>

@extends('profile')

@section('sub')
    <div class="row">
        <div class="col-md-12">
            <h3>Dashboard</h3>
            <p>Welcome {{$user->name}}. This is your dashboard which collects all data connected to your profile.</p>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">

            <h3>Your contractor records:</h3>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Status</th>
                </tr>
                </thead>
                @foreach($user->contractors as $contractor)
                    <tr>
                        <td>{{$contractor->publicName()}} ({{$contractor->public_name}})</td>
                        <td>
                            {{\App\Contractor::STATUS[$contractor->latestStatus()->name]}}:
                            {{$contractor->latestStatus()->reason}}
                        </td>
                    </tr>
                @endforeach
            </table>
            <h3>Your proposed projects:</h3>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Contractor</th>
                    <th>Status</th>
                </tr>
                </thead>
                @foreach($user->contractors as $contractor)
                    @foreach($contractor->proposals as $proposal)
                        <tr>
                            <td>{{$proposal->title}}</td>
                            <td>{{$proposal->proposerContractor->publicName()}}</td>
                            <td>
                                {{\App\Proposal::STATUS_TYPES[$proposal->latestStatus()->name]}}:
                                {{$proposal->latestStatus()->reason}}
                            </td>
                        </tr>
                    @endforeach
                @endforeach
            </table>
        </div>
    </div>
@endsection