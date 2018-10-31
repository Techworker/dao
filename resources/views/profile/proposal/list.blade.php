<?php
/** @var $contractor \App\Contractor */
?>

@extends('profile')

@section('sub')
    <div style="padding: 20px;">
        <h3 class="title">Contractors</h3>
        <p>This displays a list of contractors for your account. Each contractor records can own multiple proposals and all invoicing will be made against these records.</p>
        <div id="list-blog-ajax" class="list-last-post">
            @forelse($contractors as $contractor)
            <div class="media other-post-item">
                <a href="#" class="thumb-left">
                    <img src="{{asset('storage/' . $contractor->logo)}}" alt="$TITLE">
                </a>
                <div class="media-body">
                    <h4 class="rs title-other-post">
                        <a href="{{route('profile_contractor_update', ['contractor' => $contractor])}}" class="be-fc-orange fw-b">{{$contractor->first_name}} {{$contractor->last_name}} ({{$contractor->company_name}})</a>
                    </h4>
                    <p class="rs fc-gray time-post pb10">{{$contractor->proposals->count()}} proposals</p>
                    <ul>
                    @foreach($contractor->proposals as $proposal)
                        <li>{{$proposal->title}}</li>
                    @endforeach
                    </ul>
                    <a class="btn btn-pascal btn-submit-all" href="{{route('profile_proposal_create')}}">Create proposal</a>
                </div>
            </div><!--end: .other-post-item -->
            @empty
                <a class="btn btn-pascal btn-submit-all" href="{{route('profile_contractor_create')}}">Create contractor record</a>
            @endforelse
        </div>
    </div>
@endsection