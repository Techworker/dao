<?php
/** @var $user \App\User */
?>

@extends('layouts.app2')

@section('content')
    <div class="container p-4">
    <h2>Profile</h2>
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link{{\App\Http\Actions\Profile\DashboardAction::isActiveRoute() ? ' active' : ''}}" href="{{\App\Http\Actions\Profile\DashboardAction::route()}}">Dashboard</a>
        </li>
        <li class="nav-item">
            <a class="nav-link{{\App\Http\Actions\Profile\Login\ShowAction::isActiveRoute() ? ' active' : '' }}" href="{{\App\Http\Actions\Profile\Login\ShowAction::route()}}">Login data</a>
        </li>
        <li class="nav-item">
            <a class="nav-link{{\Request::is('*profile/contractor*') ? ' active' : '' }}" href="{{\App\Http\Actions\Profile\Contractor\ShowListAction::route()}}">Contractors</a>
        </li>
        <li class="nav-item">
            <a class="nav-link{{\Request::is('*profile/proposal*') ? ' active' : '' }}" href="{{\App\Http\Actions\Profile\Proposal\ShowListAction::route()}}">Projects</a>
        </li>
        <li class="nav-item">
            <a class="nav-link{{\Request::is('*profile/contracts*') ? ' active' : '' }}" href="{{\App\Http\Actions\Profile\ShowContractsAction::route()}}">Contracts &amp; Payments</a>
        </li>
        <li class="nav-item">
            <a class="nav-link{{\Request::is('*profile/help*') ? ' active' : '' }}" href="{{\App\Http\Actions\Profile\ShowHelpAction::route()}}">Help</a>
        </li>
    </ul>
    <div class="tab-content p-2 pt-3">

        @if(session()->has('flash'))
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    {{session()->get('flash')}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
        @endif
        @yield('sub')
    </div>
    </div>
@endsection