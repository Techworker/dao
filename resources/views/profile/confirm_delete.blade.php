<?php
/** @var $contractor \App\Contractor */
/** @var $contactPhone \App\ContactDetail */
/** @var $contactEmail \App\ContactDetail */
/** @var $contactFax \App\ContactDetail */
/** @var $address \App\Address */

?>

@extends('profile')

@section('sub')
    <div class="row">
        <div class="col-12">
            <h2 class="title">{{$title}}</h2>
            <p>{{$message}}</p>
            <a href="{{\Request::url()}}?confirmed=true" class="btn btn-pascal-red" value="Save proposal">Yes</a>
            <a href="{{ url()->previous() }}" class="btn btn-pascal s" value="Save proposal">No</a>
        </div>
    </div>
@endsection