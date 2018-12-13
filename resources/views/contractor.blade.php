@extends('layouts.app2')

@section('content')
    <div class="container p-4">
        <div class="row">
            <div class="col-md-12">
                <h2>{{$contractor->publicName()}}</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                Maybe infor about contractor, TBD
<br />
                 - Contracts<br />
                 - Proposals<br />
            </div>
        </div>
    </div>
@endsection