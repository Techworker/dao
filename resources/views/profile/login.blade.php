<?php
/** @var $user \App\User */
?>

@extends('profile')

@section('sub')
    <div class="form form-login" style="padding: 20px;">
        <h3>Your user data</h3>
        <form action="#" id="form-login">
            <div class="row-item clearfix">
                <label class="lbl" for="txt_name1">Name</label>
                <div class="val">
                    <p class="rs error" id="user-error-name"></p>
                    <input class="txt" type="text" id="user-name" value="{{$user->name}}">
                </div>
            </div>
            <div class="row-item clearfix">
                <label class="lbl" for="txt_name1">E-Mail</label>
                <div class="val">
                    <p class="rs error" id="user-error-email"></p>
                    <input class="txt" type="email" id="user-email" value="{{$user->email}}" data-original="{{$user->email}}">
                </div>
            </div>
            <div class="row-item clearfix">
                <p class="rs error" id="user-error-password"></p>
                <label class="lbl" for="txt_name1">Password</label>
                <div class="val">
                    <input class="txt" type="password" id="user-password" value="">
                </div>
            </div>
            <div class="row-item clearfix">
                <p class="rs error" id="user-error-password-confirmation"></p>
                <label class="lbl" for="txt_name1">Password confirmation</label>
                <div class="val">
                    <input class="txt" type="password" id="user-password-confirmation" value="">
                </div>
            </div>
            <div class="row-item clearfix">
                <label class="lbl" for="txt_name1">Avatar:</label>
                <div class="val">
                    <input type="file" name="avatar" id="user-avatar">
                </div>
                @if($user->avatar !== null)
                    <img src="/storage/{{ $user->avatar}}" style="width: 100px">
                @endif

            </div>
            <p class="wrap-btn-submit rs ta-r">
                <input type="submit" class="btn btn-pascal btn-submit-all" value="Save all settings">
            </p>
        </form>
    </div>
@endsection