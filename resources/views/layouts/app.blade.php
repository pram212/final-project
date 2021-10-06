<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>{{ config('app.name', 'Laravel') }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
	<meta name="author" content="AdminKit">
	<meta name="keywords" content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">
    <!-- Favicon icon -->
    <link rel="shortcut icon" href="img/icons/icon-48x48.png" />
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,800" rel="stylesheet">
    <!-- Required Fremwork -->
    <link href="{{asset('template/css/app.css')}}" rel="stylesheet">
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous"> --}}
    @yield('css')
</head>

<body>
    <div class="wrapper">
        @auth
            @include('layouts.sidebar-menu')
        @endauth
        
        <div class="main">
            @include('layouts.navbar-header')

            <main class="content">
                <div class="container-fluid p-0">

                    @yield('content')

                </div>
            </main>
        </div>

    </div> 
    {{-- wrapper end --}}

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    <script src="{{asset('template/js/app.js')}}"></script>
    <script src=""></script>
    <script>
        $(document).ready(function () {
            var userElement = $("#user-list");
            $.ajax({
                type: "get",
                url: "/userlist",
                success: function (response) {
                    // console.log(response)
                    $.each(response, function (i, value) { 
                        $("#user-list").append('<li><a href="/user/'+value['id']+'"><i class="ti-user"></i> '+ value['name'] +'<span class="pcoded-mcaret"></span></a></li>');
                    });
                }
            });
        });
    </script>
    @stack('script')
</body>

</html>

