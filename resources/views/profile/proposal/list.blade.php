<?php
/** @var $proposal \App\Proposal */
?>

@extends('profile')

@section('sub')
    <div class="row">
        <div class="col-md-12">
                <div class="intro-box">
                    <h2>Your projects</h2>
                    <p>
                        This is a list of projects you created. A project should always be connected to a contractor record.
                    </p>
                    <a class="btn btn-secondary pull-right" href="{{\App\Http\Actions\Profile\Proposal\ShowFormAction::route()}}">Create new Project</a>
                </div>
                <hr />
            </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                @foreach($proposals as $proposal)
                    @include('_common.proposal-item', ['proposal' => $proposal, 'admin' => true])
                @endforeach
            </div>
        </div>
    </div>

@endsection