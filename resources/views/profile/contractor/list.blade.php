<?php
/** @var $contractors \App\Contractor[] */

?>

@extends('profile')

@section('sub')
    <div class="row">
        <div class="col-md-12">
            <p>This is a list of your contractor records. Normally you just
                need one contractor record.</p>
        </div>
        <div class="col-md-9">
            <div class="row">
            @foreach($contractors as $contractor)
                <div class="col-md-6">
                    <div class="card">
                        @if($contractor->logo !== null)
                            <img class="card-img-top" src="{{asset('storage/' . $contractor->logo)}}" alt="Card image cap">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{$contractor->publicName()}}</h5>
                            <h6 class="card-subtitle mb-2 text-muted">{{$contractor->public_name}}</h6>
                            <p class="card-text">
                                <u>Status:</u> {{\App\Contractor::STATUS[$contractor->latestStatus()->name]}}<br />
                                <u>Reason:</u> {{$contractor->latestStatus()->reason}}
                            </p>
                        </div>
                        <div class="card-body">
                            <a href="{{\App\Http\Actions\Profile\Contractor\ShowFormAction::route(['contractor' => $contractor])}}" class="card-link">Update</a>
                            <a href="{{\App\Http\Actions\Profile\Contractor\DeleteAction::route(['contractor' => $contractor])}}" class="card-link">Delete</a>
                        </div>
                    </div>
                </div>
            @endforeach
            </div>
        </div>
        <div class="col-md-3">
            <a class="btn btn-primary" href="{{\App\Http\Actions\Profile\Contractor\ShowFormAction::route()}}">Create new Contractor</a>
            Notifications
        </div>
    </div>

@endsection