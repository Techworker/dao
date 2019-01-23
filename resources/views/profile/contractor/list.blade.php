<?php
/** @var $contractors \App\Contractor[] */

?>

@extends('profile')

@section('sub')
    <div class="row">
        <div class="col-md-12">
            <div class="intro-box">
                <h2>Contractor records</h2>
                <p>
                    For the foundation to be able to pay for projects, you need to setup a contractor record
                    and run through a KYC process. This process is not required if you just want to add a project.
                    All KYC data will be handled confidentially.
                </p>
                <p>
                    You can submit multiple contractor records if you want to act under different identities,
                    but one should be enough in most cases. After KYC is completed, the record is locked and cannot
                    be changed anymore. You will need to create a new contractor record.
                </p>
                <a class="btn btn-secondary pull-right" href="{{\App\Http\Actions\Profile\Contractor\ShowFormAction::route()}}">Create new Contractor</a>
            </div>
            <hr />
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="row">
            @foreach($contractors as $contractor)
                <div class="col-md-4 d-flex align-items-stretch">
                    <div class="card mb-4" style="width: 100%;">
                        @if($contractor->logo !== null)
                            <a href="{{\App\Http\Actions\Profile\Contractor\ShowFormAction::route(['contractor' => $contractor])}}"><img class="card-img-top" src="{{asset('storage/' . $contractor->logo)}}" alt="Card image cap"></a>
                        @endif
                        <div class="card-body">
                            <span class="item-status item-status-{{strtolower($contractor->latestStatus()->name)}}" data-readable="{{\App\Contractor::STATUS[$contractor->latestStatus()->name]}}"><i class="fas fa-check"></i></span>
                            <h5 class="card-title {{$contractor->logo === null ? 'mt-3' : ''}}">{{$contractor->publicName()}}</h5>
                            <h6 class="card-subtitle mb-2 text-muted">{{$contractor->public_name}}</h6>
                            <dl>
                                <dt>Status: {{\App\Contractor::STATUS[$contractor->latestStatus()->name]}} ({{$contractor->latestStatus()->created_at->format('Y-m-d')}})</dt>
                                <dd>{{$contractor->latestStatus()->reason}}</dd>
                            </dl>
                            <div>
                                <a href="{{\App\Http\Actions\Profile\Contractor\ShowFormAction::route(['contractor' => $contractor])}}" class="card-link"><i class="fas fa-user-edit"></i> Update</a>
                                <a href="{{\App\Http\Actions\Profile\Contractor\DeleteAction::route(['contractor' => $contractor])}}" class="card-link delete"><i class="fas fa-user-times"></i> Delete</a>
                            </div>
                            @if($contractor->latestStatus()->name === \App\Contractor::STATUS_NOT_APPROVED || $contractor->latestStatus()->name === \App\Contractor::STATUS_KYC)
                                <div class="mt-4">
                                    @if($contractor->latestStatus()->name === \App\Contractor::STATUS_NOT_APPROVED)
                                        <a href="{{\App\Http\Actions\Profile\Contractor\Api\KycAction::route(['contractor' => $contractor])}}" class="card-link submit-kyc"><i class="fas fa-check"></i> Submit for KYC</a>
                                    @endif
                                    @if($contractor->latestStatus()->name === \App\Contractor::STATUS_KYC)
                                        <a href="{{\App\Http\Actions\Profile\Contractor\Api\KycRevokeAction::route(['contractor' => $contractor])}}" class="card-link submit-kyc"><i class="fas fa-check"></i> Revoke KYC status</a>
                                    @endif
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
            </div>
        </div>
    </div>

@endsection