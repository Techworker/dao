<?php
/** @var $user \App\User */
?>

@extends('layouts.app2')

@section('content')
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
            <a class="nav-link{{\Request::is('*profile/proposal*') ? ' active' : '' }}" href="{{\App\Http\Actions\Profile\Proposal\ShowListAction::route()}}">Proposals</a>
        </li>
    </ul>
    <div class="tab-content bg-white p-4">
    @yield('sub')
    </div>
@endsection