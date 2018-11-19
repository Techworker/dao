<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>{{ config('app.name', 'Laravel')}}</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale = 1.0, maximum-scale=1.0, user-scalable=no" />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600,700,300' rel='stylesheet' type='text/css'>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/normalize.css') }}"/>
    <link rel="stylesheet" href="{{ asset('css/jquery.sidr.light.css') }}"/>
    <link rel="stylesheet" href="{{ asset('css/animate.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('css/md-slider.css') }}"/>
    <link rel="stylesheet" href="{{ asset('css/responsiveslides.css')}}"/>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}"/>
    <link rel="stylesheet" href="{{ asset('css/style2.css') }}"/>
    <!--[if lte IE 7]>
    <link rel="stylesheet" href="{{ asset('css/ie7.css') }}"/>
    <![endif]-->
    <!--[if lte IE 8]>
    <link rel="stylesheet" href="{{ asset('css/ie8.css') }}"/>
    <![endif]-->
    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}"/>
    <!--[if lt IE 9]>
    <script type="text/javascript" src="{{ asset('js/html5.js') }}"></script>
    <![endif]-->
    <script type="text/javascript" src="{{ asset('js/raphael-min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/jquery-1.9.1.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/jquery-migrate-1.2.1.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/jquery.touchwipe.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/md_slider.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/jquery.sidr.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/jquery.tweet.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/responsiveslides.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/pie.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/dropzone.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/script.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/script2.js') }}"></script>

</head>
<body>
<div id="wrapper">
    <header id="header">
        <div class="wrap-top-menu">
            <div class="container_12 clearfix">
                <div class="grid_12">
                    <nav class="top-menu">
                        <ul id="main-menu" class="nav nav-horizontal clearfix">
                            <li {!! \App\Http\Actions\HomeAction::isActiveRoute() ? 'class="active"' : '' !!}><a href="{{\App\Http\Actions\HomeAction::route()}}">Home</a></li>
                            <li class="sep"></li>
                            <li {!! \App\Http\Actions\Proposal\ShowListAction::isActiveRoute() || \App\Http\Actions\Proposal\ShowDetailAction::isActiveRoute() ? 'class="active"' : '' !!}><a href="{{\App\Http\Actions\Proposal\ShowListAction::route(['status' => 'all'])}}">Proposals</a></li>
                            <li class="sep"></li>
                            <li><a href="#">Transparency</a></li>
                            <li class="sep"></li>
                            <li><a href="{{\App\Http\Actions\Contact\ShowAction::route()}}">Contact</a></li>
                        </ul>
                        <a id="btn-toogle-menu" class="btn-toogle-menu" href="#alternate-menu">
                            <span class="line-bar"></span>
                            <span class="line-bar"></span>
                            <span class="line-bar"></span>
                        </a>
                        <div id="right-menu">
                            <ul class="alternate-menu">
                                <li><a href="{{\App\Http\Actions\HomeAction::route()}}">Home</a></li>
                                <li><a href="all-pages.html">All Pages</a></li>
                                <li><a href="how-it-work.html">Help</a></li>
                                <li><a href="contact.html">Contact us</a></li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div><!-- end: .wrap-top-menu -->
        <div class="container_12 clearfix">
            <div class="grid_12 header-content">
                <div id="sys_header_right" class="header-right">
                    @if(!Auth::check())
                    <div class="account-panel">
                        <a href="#" class="btn btn-pascal sys_show_popup_login">Register</a>
                        <a href="#" class="btn btn-pascal sys_show_popup_login">Login</a>
                    </div>
                    @else
                        <div class="account-panel">
                            <a href="#" class="btn btn-pascal sys_logout" id="logout_btn">logout</a>
                        </div>
                    @endif
                    <div class="form-search">
                        <form action="#">
                            <label for="sys_txt_keyword">
                                <input id="sys_txt_keyword" class="txt-keyword" type="text" placeholder="Search proposals"/>
                            </label>
                            <button class="btn-search" type="reset"><i class="icon iMagnifier"></i></button>
                            <button class="btn-reset-keyword" type="reset"><i class="icon iXHover"></i></button>
                        </form>
                    </div>
                </div>
                <div class="header-left">
                    <h1 id="logo">
                        <a href="/"><img src="{{asset('images/logo.png')}}" alt="PascalCoin DAO" style="width: 75%"/></a>
                    </h1>
                    <div class="main-nav clearfix">
                        <div class="nav-item">
                            <a href="{{\App\Http\Actions\Proposal\ShowListAction::route(['status' => 'all'])}}" class="nav-title {{\App\Http\Actions\Proposal\ShowListAction::isActiveRoute() || \App\Http\Actions\Proposal\ShowDetailAction::isActiveRoute() ? ' active' : ''}}">Discover</a>
                            <p class="rs nav-description">Proposals</p>
                        </div>
                        @if(\Auth::check())
                        <span class="sep"></span>
                        <div class="nav-item">
                            <a href="{{\App\Http\Actions\Profile\DashboardAction::route()}}" class="nav-title" data-login="{{ auth::check() ? 'true' : 'false'}}">Profile</a>
                            <p class="rs nav-description">Your Profile</p>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </header><!--end: #header -->

    @yield('content')

    <footer id="footer">
        <div class="container_12 main-footer">
            <div class="grid_4 about-us">
                <h3 class="rs title">About</h3>
                <p class="rs description">The decentralized autonomous organization website for the PascalCoin proposal.</p>
                <p class="rs email"><a class="fc-default  be-fc-orange" href="mailto:dao@pascalcoin.org">dao@pascalcoin.org</a></p>
            </div><!--end: .contact-info -->
            <div class="grid_4 email-newsletter">
                <h3 class="rs title">Newsletter Signup</h3>
                <div class="inner">
                    <p class="rs description">Let us know your email and you'll be informed of new proposals regulary.</p>
                    <form action="#">
                        <div class="form form-email">
                            <label class="lbl" for="txt-email">
                                <input id="txt-email" type="text" class="txt fill-width" placeholder="Enter your e-mail address" value="{{ \Auth::check() ? \Auth::user()->email : '' }}"/>
                            </label>
                            <button class="btn btn-pascal" type="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div><!--end: .email-newsletter -->
            <div class="grid_4">
                <h3 class="rs title">Discover &amp; Create</h3>
                <div class="footer-menu">
                    <ul class="rs">
                        <li><a class="be-fc-orange" href="#">What is the PascalCoin DAO?</a></li>
                        <li><a class="be-fc-orange" href="#">Start a proposal</a></li>
                        <li><a class="be-fc-orange" href="#">Project guidelines</a></li>
                        <li><a class="be-fc-orange" href="#">Submitted proposals</a></li>
                        <li><a class="be-fc-orange" href="#">Accpeted proposals</a></li>
                        <li><a class="be-fc-orange" href="#">Active proposals</a></li>
                        <li><a class="be-fc-orange" href="#">Rejected proposals</a></li>
                        <li><a class="be-fc-orange" href="#">Finished proposals</a></li>
                    </ul>
                    <div class="clear"></div>
                </div>
            </div>
            <div class="clear"></div>
        </div>
        <div class="copyright">
            <div class="container_12">
                <div class="grid_12">
                    <a class="logo-footer" href="{{\App\Http\Actions\HomeAction::route()}}"><img src="{{asset('images/logo.png')}}" alt="$SITE_NAME"/></a>
                    <p class="rs term-privacy">
                        <a class="fw-b be-fc-orange" href="single.html">Terms & Conditions</a>
                        <span class="sep">/</span>
                        <a class="fw-b be-fc-orange" href="single.html">Privacy Policy</a>
                        <span class="sep">/</span>
                        <a class="fw-b be-fc-orange" href="#">FAQ</a>
                    </p>
                    <p class="rs ta-c fc-gray-dark site-copyright">PascalCoin.org</p>
                </div>
                <div class="clear"></div>
            </div>
        </div>
    </footer><!--end: #footer -->

