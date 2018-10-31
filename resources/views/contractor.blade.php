<?php
/** @var $contractor \App\Contractor */
?>
@extends('layouts.app')

@section('content')
    <div class="layout-2cols">
        <div class="content grid_8">
            <div class="single-page">
                <h2 class="rs single-title">{{$contractor->publicName()}}</h2>
                <p class="rs post-by">member since <a href="#">{{$contractor->created_at->toDateString()}}</a></p>
                <div class="box-single-content">
                    <div class="editor-content">
                        <p>
                            <img class="img-desc" src="{{asset('storage/' . $contractor->logo)}}" alt="{{$contractor->publicName()}}">
                        </p>
                        <p>{{$contractor->bio}}</p>
                        <!-- AddThis Button BEGIN -->
                        <div class="social-sharing">
                            <div class="addthis_toolbox addthis_default_style">
                                <a class="addthis_button_facebook_like" fb:like:layout="button_count"></a>
                                <a class="addthis_button_tweet"></a>
                                <a class="addthis_button_google_plusone" g:plusone:size="medium"></a>
                                <a class="addthis_counter addthis_pill_style"></a>
                            </div>
                            <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=undefined"></script>
                        </div><!-- AddThis Button END -->
                    </div>
                </div>
            </div>
        </div><!--end: .content -->
        <div class="sidebar grid_4">
            <div class="box-gray">
                <h3 class="title-box">Proposals</h3>
                <p class="rs description pb20">{{$contractor->publicName()}} created the following proposals:</p>
                <ul class="rs nav nav-category">
                    @foreach($proposed as $proposal)
                        <li>
                            <a href="{{route('proposal', ['slug' => $proposal->slug])}}">
                                {{$proposal->title}}
                                <i class="icon iPlugGray"></i>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="box-gray">
                <h3 class="title-box">Contracts</h3>
                <p class="rs description pb20">{{$contractor->publicName()}} is actively involved in the following proposals:</p>
                <ul class="rs nav nav-category">
                    @foreach($contracted as $proposal)
                        <li>
                            <a href="{{route('proposal', ['slug' => $proposal->slug])}}">
                                {{$proposal->title}}
                                <i class="icon iPlugGray"></i>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div><!--end: .sidebar -->
        <div class="clear"></div>
    </div>

    <div class="additional-info-line">
        <div class="container_12">
            <div class="grid_9">
                <h2 class="rs title">Vestibulum tristique, purus eget euismod vulputate, nisl erat suscipit mi!</h2>
                <p class="rs description">Duis placerat malesuada sapien, eu consequat mauris vestibulum vitae. Aliquam fermentum lorem ut leo ultricies semper. In sed ligula massa, vitae elementum mauris.</p>
            </div>
            <div class="grid_3 ta-r">
                <a class="btn bigger btn-red" href="#">Learn more</a>
            </div>
            <div class="clear"></div>
        </div>
    </div>
@endsection