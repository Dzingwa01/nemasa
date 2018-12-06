<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'SMAT') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link href="/css/w3_nav_side.css" rel="stylesheet"/>
</head>
<body>
<div id="app">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <button id="openNav" class="w3-button w3-teal w3-xlarge" onclick="w3_open()">&#9776;</button>
        <a class="navbar-brand mx-auto" href="/home" style="margin-left: 2em;">SMAT</a>
    </nav>

    <div class="w3-sidebar w3-bar-block w3-card w3-animate-left" style="display:none" id="mySidebar">
        <button class="w3-bar-item w3-button w3-large"
                onclick="w3_close()">Close &times;</button>
        <div>
            <div class="card hovercard" >

                <div class="avatar">
                    <img alt="" src="{{!is_null($user->profile_picture_url)?$user->profile_picture_url:'/images/profile_placeholder.jpg'}}"/>
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
    <div id="main">
    <div class="w3-container">
        @yield('content')
    </div>
    </div>

</div>
<script>
    function w3_open() {
        let width = $(window).width();
        if(width>768){
            document.getElementById("main").style.marginLeft = "20%";
            document.getElementById("mySidebar").style.width = "20%";
            document.getElementById("mySidebar").style.display = "block";
            document.getElementById("openNav").style.display = 'none';
        }else{
            document.getElementById("main").style.marginLeft = "50%";
            document.getElementById("mySidebar").style.width = "50%";
            document.getElementById("mySidebar").style.display = "block";
            document.getElementById("openNav").style.display = 'none';
        }

    }
    function w3_close() {
        document.getElementById("main").style.marginLeft = "0%";
        document.getElementById("mySidebar").style.display = "none";
        document.getElementById("openNav").style.display = "inline-block";
    }
    window.onresize = function(event) {
        w3_open();
    };
    function closeNav() {
        $("#mySidenav").css('width','0px');
    }
</script>
</body>
</html>