</div>

<div class="popup-common" id="sys_popup_common">
    <div class="overlay-bl-bg"></div>
    <div class="container_12 pop-content">
        <div class="grid_12 wrap-btn-close ta-r">
            <i class="icon iBigX closePopup"></i>
        </div>
        <div class="grid_6 prefix_1">
            <div class="form login-form">
                <form action="#" id="register-form">
                    <h3 class="rs title-form">Register</h3>
                    <div class="box-white">
                        <h4 class="rs title-box">Ideas for a PascalCoin proposal?</h4>
                        <p class="rs">An account is required to continue.</p>
                        <div class="form-action">
                            <label for="register_name">
                                <p class="rs error" id="register_error_name">Err!</p>
                                <input id="register_name" class="txt fill-width" type="text" placeholder="Your Name"/>
                            </label>
                            <label for="register_email">
                                <p class="rs error" id="register_error_email">Err!</p>
                                <input id="register_email" class="txt fill-width" type="email" placeholder="Your E-Mail address"/>
                            </label>
                            <label for="register_password">
                                <p class="rs error" id="register_error_password">Err!</p>
                                <input id="register_password" class="txt fill-width" type="password" placeholder="Password"/>
                            </label>
                            <label for="register_password_confirmation">
                                <input id="register_password_confirmation" class="txt fill-width" type="password" placeholder="Confirm password"/>
                            </label>
                            <p class="rs ta-c">
                                <button class="btn btn-red btn-submit" type="submit">Register</button>
                            </p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="grid_4">
            <div class="form login-form">
                <form action="#" id="login-form">
                    <h3 class="rs title-form">Login</h3>
                    <div class="box-white">
                        <h4 class="rs title-box">Already Have an Account?</h4>
                        <p class="rs">Please log in to continue.</p>
                        <div class="form-action">
                            <label for="login_email">
                                <p class="rs error" id="login_error_email">Err!</p>
                                <input id="login_email" class="txt fill-width" type="email" placeholder="Enter your e-mail address"/>
                            </label>
                            <label for="login_password">
                                <p class="rs error" id="login_error_password">Err!</p>
                                <input id="login_password" class="txt fill-width" type="password" placeholder="Enter password"/>
                            </label>

                            <label for="login_remember" class="rs pb20 clearfix">
                                <input id="login_remember" type="checkbox" class="chk-remember"/>
                                <span class="lbl-remember">Remember me</span>
                            </label>
                            <p class="rs ta-c pb10">
                                <button class="btn btn-red btn-submit" type="submit">Login</button>
                            </p>
                            <!--p class="rs ta-c">
                                <a href="#" class="fc-orange">I forgot my password</a>
                            </p-->
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="clear"></div>
    </div>
</div>
</body>
</html>