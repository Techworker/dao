<?php
/** @var $proposal \App\Proposal */
?>

@extends('profile')

@section('sub')
    <div style="border-left: 1px solid #d4d4d4;border-right: 1px solid #d4d4d4;border-bottom: 1px solid #d4d4d4;padding: 20px;">
        <h2 class="title">KYC documents</h2>
        <p>A list of documents that will be used to verify your contractor record.</p>
        <div>
            @forelse($documents as $document)
            <div class="other-post-item" style="margin-bottom: 20px; border-bottom: 1px solid #d4d4d4">
                <div class="media-body">
                    <h4 class="rs title-other-post">
                        <a href="#" class="be-fc-orange fw-b">{{$loop->iteration}}. {{$document->title}}</a>
                    </h4>
                    <p>{{$document->description}}</p>
                    <p class="rs fc-gray time-post pb10">{{$document->status()}}</p>
                </div>
                <a class="btn btn-pascal" href="{{\App\Http\Actions\Profile\Kyc\ShowUpdateFormAction::route(['kyc' => $document])}}">Update document</a>
                <a class="btn btn-pascal-red btn-delete" href="{{\App\Http\Actions\Profile\Kyc\DeleteAction::route(['kyc' => $document])}}">Delete document</a>
            </div>
            @empty
            No proposals
            @endforelse

            <a style="float: right;" class="btn btn-pascal btn-submit-all" href="{{\App\Http\Actions\Profile\Kyc\ShowCreateFormAction::route()}}">Upload new KYC document</a>
            <div class="clearfix"></div>
        </div>
    </div>
@endsection