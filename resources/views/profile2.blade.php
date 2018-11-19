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
                <li><a class="{{\App\Http\Actions\Profile\DashboardAction::isActiveRoute() ? 'active' : ''}}" href="{{\App\Http\Actions\Profile\DashboardAction::route()}}">Dashboard</a></li>
                <li class="sep"></li>
                <li><a class="{{\App\Http\Actions\Profile\Login\ShowAction::isActiveRoute() ? 'active' : ''}}" href="{{\App\Http\Actions\Profile\Login\ShowAction::route()}}">Login Data</a></li>
                <li class="sep"></li>
                <li><a class="{{\App\Http\Actions\Profile\Contractor\ShowFormAction::isActiveRoute() ? 'active' : ''}}" href="{{\App\Http\Actions\Profile\Contractor\ShowFormAction::route()}}">Contractor</a></li>
                <li class="sep"></li>
                <li><a class="{{\App\Http\Actions\Profile\Kyc\ShowListAction::isActiveRoute() || \App\Http\Actions\Profile\Kyc\ShowCreateFormAction::isActiveRoute() || \App\Http\Actions\Profile\Kyc\ShowUpdateFormAction::isActiveRoute() ? 'active' : ''}}" href="{{\App\Http\Actions\Profile\Kyc\ShowListAction::route()}}">KYC</a></li>
                <li class="sep"></li>
                <li><a class="{{\App\Http\Actions\Profile\Proposal\ShowListAction::isActiveRoute() || \App\Http\Actions\Profile\Proposal\ShowUpdateFormAction::isActiveRoute() || \App\Http\Actions\Profile\Proposal\ShowCreateFormAction::isActiveRoute() ? 'active' : ''}}" href="{{\App\Http\Actions\Profile\Proposal\ShowListAction::route()}}">Proposals</a></li>
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