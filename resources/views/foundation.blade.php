@extends('layouts.app2')

@section('content')
    <div class="container p-4">
    <div class="row">
        <div class="col-md-12">
            <h2>Foundation</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <h4>Account 1000 - Foundation account</h4>
            @include('foundation-table', [
                'payments' => $payments_1000
            ]);
            <h4>Account 1001 - OPEX Account</h4>
            @include('foundation-table', [
                'payments' => $payments_1001
            ]);
            <h4>Account 1002 - OPEX Spain Account</h4>
            @include('foundation-table', [
                'payments' => $payments_1002
            ]);
        </div>
    </div>
    </div>
@endsection