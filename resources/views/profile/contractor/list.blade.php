<?php
/** @var $contractor \App\Contractor */
?>

@extends('profile')

@section('sub')
    <div style="padding: 20px;">
        <h3 class="title">Contractors</h3>
        <p>This displays a list of contractors for your account. Each contractor records can own multiple proposals and all invoicing will be made against these records.</p>
        <div id="list-blog-ajax" class="list-last-post">
            @forelse($contractors as $contractor)
            <div class="media other-post-item">
                <a href="#" class="thumb-left">
                    <img src="{{asset('storage/' . $contractor->logo)}}" alt="$TITLE">
                </a>
                <div class="media-body">
                    <h4 class="rs title-other-post">
                        <a href="{{route('profile_contractor_update', ['contractor' => $contractor])}}" class="be-fc-orange fw-b">{{$contractor->first_name}} {{$contractor->last_name}} ({{$contractor->company_name}})</a>
                    </h4>
                    <p><b>{{$contractor->proposals->count()}} proposal(s)</b></p>
                    <a href="{{route('contractor', ['slug' => $contractor->slug])}}">Public profile</a>
                    <ul>
                        @foreach($contractor->proposals as $proposal)
                            <li>
                                {{$proposal->title}} ({{$proposal->status}})<br />
                                <a class="btn btn-submit-all btn-action-small" href="{{route('profile_proposal_update', ['proposal' => $proposal])}}">update</a>
                                <a class="btn btn-submit-all btn-action-small" href="{{route('profile_proposal_update', ['proposal' => $proposal])}}">submit</a>
                            </li>
                        @endforeach
                    </ul>
                    <p><b>{{$contractor->kycDocuments->count()}} KYC document(s)</b></p>
                    <ul>
                        @foreach($contractor->kycDocuments as $document)
                            <li>
                                {{$document->title}}
                                [<a href="{{route('profile_kyc_update', ['kyc' => $document])}}">update</a>]
                            </li>
                        @endforeach
                    </ul>

                    <a class="btn btn-pascal btn-submit-all" href="{{route('profile_proposal_create')}}?contractor_id={{$contractor->id}}">Create proposal</a>
                    <a class="btn btn-pascal btn-submit-all" href="{{route('profile_kyc_create')}}?contractor_id={{$contractor->id}}">Upload KYC document</a>
                    <a class="btn btn-pascal btn-submit-all" href="{{route('profile_contractor_update', ['contractor' => $contractor])}}">Update Contractor</a>
                </div>
            </div><!--end: .other-post-item -->
            @empty
                <a class="btn btn-pascal btn-submit-all" href="{{route('profile_contractor_create')}}">Create contractor record</a>
            @endforelse
        </div>
    </div>
@endsection