<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <title>SMAT</title>
    <!-- CSS  -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    {{--<link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>--}}
    <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css"
          integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet"/>
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <!-- Compiled and minified JavaScript -->

</head>
<body>

<div class="navbar-fixed">
    <nav class="white" role="navigation" style="height: 5em;">
        <div class="nav-wrapper">
            <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a>
            <a id="logo-container" href="{{url('/home')}}" class="brand-logo center">SMAT
            </a>
            <ul class="right hide-on-med-and-down">
            <li><a class="dropdown-trigger" href="#!" data-target="dropdown1">Account<i class="material-icons right">arrow_drop_down</i></a></li>
            </ul>

        </div>

    </nav>
    <ul id="dropdown1" class="dropdown-content">
        <li><a href="{{url('user-profile')}}">Profile</a></li>
        <li><a style="color:black;" href="{{ url('/logout') }}" class=""
               onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                Sign Out
            </a></li>
    </ul>
    <ul id="slide-out" class="sidenav ">
        <li><div class="user-view">
                <a href="#user"><img class="circle" src="{{!is_null($user->profile_picture_url)?$user->profile_picture_url:'/images/profile_placeholder.jpg'}}"/></a>
                <a href="#name"><span class="name" style="color:black;font-weight: bolder">{{$user->name . " ".$user->surname}}</span></a>
                <a href="#email"><span class="email" style="color:black;font-weight: bolder">{{$user->job_title}}</span></a>
            </div></li>
        <div class="divider"></div>

        <ul class="collapsible popout" style="margin-top:1em;" onclick="dashboard_show()">
            <li>
                <div class="collapsible-header" style="color:black;font-weight: bolder"> <i class="tiny material-icons">home</i><a href="/home" class="" style="color:black;"> Home</a>
                </div>
                <div class="collapsible-body" >
                </div>
            </li>
        </ul>
        {{--<ul class="collapsible popout" style="margin-top:1em;">--}}
            {{--<li>--}}
                {{--<div class="collapsible-header" style="color:black;font-weight: bolder"> <i class="tiny material-icons">assignment</i>--}}
                    {{--Projects </div>--}}
                {{--<div class="collapsible-body" >--}}
                    {{--<ul>--}}
                        {{--<li><a href="#" class="" style="color:black;font-weight: bolder;"><i class="tiny material-icons">redeem</i>Manage Projects</a></li>--}}
                        {{--<li><a href="#" class="" style="color:black;font-weight: bolder;"><i class="tiny material-icons">queue</i>Completed Projects</a></li>--}}
                    {{--</ul>--}}
                {{--</div>--}}
            {{--</li>--}}
        {{--</ul>--}}
        <ul class="collapsible popout" style="margin-top:1em;" onclick="reports_show()">
            <li>
                <div class="collapsible-header" style="color:black;font-weight: bolder"> <i class="tiny material-icons">assessment</i><a href="#!" class="" style="color:black;"> Reports</a>
                </div>
                <div class="collapsible-body" >
                </div>
            </li>
        </ul>
        <ul class="collapsible popout" style="margin-top:1em;">
            <li>
                <div class="collapsible-header" style="color:black;font-weight: bolder"> <i class="tiny material-icons">supervisor_account</i>
                    Users </div>
                <div class="collapsible-body" >
                    <ul>
                        <li><a style="color:black;font-weight: bolder" class="" href="#!"><i
                                        class="tiny material-icons">account_circle</i>Manage Users</a></li>
                        <li><a style="color:black;font-weight: bolder" class="" href="#!"><i
                                        class="tiny material-icons">security</i>Roles</a></li>
                        <li><a style="color:black;font-weight: bolder" class="" href="#!"><i
                                        class="tiny material-icons">security</i>Permissions</a></li>

                    </ul>
                </div>
            </li>
        </ul>
        <div class="divider"></div>
        <ul class="collapsible popout" style="margin-top:1em;">
            <li>
                <div class="collapsible-header" style="color:black;font-weight: bolder"> <i class="tiny material-icons">account_circle</i><a href="/user-profile" class="" style="color:black;"> Profile</a>
                </div>
                <div class="collapsible-body" >
                </div>
            </li>
        </ul>
        <ul class="collapsible popout" style="margin-top:1em;">
            <li>
                <div class="collapsible-header" style="color:black;font-weight: bolder">
                    <a style="color:black;" href="{{ url('/logout') }}" class=""
                       onclick="event.preventDefault();
                document.getElementById('logout-form').submit();"><i
                                class="tiny material-icons">vpn_key</i>
                        Sign Out
                    </a>
                </div>
                <div class="collapsible-body" >
                </div>
            </li>
        </ul>

    </ul>

</div>
<div class="container-fluid">
    @yield('content')
</div>

</div>
<style>
    .sidenav-overlay {
        z-index: 996;
    }

    @media only screen and (min-width: 993px) {
        nav a.sidenav-trigger {
            display: inline;
        }
    }

</style>
<!--  Scripts-->
<script
        src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

<script>
    $(document).ready(function () {
        console.log("initializing");
        $('input.autocomplete').autocomplete({
            data: {
                "Apple": null,
                "Microsoft": null,
                "Google": 'https://placehold.it/250x250'
            },
        });
        M.AutoInit();
        $(".dropdown-trigger").dropdown();
    });
    function dashboard_show(){

        window.location.href = '/home';
    }

    function reports_show(){

    }

</script>
@stack('custom-scripts')
</body>
</html>
