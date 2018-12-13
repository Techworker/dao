<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>{{ config('app.name', 'Laravel')}}</title>

    <!-- Bootstrap core CSS -->
    <link href="{{mix('/css/app.css')}}" rel="stylesheet">
</head>

<body style="margin-bottom: 60px;">

<nav class="navbar navbar-expand-md navbar-light navbar-main">
    <div class="container">
        <a class="navbar-brand" href="/">
            <img src="/images/logo_white.png"> Pasconomy
        </a>
        <ul class="nav navbar-nav navbar-right navbar-main">
            <li><span class="badge badge-warning p-2">Voting active for<br />PHP Library</span></li>
        </ul>
    </div>
</nav>
<nav class="navbar navbar-expand-md navbar-light navbar-sub">
    <div class="container">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item{{\Request::is('proposals*') ? ' active' : ''}}">
                    <a class="nav-link" href="{{\App\Http\Actions\Proposal\ShowListAction::route(['status' => 'all'])}}">Discover<span>Proposals</span></a>
                </li>
                <li class="nav-item{{\Request::is('foundation*') ? ' active' : ''}}">
                    <a class="nav-link" href="{{\App\Http\Actions\Foundation\ShowAction::route()}}">Foundation<span>DATA</span></a>
                </li>
                <li class="nav-item{{\Request::is('contact*') ? ' active' : ''}}">
                    <a class="nav-link" href="{{\App\Http\Actions\Contact\ShowAction::route()}}">Contact<span>Get in touch</span></a>
                </li>
            </ul>
            @if(\Auth::check())
            <ul class="nav navbar-nav navbar-right navbar-main">
                <li class="nav-item{{\Request::is('profile*') ? ' active' : ''}}">
                    <a class="nav-link text-right" href="{{\App\Http\Actions\Profile\DashboardAction::route()}}">Profile<span>View Profile</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-right" href="{{route('logout')}}">Logout<span>{{\Auth::user()->name}}</span></a>
                </li>

            </ul>
            @else
                <ul class="nav navbar-nav navbar-right navbar-main">
                    <li class="nav-item">
                        <a class="nav-link text-right" href="{{route('register')}}">Register<span>new Account</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-right" href="{{route('login')}}">Login<span>Account</span></a>
                    </li>

                </ul>
            @endif
        </div>
    </div>
</nav>


@if(session()->has('flash'))
<div class="container p-4">
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            {{session()->get('flash')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
</div>
@endif
@yield('content')

<footer class="footer">
    <div class="container">
                <span class="text-muted">

                </span>
    </div>
</footer>


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
<script src="{{mix('/js/app.js')}}"></script>
</body>
</html>
