<?php
/** @var $contractor \App\Contractor */
?>
@extends('layouts.app')

@section('content')
    <div class="layout-2cols">
        <div class="content grid_8">
            <div class="single-page">
                <h2 class="rs single-title">{{$contractor->public_name}}</h2>
                <p class="rs post-by">member since {{$contractor->created_at->toDateString()}}</p>
                <h2>Bio</h2>
                <div class="box-single-content">
                    <div class="editor-content">
                        @if($contractor->logo !== null)
                        <p>
                            <img class="img-desc" src="{{asset('storage/' . $contractor->logo)}}" alt="{{$contractor->public_name}}">
                        </p>
                        @endif
                        {!! parsedown($contractor->bio) !!}
                    </div>
                </div>
            </div>
        </div><!--end: .content -->
        <div class="sidebar grid_4">
            <div class="box-gray">
                <h3 class="title-box">Proposals</h3>
                <p class="rs description pb20">{{$contractor->public_name}} created the following proposals:</p>
                <ul class="rs nav nav-category">
                    @foreach($proposed as $proposal)
                        <li>
                            <a href="{{\App\Http\Actions\Proposal\ShowDetailAction::route(['proposal' => $proposal, 'slug' => $proposal->slug])}}">
                                {{$proposal->title}}
                                <i class="icon iPlugGray"></i>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="box-gray">
                <h3 class="title-box">Contracts</h3>
                <p class="rs description pb20">{{$contractor->public_name}} is actively involved in the following proposals:</p>
                <ul class="rs nav nav-category">
                    @foreach($contracted as $proposal)
                        <li>
                            <a href="#">
                                {{$proposal->title}}
                                <i class="icon iPlugGray"></i>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div><!--end: .sidebar -->
        <div class="clear"></div>
    </div>
@endsection