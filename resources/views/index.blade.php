@extends('layouts.app')

@section('content')
    <div id="home-slider">
        <div class="md-slide-items md-slider" id="md-slider-1" data-thumb-width="105" data-thumb-height="70">
            <div class="md-slide-item slide-0" data-timeout="6000">
                <div class="md-mainimg"><img src="images/ex/th-slide0.jpg" alt=""></div>
                <div class="md-objects">
                    <div class="md-object rs slide-title" data-x="20" data-y="38" data-width="480" data-height="30" data-start="700" data-stop="5500" data-easein="random" data-easeout="keep">
                        <p>Support PascalCoin and earn money?</p>
                    </div>
                    <div class="md-object rs slide-description" data-x="20" data-y="160" data-width="480" data-height="90" data-start="1400" data-stop="7500" data-easein="random" data-easeout="keep">
                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient monte.</p>
                    </div>
                    <div class="md-object rs" data-x="20" data-y="260" data-width="120" data-height="23" data-padding-top="9" data-padding-bottom="7" data-padding-left="10" data-padding-right="10" data-start="1800" data-stop="7500" data-easein="random" data-easeout="keep">
                        <a href="#" class="btn btn-gray">Learn more</a>
                    </div>
                    <div class="md-object" data-x="595" data-y="50" data-width="200" data-height="200" data-start="1800" data-stop="7500" data-easein="fadeInRight" data-easeout="keep" style=""><img src="{{asset('images/logo_hollow.png')}}" alt="Search Money for Your Creative Ideas" width="612" height="365" /></div>
                </div>
            </div>
        </div>
    </div>
    <div class="container_12">
        @if(session()->has('flash'))
            <div id="flash">{{session()->get('flash')}}</div>
        @endif

        <div class="how-it-work">
            <div class="grid_12 short-introduce">
                <h3 class="rs title"><span class="fc-black">PascalCoin DAO</span></h3>
                <p>The decentralized autonomous organization website for the PascalCoin proposal.</p>
                <div class="box-introduce">
                    <div class="wrap-2col">
                        <div class="left-intro">
                            <h4 class="rs title-intro">Start your PascalCoin proposal!</h4>

                            <p class="rs pb20">Lorem ipsum dolor sit amet, consectetur adipiscing elit. In consequat vel erat quis hendrerit. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Ut enim purus, egestas nec auctor ac, volutpat at est. Curabitur ex turpis, porttitor id dolor tincidunt, congue interdum velit.</p>
                            <p class="rs pb20">In ultricies, massa vel euismod tincidunt, nibh arcu maximus velit, eu egestas nisl massa id massa. Fusce ut velit felis. Donec ultricies lorem erat, nec porttitor libero rutrum eu. Cras auctor lacus quam, in facilisis felis faucibus vitae. Proin a metus dictum, dignissim enim sed, accumsan eros. Vivamus vel fermentum quam, in pretium ante. Mauris eget mattis elit. Cras id consectetur neque.</p>
                            <a class="btn btn-red btn-star-proposal{{\Auth::check() ? '' : ' sys_show_popup_login'}}" href="{{route('profile_dashboard')}}?area=proposal">
                                <span class="lbl">Start proposal</span>
                            </a>
                            <!--p class="rs ta-c description-btn">Morbi hendrerit malesuada nulla</p-->
                        </div>
                        <div class="right-intro"><img src="{{asset('images/logo_clean.png')}}" class="" alt="$DESCRIPTION"/></div>
                        <div class="clear"></div>
                    </div>
                </div>
            </div>
            <div class="clear"></div>
        </div>
    </div>

    <div class="home-popular-proposal">
        <div class="container_12">
            <div class="grid_12 wrap-title">
                <h2 class="common-title">Proposals</h2>
                <a class="be-fc-orange" href="category.html">View all</a>
            </div>
            <div class="clear"></div>
            <div class="lst-popular-proposal clearfix">
                @foreach($proposals as $proposal)
                <div class="grid_3">
                    <div class="proposal-short sml-thumb">
                        <div class="top-proposal-info">
                            <div class="content-info-short clearfix">
                                <a href="#" class="thumb-img">
                                    <img src="/storage/{{str_replace('public', '', $proposal->logo)}}" alt="$TITLE">
                                </a>
                                <div class="wrap-short-detail">
                                    <h3 class="rs acticle-title"><a class="be-fc-orange" href="{{route('proposal_detail', ['proposal' => $proposal])}}">{{$proposal->title}}</a></h3>
                                    <p class="rs tiny-desc">by <a href="profile.html" class="fw-b fc-gray be-fc-orange">{{$proposal->user->organization_name}}</a></p>
                                    <p class="rs title-description">{{substr($proposal->description, 0, 200)}}..</p>
                                    <p class="rs proposal-location">
                                        <i class="icon iLocation"></i>
                                        {{$proposal->user->country}}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!--end: .grid_3 > .proposal-short-->
                @endforeach
            </div>
        </div>
    </div><!--end: .home-popular-proposal -->
@endsection
