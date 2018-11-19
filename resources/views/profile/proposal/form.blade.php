<?php
/** @var $proposal \App\Proposal */

?>

@extends('profile')

@section('sub')
    @if($proposal->id === null)
        <h3>Create a new proposal</h3>
    @else
        <h3>Update proposal record</h3>
    @endif
    <p>Use this form to create or update a proposal.</p>
    @if($proposal->id === null)
    <form id="form-proposal" action="{{\App\Http\Actions\Profile\Proposal\ShowFormAction::route()}}" data-redirect="{{\App\Http\Actions\Profile\Proposal\ShowListAction::route()}}">
    @else
    <form id="form-proposal" action="{{\App\Http\Actions\Profile\Proposal\ShowFormAction::route(['proposal' => $proposal])}}" data-redirect="{{\App\Http\Actions\Profile\Proposal\ShowListAction::route()}}">
    @endif
        <div class="form-group">
            <label for="proposal-status">Contractor</label>
            <select class="form-control" id="proposal-contractor" name="proposal-contractor">
                @foreach($contractors as $contractor)
                    <option value="{{$contractor->id}}">{{$contractor->publicName()}}</option>
                @endforeach
            </select>
            <div class="invalid-feedback"></div>
        </div>

        <div class="form-row">
        <div class="form-group col-md-3">
        <label for="proposal-status">Status</label>
        <select class="form-control" id="proposal-status" name="proposal-status">
            <option value="draft"{!! $proposal->status === "draft" ? ' selected="selected"' : '' !!}}>DRAFT</option>
            <option value="submitted"{!! $proposal->status === "submitted" ? ' selected="selected"' : '' !!}}>SUBMITTED</option>
        </select>
        <div class="invalid-feedback"></div>
    </div>

    <div class="form- col-md-9">
        <label for="proposal-title">Title</label>
        <input type="text" class="form-control" id="proposal-title" name="proposal-title" required value="{{$proposal->title}}">
        <div class="invalid-feedback"></div>
        <small class="form-text text-muted">This is the public name that everyone can see.</small>
    </div>
        </div>
        <div class="form-group">
            <label for="proposal-logo">Choose logo</label>
            <input type="file" class="form-control-file" id="proposal-logo" name="proposal-logo">
            <small class="form-text text-muted">A logo displayed with your proposal.</small>
        </div>

        @if($proposal->logo !== null)
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="1" id="proposal-delete-logo">
                <label class="form-check-label" for="proposal-delete-logo">
                    Delete existing logo
                </label>
            </div>
        @endif
        <div class="form-group">
            <label for="proposal-intro">Short description</label>
            <input type="text" class="form-control" id="proposal-intro" name="proposal-intro" required value="{{$proposal->intro}}">
            <div class="invalid-feedback"></div>
            <small class="form-text text-muted">A short description of the project.</small>
        </div>

        <div class="form-group">
            <label for="proposal-description">Description</label>
            <div class="editable form-control" id="proposal-description" data-placeholder="">{!! $proposal->description_html !!}</div>
            <div class="invalid-feedback"></div>
            <small class="form-text text-muted">A description of the proposal. (markdown allowed, a dynamic markdown editor like medium.com is activated)</small>
        </div>

        <div class="form-group">
            <label for="user-name">Tags</label>
            <input type="text" class="form-control" id="proposal-tags" name="proposal-tags" required value="{{$proposal->tags()->pluck('name')->implode(',')}}">
            <div class="invalid-feedback"></div>
            <small class="form-text text-muted">Tags associated with the proposal, divided by comma, max 5.</small>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
            <label for="proposal-website">Website</label>
            <input type="text" class="form-control" id="proposal-website" name="proposal-website" required value="{{$proposal->website}}">
            <div class="invalid-feedback"></div>
            <small class="form-text text-muted">A website about your proposal (if any).</small>
        </div>
        <div class="form-group col-md-6">
            <label for="proposal-source-code">Source Code Website</label>
            <input type="text" class="form-control" id="proposal-source-code" name="proposal-source-code" required value="{{$proposal->source_code}}">
            <div class="invalid-feedback"></div>
            <small class="form-text text-muted">The website where the source-code can be found (in case of a development project).</small>
        </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-3">
                <label for="proposal-proposed-value">Costs</label>
                <input type="text" class="form-control" id="proposal-proposed-value" name="proposal-proposed-value" required value="{{$proposal->proposed_value}}">
                <div class="invalid-feedback"></div>
                <small class="form-text text-muted">The costs of the proposal</small>
            </div>

            <div class="form-group col-md-3">
                <label for="proposal-proposed-currency">Currency</label>
                <select class="form-control" id="proposal-proposed-currency" name="proposal-proposed-currency">
                    <option value=""></option>
                    @foreach(\App\MoneyValue::TYPES as $value => $label)
                        <option value="{{$value}}" {!! $proposal->proposed_currency === $value ? ' selected="selected"' : '' !!}}>{{$label}}</option>
                    @endforeach
                </select>
                <div class="invalid-feedback"></div>
            </div>

        </div>

        <div class="form-group">
            <label for="proposal-payment-proposal">Payment description</label>
            <textarea class="form-control" id="proposal-payment-proposal" name="proposal-payment-proposal" rows="5">{{$proposal->payment_proposal}}</textarea>
            <small class="form-text text-muted">A description on how you think the payment should work (daily payments, monthly, etc.). This record will stay internal.</small>
        </div>
        <div class="form-group">
            <label for="proposal-notes-contractor">Notes</label>
            <textarea class="form-control" id="proposal-notes-contractor" name="proposal-notes-contractor" rows="5">{{$proposal->notes_contractor}}</textarea>
            <small class="form-text text-muted">Other notes about the project. This record will stay internal.</small>
        </div>

        <div class="row">
            <div class="col-md-4">
        <h4>Attachment 1</h4>
        <div class="form-group">
            <label for="proposal-document-1-title">Title</label>
            <input type="text" class="form-control" id="proposal-document-1-title" name="proposal-document-1-title" required value="{{$doc_1->title}}">
            <div class="invalid-feedback"></div>
            <small class="form-text text-muted">Title describing the first attachment.</small>
        </div>
        <div class="form-group">
            <label for="proposal-document-1-file">Document 1</label>
            <input type="file" class="form-control-file" id="proposal-document-1-file" name="proposal-document-1-file">
            <small class="form-text text-muted">The first attachment (Image, PDF, Presentation, ..)</small>
        </div>

        @if($doc_1->file !== null)
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="1" id="proposal-document-1-delete" name="proposal-document-1-delete">
                <label class="form-check-label" for="proposal-document-1-delete">
                    Delete existing attachment (<a href="{{asset('storage/' . $doc_1->file)}}" target="_blank">show</a>)
                </label>
            </div>
        @endif
            </div>
            <div class="col-md-4">
        <h4>Attachment 2</h4>
        <div class="form-group">
            <label for="proposal-document-2-title">Title</label>
            <input type="text" class="form-control" id="proposal-document-2-title" name="proposal-document-2-title" required value="{{$doc_2->title}}">
            <div class="invalid-feedback"></div>
            <small class="form-text text-muted">Title describing the second attachment.</small>
        </div>
        <div class="form-group">
            <label for="proposal-document-2-file">Document 2</label>
            <input type="file" class="form-control-file" id="proposal-document-2-file" name="proposal-document-2-file">
            <small class="form-text text-muted">The second attachment (Image, PDF, Presentation, ..).</small>
        </div>
        @if($doc_2->file !== null)
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="1" id="proposal-document-2-delete" name="proposal-document-2-delete">
                <label class="form-check-label" for="proposal-document-2-delete">
                    Delete existing attachmentDelete existing attachment (<a href="{{asset('storage/' . $doc_2->file)}}" target="_blank">show</a>)
                </label>
            </div>
        @endif
            </div>
            <div class="col-md-4">
        <h4>Attachment 3</h4>
        <div class="form-group">
            <label for="proposal-document-3-title">Title</label>
            <input type="text" class="form-control" id="proposal-document-3-title" name="proposal-document-3-title" required value="{{$doc_3->title}}">
            <div class="invalid-feedback"></div>
            <small class="form-text text-muted">Title describing the third attachment.</small>
        </div>
        <div class="form-group">
            <label for="proposal-document-3-file">Document 3</label>
            <input type="file" class="form-control-file" id="proposal-document-3-file" name="proposal-document-3-file">
            <small class="form-text text-muted">The third attachment (Image, PDF, Presentation, ..).</small>
        </div>
                @if($doc_3->file !== null)
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="1" id="proposal-document-3-delete" name="proposal-document-3-delete">
                        <label class="form-check-label" for="proposal-document-3-delete">
                            Delete existing attachment (<a href="{{asset('storage/' . $doc_3->file)}}" target="_blank">show</a>)
                        </label>
                    </div>
                @endif
        </div>
        </div>

    <button type="submit" class="btn btn-primary mt-4" id="submit">Save</button>
</form>
@endsection