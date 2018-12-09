<?php
/** @var $user \App\User */
?>

@extends('profile')

@section('sub')
    <div class="row">
        <div class="col-md-12">
            <h3>Your login data</h3>
            <p>Use this form to change your login data and private profile.</p>
        </div>
    </div>
    <form id="form-login">
        <div class="form-group">
            <label for="user-name">Username</label>
            <input type="text" class="form-control" id="user-name" required value="{{$user->name}}">
            <div class="invalid-feedback"></div>
            <small class="form-text text-muted">Your username, will be displayed in discussions on the page.</small>
        </div>
        <div class="form-group">
            <label for="user-email">Email address</label>
            <input type="email" class="form-control" id="user-email" required value="{{$user->email}}" data-original="{{$user->email}}">
            <div class="invalid-feedback"></div>
            <small class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
            <label for="user-password">Password</label>
            <input type="password" class="form-control" id="user-password">
            <div class="invalid-feedback"></div>
            <small class="form-text text-muted">Only set this if you want to change the password.</small>
        </div>
        <div class="form-group">
            <label for="user-password-confirmation">Password confirmation</label>
            <input type="password" class="form-control" id="user-password-confirmation">
            <div class="invalid-feedback"></div>
        </div>
        <div class="custom-file">
            <input type="file" class="custom-file-input" id="user-avatar">
            <label class="custom-file-label" for="user-file">Choose file</label>
        </div>
        @if($user->avatar !== null)
            <img src="/storage/{{ $user->avatar}}" style="width: 100px">
        @endif
        <button type="submit" class="btn btn-primary mt-4">Save</button>
    </form>
@endsection