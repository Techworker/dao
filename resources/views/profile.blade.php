<?php
/** @var $user \App\User */
?>

@extends('layouts.app')

@section('content')
<div class="layout-2cols">
    <div class="content grid_12">
        @if(session()->has('flash'))
            <div id="flash">{{session()->get('flash')}}</div>
        @endif

        <div class="grid_12 top-info">
            <ul class="nav nav-menu-blog clearfix">
                <li><a href="{{route('profile_dashboard')}}">Dashboard</a></li>
                <li class="sep"></li>
                <li><a href="{{route('profile_login')}}">User Data</a></li>
                <li class="sep"></li>
                <li><a href="{{route('profile_contractor')}}">Proposals</a></li>
            </ul>
            <ul id="sys-nav-menu-blog" class="alternate-menu-blog">
                <li><a href="#">News</a></li>
                <li><a href="#">Data</a></li>
                <li><a href="#">PROFILES</a></li>
                <li><a href="#">Q&As</a></li>
                <li><a href="#">Calendar</a></li>
                <li><a href="#">Video</a></li>
            </ul>
        </div>
        <div class="content grid_12 " style="background: white">
            @yield('sub')
        </div><!--end: .content -->
    </div>
    <div class="clear"></div>
</div>
@endsection