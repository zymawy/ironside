<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <title> @yield('title-page') - Laravel Dashboard Dashboard Template - Created By Zymawy</title>
    <link rel="stylesheet" href="{{ asset('/css/dashboard/theme.css') }}">

    <link rel="stylesheet" href="/css/admin/helper.css">
    <link rel="stylesheet" href="{{ asset('/css/dashboard/rtl.css') }}">
    <style>
        body {
            background-color: transparent;
        }
         html {
             background: url("/images/login-bg-1920.png") no-repeat center center fixed;
             -webkit-background-size: cover;
             -moz-background-size: cover;
             -o-background-size: cover;
             background-size: cover;
         }
        @media only screen and (min-width: 1921px) {
            html {
                background-image: url("/images/login-bg-5120.png") no-repeat center center fixed;
                -webkit-background-size: cover;
                -moz-background-size: cover;
                -o-background-size: cover;
                background-size: cover;
            }
        }
        @media (min-width:480px) {
            html {
                background: url("/images/login-bg-1920.png") no-repeat center center fixed;
                -webkit-background-size: cover;
                -moz-background-size: cover;
                -o-background-size: cover;
                background-size: cover;
            }
        }
        @media only screen and (-webkit-min-device-pixel-ratio: 1.5) and (min-width: 961px),
        only screen and (-moz-min-device-pixel-ratio: 1.5) and (min-width: 961px),
        only screen and (-o-min-device-pixel-ratio: 3/2) and (min-width: 961px),
        only screen and (min-device-pixel-ratio: 1.5) and (min-width: 961px),
        only screen and (min-resolution: 1.5dppx) and (min-width: 961px) {
            html {
                background-image: url("/images/login-bg-5120.png") no-repeat center center fixed;
                -webkit-background-size: cover;
                -moz-background-size: cover;
                -o-background-size: cover;
                background-size: cover;
            }
        }
    </style>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:** -->
    <!--[if lt IE 9]>
    <script src="https:**oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https:**oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    @yield('css')
</head>

<body class="fix-header fix-sidebar">
<!-- Preloader - style you can find in spinners.css -->
{{--<div class="preloader">--}}
    {{--<svg class="circular" viewBox="25 25 50 50">--}}
        {{--<circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>--}}
{{--</div>--}}
<!-- Main wrapper  -->
<div id="main-wrapper">

    @yield('content')

</div>

<!-- End Wrapper -->
<!--Custom JavaScript -->
@include('partials.notify')
<!-- scripit init-->
@yield('js')

</body>

</html>