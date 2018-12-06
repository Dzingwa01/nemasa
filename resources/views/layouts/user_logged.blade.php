<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Munitask') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
   <link href="/css/side-nav.css" rel="stylesheet"/>
</head>
<body>
<div id="app">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <button type="button" id="sidebarCollapse" class="btn btn-info">
            <span class="navbar-toggler-icon"></span>
        </button>

        <a class="navbar-brand" href="/home" style="margin-left: 2em;">SMAT</a>

    </nav>

    <div id="mySidenav" class="sidenav nav-side-menu">
        <a href="javascript:void(0)" class="closebtn" style="padding:0px;" onclick="closeNav()">&times;</a>
        <div class="" style="margin-top:3em;">
            <div class="card hovercard" style="width: 300px;">
                <div class="cardheader">
                </div>
                <div class="avatar">
                    <img alt="" src="http://lorempixel.com/100/100/people/9/">
                </div>
                <div class="info">
                    <div class="title">
                        <a style="color:white;">{{$user->name .' '.$user->surname}}</a>
                    </div>
                    <div class="desc">{{$user->job_title}}</div>

                </div>

            </div>
        </div>
        <div class="menu-list">
            <ul id="menu-content" class="menu-content">
                <li>
                    <a href="/home">
                        <i class="material-icons">home</i> Dashboard
                    </a>
                </li>

                <li>
                    <a href="#"><i class="material-icons">assignment</i> Projects</a>
                </li>


                <li>
                    <a href="#"><i class="material-icons">assessment</i> Reports</a>
                </li>
                <ul class="sub-menu collapse" id="new">
                    <li>New New 1</li>
                    <li>New New 2</li>
                    <li>New New 3</li>
                </ul>

                <li>
                    <a href="#">
                        <i class="material-icons">verified_user</i> Account Management
                    </a>
                </li>

                <li>
                    <a href="#">
                        <i class="material-icons">account_box</i>  Users
                    </a>
                </li>
            </ul>
        </div>
    </div>

    {{--<nav class="navbar navbar-expand-md navbar-light navbar-laravel">--}}
    {{--<div class="container">--}}
    {{--<a class="navbar-brand" href="{{ url('/') }}">--}}
    {{--{{ config('app.name', 'Laravel') }}--}}
    {{--</a>--}}
    {{--<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">--}}
    {{--<span class="navbar-toggler-icon"></span>--}}
    {{--</button>--}}

    {{--<div class="collapse navbar-collapse" id="navbarSupportedContent">--}}
    {{--<!-- Left Side Of Navbar -->--}}
    {{--<ul class="navbar-nav mr-auto">--}}

    {{--</ul>--}}

    {{--<!-- Right Side Of Navbar -->--}}
    {{--<ul class="navbar-nav ml-auto">--}}
    {{--<!-- Authentication Links -->--}}
    {{--@guest--}}
    {{--<li class="nav-item">--}}
    {{--<a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>--}}
    {{--</li>--}}
    {{--<li class="nav-item">--}}
    {{--@if (Route::has('register'))--}}
    {{--<a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>--}}
    {{--@endif--}}
    {{--</li>--}}
    {{--@else--}}
    {{--<li class="nav-item dropdown">--}}
    {{--<a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>--}}
    {{--{{ Auth::user()->name }} <span class="caret"></span>--}}
    {{--</a>--}}

    {{--<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">--}}
    {{--<a class="dropdown-item" href="{{ route('logout') }}"--}}
    {{--onclick="event.preventDefault();--}}
    {{--document.getElementById('logout-form').submit();">--}}
    {{--{{ __('Logout') }}--}}
    {{--</a>--}}

    {{--<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">--}}
    {{--@csrf--}}
    {{--</form>--}}
    {{--</div>--}}
    {{--</li>--}}
    {{--@endguest--}}
    {{--</ul>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</nav>--}}


</div>
<script>
    $(document).ready(function(){
       $('#sidebarCollapse').on('click',function(){
          $("#mySidenav").css('width','250px');
       });
    });
    function closeNav() {
        $("#mySidenav").css('width','0px');
    }
</script>
</body>
</html>
