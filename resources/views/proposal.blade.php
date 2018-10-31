@extends('layouts.app')

@section('content')

    <div class="layout-2cols">
    <div class="content grid_8">
        <div class="proposal-detail">
            <h2 class="rs proposal-title">{{$proposal->title}}</h2>
            <p class="rs post-by">proposed by <a href="#">{{$proposal->proposerContractor->publicName()}}</a></p>
            <div class="proposal-short big-thumb">
                @if($proposal->logo !== null)
                <div class="top-proposal-info">
                    <div class="content-info-short clearfix">
                        <div class="thumb-img">
                            <div class="rslides_container">
                                <ul class="rslides" id="slider1">
                                    <li><img src="/storage/{{str_replace('public', '', $proposal->logo)}}" alt=""></li>
                                    <!--li><img src="images/ex/th-552x411-1.jpg" alt=""></li>
                                    <li><img src="images/ex/th-552x411-2.jpg" alt=""></li-->
                                </ul>
                            </div>
                        </div>
                    </div>
                </div><!--end: .top-proposal-info -->
                @endif
                <div class="bottom-proposal-info clearfix">
                    <div class="proposal-progress sys_circle_progress" data-percent="87">
                        <div class="sys_holder_sector"></div>
                    </div>
                    <div class="group-fee clearfix">
                        <div class="fee-item">
                            <p class="rs lbl">Paid/Costs</p>
                            <span class="val">0&dollar; / {{$proposal->costs}}&dollar;</span>
                        </div>
                        <div class="sep"></div>
                        <div class="fee-item">
                            <p class="rs lbl">Days Left</p>
                            <span class="val">25</span>
                        </div>
                    </div>
                    <div class="clear"></div>
                </div>
            </div>
            <div class="proposal-tab-detail tabbable accordion">
                <ul class="nav nav-tabs clearfix">
                    <li class="active"><a href="#">About</a></li>
                    <li><a href="#" class="be-fc-orange">Comments ({{$proposal->comments->count()}})</a></li>
                </ul>
                <div class="tab-content">
                    <div>
                        <h3 class="rs alternate-tab accordion-label">About</h3>
                        <div class="tab-pane active accordion-content">
                            <div class="editor-content">
                                <h3 class="rs title-inside">{{$proposal->title}}</h3>
                                <p class="rs post-by">by <a href="#" class="fw-b fc-gray be-fc-orange">{{$proposal->proposerContractor->company_name}}</a> in <span class="fw-b fc-gray">{{$proposal->proposerContractor->addresses->first()->country}}</span></p>
                                <p>{{$proposal->description}}</p>
                                <div class="social-sharing">
                                    <!-- AddThis Button BEGIN -->
                                    <div class="addthis_toolbox addthis_default_style">
                                        <a class="addthis_button_facebook_like" fb:like:layout="button_count"></a>
                                        <a class="addthis_button_tweet"></a>
                                        <a class="addthis_button_google_plusone" g:plusone:size="medium"></a>
                                        <a class="addthis_counter addthis_pill_style"></a>
                                    </div>
                                    <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=undefined"></script>
                                    <!-- AddThis Button END -->
                                </div>
                            </div>
                        </div><!--end: .tab-pane(About) -->
                    </div>
                    <div>
                        <h3 class="rs active alternate-tab accordion-label">Comments ({{$proposal->comments->count()}})</h3>
                        <div class="tab-pane accordion-content">
                            <div class="tab-pane-inside">
                            <div class="form">
                                <form action="#" id="form-comment" style="display: none">
                                    <input type="hidden" id="comment-proposal-id" value="{{$proposal->id}}">
                                    <div class="row-item clearfix">
                                        <h4>Add comment</h4>
                                    </div>
                                    <div class="row-item clearfix">
                                        <label class="lbl" for="txt_bio">Author:</label>
                                        <div class="val">
                                            {{\Auth::user()->first_name }} {{\Auth::user()->last_name}}
                                        </div>
                                    </div>
                                    <div class="row-item clearfix">
                                        <label class="lbl" for="txt_bio">Text:</label>
                                        <div class="val">
                                            <p class="rs error" id="comment-error-description"></p>
                                            <textarea class="txt fill-width" id="comment-description" cols="30" rows="10"></textarea>
                                        </div>
                                    </div>
                                    <p class="wrap-btn-submit rs ta-r">
                                        <input type="submit" class="btn btn-pascal btn-submit-all" value="Save comment">
                                    </p>
                                </form>
                                <button class="btn btn-pascal btn-submit-all" id="show-comment-form" data-alternate-text="Cancel">Add comment</button>
                            </div>
                            </div>
                            @forelse($proposal->comments as $comment)
                            <div class="box-list-comment">
                                <div class="media comment-item">
                                    <div class="media-body">
                                        <h4 class="rs comment-author">
                                            <a href="#" class="be-fc-orange fw-b">
                                                @if($comment->user->id === $proposal->user->id) [Owner]@endif
                                                {{$comment->user->name}}</a>
                                            <span class="fc-gray">say:</span>
                                        </h4>
                                        <p class="rs comment-content">{{$comment->description}}</p>
                                        <p class="rs time-post">{{$comment->created_at}}</p>
                                    </div>
                                </div><!--end: .comment-item -->
                            </div>
                            @empty
                            No comments yet!
                            @endforelse
                        </div><!--end: .tab-pane(Comments) -->
                    </div>
                </div>
            </div><!--end: .proposal-tab-detail -->
        </div>
    </div><!--end: .content -->
    <div class="sidebar grid_4">
        <div class="proposal-runtime">
            <div class="box-gray">
                <div class="proposal-date clearfix">
                    <i class="icon iCalendar"></i>
                    <span class="val"><span class="fw-b">Proposed at </span>{{$proposal->created_at->toDateString()}}</span>
                </div>
                <p class="rs description">
                    @if($proposal->status === "submitted")
                        This proposal was submitted by <a href="{{route('contractor', ['slug' => $proposal->proposerContractor->slug])}}">{{$proposal->proposerContractor->publicName()}}</a> and is waiting for it's approval.
                    @elseif($proposal->status === "approved")
                        This proposal was approved submitted by {{$proposal->proposerContractor->publicName()}} and is waiting for it to get contracted and activated.
                    @elseif($proposal->status === "activated")
                        This proposal is contracted and in active development.
                    @elseif($proposal->status === "aborted")
                        This proposal was aborted.
                    @elseif($proposal->status === "completed")
                        This proposal was completed and the contract ended.
                    @elseif($proposal->status === "suspended")
                        This proposal was suspended and is paused.
                    @endif
                </p>
            </div>
        </div><!--end: .proposal-runtime -->
        <div class="proposal-author">
            <div class="box-gray">
                <h3 class="title-box">Proposed by</h3>
                <div class="media">
                    @if($proposal->proposerContractor->logo !== null)
                    <a href="#" class="thumb-left">
                        <img src="/storage/{{$proposal->proposerContractor->logo}}" alt="$USER_NAME"/>
                    </a>
                    @endif
                    <div class="media-body">
                        <h4 class="rs pb10"><a href="#" class="be-fc-orange fw-b">{{$proposal->proposerContractor->company_name}}</a></h4>
                        <p class="rs">{{$proposal->proposerContractor->first_name}} {{$proposal->proposerContractor->last_name}}</p>
                        <p class="rs fc-gray">{{$proposal->proposerContractor->proposals->count()}} proposals</p>
                    </div>
                </div>
                <div class="author-action">
                    <a class="btn btn-white" href="{{route('user_detail', ['user' => $proposal->user])}}">See full bio</a>
                </div>
            </div>
        </div><!--end: .proposal-author -->
        <div class="clear clear-2col"></div>
    </div><!--end: .sidebar -->
    <div class="clear"></div>
</div>
    @endsection