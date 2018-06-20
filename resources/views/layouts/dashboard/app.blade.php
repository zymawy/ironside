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
    <title>Ironside - Laravel Admin Dashboard Template - Created By Zymawy</title>
    {{-- <link rel="stylesheet" href="/css/admin/bootstrap.css"> --}}
    <link rel="stylesheet" href="/css/app.css">
    {{-- <link rel="stylesheet" href="/css/admin/admin.css"> --}}
    <link rel="stylesheet" href="/css/admin/calendar2.css">
    <link rel="stylesheet" href="/css/admin/carousel.css"> @yield('css')

    <link rel="stylesheet" href="/css/admin/helper.css">
    @if(App::isLocale('ar'))
        <link rel="stylesheet" href="/css/admin/style-rtl.css">
        @else
        <link rel="stylesheet" href="/css/admin/style.css">
    @endif
    <link rel="stylesheet" href="/css/override.css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:** -->
    <!--[if lt IE 9]>
        <script src="https:**oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https:**oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body class="fix-header fix-sidebar">
    <!-- Preloader - style you can find in spinners.css -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
			<circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
    <div id="app">
        <!-- Main wrapper  -->
        <div id="main-wrapper">

            @yield('content')

        </div>
        <!-- End Page wrapper  -->
    </div>
    <!-- Main wrapper  -->

    <!-- All Jquery -->
    <script src="/js/admin/jquery.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="/js/admin/bootstrap.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="/js/admin/slimscroll.js"></script>
    <!--Menu sidebar -->
    <script src="/js/admin/sidebarmenu.js"></script>
    <!--stickey kit -->
    <script src="/js/admin/sticky-kit.js"></script>
    <!--Custom JavaScript -->

    <!-- Amchart -->
    <script src="/js/admin/morris-chart.js"></script>

    <script src="/js/admin/calendar-2.js"></script>

    <script src="/js/admin/owl-carousel.js"></script>

    <!-- scripit init-->

    @yield('js')

    <script src="/js/admin/scripts.js"></script>
</body>

</html>
