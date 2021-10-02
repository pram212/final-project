<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>{{ config('app.name', 'Laravel') }}</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="description" content="CodedThemes">
    <meta name="keywords" content="flat ui, admin  Admin , Responsive, Landing, Bootstrap, App, Template, Mobile, iOS, Android, apple, creative app">
    <meta name="author" content="CodedThemes">
    <!-- Favicon icon -->
    <link rel="icon" href="{{asset('template/images/favicon.ico')}}" type="image/x-icon">
    <!-- Google font--><link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,800" rel="stylesheet">
    <!-- Required Fremwork -->
    <link rel="stylesheet" type="text/css" href="{{asset('template/css/bootstrap/css/bootstrap.min.css')}}">
    <!-- themify-icons line icon -->
    <link rel="stylesheet" type="text/css" href="{{asset('template/icon/themify-icons/themify-icons.css')}}">
    <!-- ico font -->
    <link rel="stylesheet" type="text/css" href="{{asset('template/icon/icofont/css/icofont.css')}}">
    <!-- Style.css -->
    <link rel="stylesheet" type="text/css" href="{{asset('template/css/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('template/css/jquery.mCustomScrollbar.css')}}">
</head>

<body>
    <!-- Pre-loader start -->
    <div class="theme-loader">
        <div class="ball-scale">
            <div class='contain'>
                <div class="ring"><div class="frame"></div></div>
                <div class="ring"><div class="frame"></div></div>
                <div class="ring"><div class="frame"></div></div>
                <div class="ring"><div class="frame"></div></div>
                <div class="ring"><div class="frame"></div></div>
                <div class="ring"><div class="frame"></div></div>
                <div class="ring"><div class="frame"></div></div>
                <div class="ring"><div class="frame"></div></div>
                <div class="ring"><div class="frame"></div></div>
                <div class="ring"><div class="frame"></div></div>
            </div>
        </div>
    </div>
    <!-- Pre-loader end -->

    <div id="pcoded" class="pcoded">
        <div class="pcoded-overlay-box"></div>
        <div class="pcoded-container navbar-wrapper">

            @include('layouts.navbar-header')

            <div class="pcoded-main-container">
                <div class="pcoded-wrapper">
                    @auth
                    @include('layouts.sidebar-menu')
                    @endauth

                    <div class="pcoded-content">
                        <div class="pcoded-inner-content">
                            <div class="main-body">
                                @yield('content')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<!-- Required Jquery -->
<script type="text/javascript" src="{{asset('template/js/jquery/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{asset('template/js/jquery-ui/jquery-ui.min.js')}}"></script>
<script type="text/javascript" src="{{asset('template/js/popper.js')}}/popper.min.js')}}"></script>
<script type="text/javascript" src="{{asset('template/js/bootstrap/js/bootstrap.min.js')}}"></script>
<!-- jquery slimscroll js -->
<script type="text/javascript" src="{{asset('template/js/jquery-slimscroll/jquery.slimscroll.js')}}"></script>
<!-- modernizr js -->
<script type="text/javascript" src="{{asset('template/js/modernizr/modernizr.js')}}"></script>
<script type="text/javascript" src="{{asset('template/js/modernizr/css-scrollbars.js')}}"></script>
<!-- classie js -->
<script type="text/javascript" src="{{asset('template/js/classie/classie.js')}}"></script>
<!-- Custom js -->
<script type="text/javascript" src="{{asset('template/js/script.js')}}"></script>
<script src="{{asset('template/js/pcoded.min.js')}}"></script>
<script src="{{asset('template/js/demo-12.js')}}"></script>
<script src="{{asset('template/js/jquery.mCustomScrollbar.concat.min.js')}}"></script>
<script>
    $(document).ready(function () {
        var userElement = $("#user-list");
        $.ajax({
            type: "get",
            url: "/userlist",
            success: function (response) {
                $.each(response, function (i, value) { 
                    $("#user-list").append('<li><a href="/user/'+value['id']+'"><i class="ti-user"></i> '+ value['name'] +'<span class="pcoded-mcaret"></span></a></li>');
                });
            }
        });
    });
</script>

</body>

</html>

