@extends('layouts.app')

@section('content')

    <div class="layout-2cols">
    <div class="content grid_8">
        <div class="proposal-detail">
            <h2 class="rs proposal-title">{{$localUser->first_name}} {{$localUser->last_name}}</h2>
            <p class="rs post-by"><a href="#">{{ $localUser->organization_name}}</a></p>
            <div class="proposal-short big-thumb">
                @if($localUser->avatar !== null)
                <div class="top-proposal-info">
                    <div class="content-info-short clearfix">
                        <div class="thumb-img">
                            <div class="rslides_container">
                                <ul class="rslides" id="slider1">
                                    <li><img src="/storage/{{str_replace('public', '', $localUser->avatar)}}" alt=""></li>
                                    <!--li><img src="images/ex/th-552x411-1.jpg" alt=""></li>
                                    <li><img src="images/ex/th-552x411-2.jpg" alt=""></li-->
                                </ul>
                            </div>
                        </div>
                    </div>
                </div><!--end: .top-proposal-info -->
                @endif
                <div class="bottom-proposal-info clearfix">
                    <div class="group-fee clearfix" style="height: 70px;">
                        <div class="fee-item">
                            <p class="rs lbl">Projects</p>
                            <span class="val">1</span>
                        </div>
                        <div class="sep"></div>
                        <div class="fee-item">
                            <p class="rs lbl">Comments</p>
                            <span class="val">22</span>
                        </div>
                    </div>
                    <div class="clear"></div>
                </div>
            </div>
            <div class="proposal-tab-detail tabbable accordion">
                <ul class="nav nav-tabs clearfix">
                    <li class="active"><a href="#">About</a></li>
                </ul>
                <div class="tab-content">
                    <div>
                        <h3 class="rs alternate-tab accordion-label">About</h3>
                        <div class="tab-pane active accordion-content">
                            <div class="editor-content">
                                <h3 class="rs title-inside">{{$localUser->first_name}} {{$localUser->last_name}}</h3>
                                <p class="rs post-by">{{$localUser->organization_name}}</p>
                                <p>Bio</p>
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
                </div>
            </div><!--end: .proposal-tab-detail -->
        </div>
    </div><!--end: .content -->
    <div class="clear"></div>
</div>
    @endsection