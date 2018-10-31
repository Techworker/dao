<?php
/** @var $user \App\User */
?>

@extends('profile')

@section('sub')
    <div style="padding: 20px;">
        <h3>Dashboard</h3>
        Welcome {{\Auth::user()->email}}.
        <h4></h4>
    </div>
@endsection