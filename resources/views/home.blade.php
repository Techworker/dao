<?php

/** @var $proposal \App\Proposal */
?>

@extends('layouts.app2')

@section('content')
    <section class="hero">
        <div class="container mb-5">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <h1 class="hero-heading mb-0">PascalCoin Foundation<br>DAO</h1>
                    <div class="row">
                        <div class="col-lg-10">
                            <p class="lead text-muted mt-4 mb-4">Build for PascalCoin.</p>
                        </div>
                    </div>
                    <form action="#" class="subscription-form">
                        <div class="form-group">
                            <a class="btn btn-warning" href="{{route('register')}}">Register Now</a>
                            <a class="btn btn-info" href="{{\App\Http\Actions\Proposal\ShowListAction::route(['status' => 'all'])}}">Browse Proposals</a>
                        </div>
                    </form>
                </div>
                <div class="col-lg-6"><img src="https://d19m59y37dris4.cloudfront.net/appton/1-0/img/illustration-hero.svg" alt="..." class="hero-image img-fluid d-none d-lg-block"></div>
            </div>
        </div>
    </section>
    <section>
        <div class="container">
            <div class="text-center">
                <h2>Propose your own ideas and get paid to realize them</h2>
                <p class="lead text-muted mt-2">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod.</p><a href="#" class="btn btn-primary">Learn More</a>
            </div>
            <div class="row">
                <div class="col-lg-7 mx-auto mt-5"><img src="https://d19m59y37dris4.cloudfront.net/appton/1-0/img/illustration-1.svg" alt="..." class="intro-image img-fluid"></div>
            </div>
        </div>
    </section>
    <section class="bg-warning text-white">
        <div class="container">
            <div class="text-center">
                <h2>Do great things together</h2>
                <div class="row">
                    <div class="col-lg-9 mx-auto">
                        <p class="lead text-white mt-2">The DAO allows multiple contractors to develop on the same project and get paid individually.</p>
                    </div>
                </div><a href="#" class="btn btn-secondary">Learn More</a>
            </div>
        </div>
    </section>
    <section>
    <div class="container">
        <div class="text-center">
            <h2>Browse recent proposals</h2>
            <p class="lead text-muted mt-2">Browse the recent proposals and get a feeling of what is possible.
        </div>

        <div class="row">
        @foreach($proposals as $proposal)
        <div class="col-md-4">
            <div class="card" style="width: 18rem;">
                @if($proposal->logo !== null)
                <img class="card-img-top" src="{{asset('/storage/' . $proposal->logo)}}" alt="Card image cap">
                @endif
                <div class="card-body">
                    <h5 class="card-title">{{$proposal->title}}</h5>
                    <p class="card-text">{{$proposal->intro}}</p>
                    <a href="{{\App\Http\Actions\Proposal\ShowDetailAction::route(['proposal' => $proposal, 'slug' => $proposal->slug])}}" class="card-link">Show proposal</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    </div>
    </section>
@endsection
