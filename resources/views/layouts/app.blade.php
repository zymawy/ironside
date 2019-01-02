<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{App::isLocale('ar')? 'rtl':'ltr'}}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <meta name="author" content="{!! config('app.author') !!}">
    <meta name="keywords" content="{!! config('app.keywords') !!}">
    <meta name="description" content="{{ isset($description) ? $description : config('app.description') }}"/>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Favicon icons -->
    @include ('partials.favicons')
    <title>{{ isset($title) ? $title : config('app.name') }}</title>
    <link rel="stylesheet" href="{{ mix('css/theme.css') }}">
    @yield('css')
    @if(App::isLocale('ar'))
        <link rel="stylesheet" href="{{ mix('/css/rtl.css') }}">
        @else
        <link rel="stylesheet" href="{{ mix('/css/ltr.css') }}">
    @endif

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:** -->
    <!--[if lt IE 9]>
    <script src="https:**oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https:**oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body class="fix-header fix-sidebar" dir="{{App::isLocale('ar')? 'rtl':'ltr'}}">
<h1 class="hidden">{{ isset($title) ? $title : config('app.name') }}</h1>
<!-- Preloader - style you can find in spinners.css -->
{{--<div class="preloader">--}}
    {{--<svg class="circular" viewBox="25 25 50 50">--}}
            {{--<circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10"/>--}}
    {{--</svg>--}}
{{--</div>--}}
@include('layouts.includes.header')

@include('DH::partials.navigation')

<!-- Main wrapper  -->
<div>
    <div id="main-wrapper">
        <!-- Page wrapper  -->
        <div class="page-wrapper">
        @include('layouts.includes.breadcrumb')
        <!-- Container fluid  -->
            <div class="container-fluid" id="app">
                <!-- Start Page Content -->
                    @yield('content')
                <!-- End PAge Content -->
            </div>
            <!-- End Container fluid  -->
        </div>
        <!-- End Page wrapper  -->
    </div>
    <!-- Main wrapper  -->
</div>
@include('DH::partials.modals')
@include('layouts.includes.footer')
<script src="{{ mix('js/master.js') }}"></script>
<script src="{{ mix('js/theme.js') }}"></script>
<script type="text/javascript" charset="utf-8" src="{{ mix('js/dashboard.js') }}"></script>

@include('partials.notify')

<script type="text/javascript" charset="utf-8">
    $(document).ready(function () {
        initDashboard();
    });
</script>

@yield('js')

@if(config('app.env') != 'local')
    @include('DH::partials.analytics')
@endif

</body>
</html>
