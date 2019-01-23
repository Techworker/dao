@extends('layouts.app2')

@section('content')
    <div class="container p-4">
        <div class="row">
            <div class="col-md-12">
                <h2>{{$contractor->public_name}}</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                {!! $contractor->bio_html !!}
            </div>
        </div>
    </div>
@endsection