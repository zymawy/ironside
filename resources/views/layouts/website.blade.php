<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="{{ config('app.author') }}">
    <meta name="keywords" content="{{ config('app.keywords') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="{{ isset($description) ? $description : config('app.description') }}"/>

    <meta property="og:type" name="og:type" content="website"/>
    <meta property="og:site_name" content="{{ config('app.name') }}"/>
    <meta property="og:url" name="og:url" content="{{ request()->url() }}"/>
    <meta property="og:caption" name="og:caption" content="{{ config('app.url') }}"/>
    <meta property="fb:app_id" name="fb:app_id" content="{{ config('app.facebook_id') }}"/>
    <meta property="og:title" name="og:title" content="{{ isset($title) ? $title : config('app.title') }}">
    <meta property="og:description" name="og:description" content="{{ isset($description) ? $description : config('app.description') }}">
    <meta property="og:image" name="og:image" content="{{ config('app.url') }}{{ isset($image) ? $image : '/images/logo.png' }}">

    @include('partials.favicons')

    <title>{{ config('app.name') }}</title>

    <link rel="stylesheet" media="screen" href="https://fontlibrary.org/face/droid-arabic-kufi" type="text/css" />
    <link rel="stylesheet" href="/css/style.css">
    <script src="https://unpkg.com/scrollreveal@4.0.0/dist/scrollreveal.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.2/jquery.fancybox.css" />
    <style>
        .hero-content {
            position: absolute;
            top: -39px;
            z-index: 9990;
            left: 0;
            right: 0;
            bottom: 0;
            color: black !important;
        }

        /* banner */
        .banner-container .banner-image{
            display: inline-block;
            background: no-repeat center center;
            width: 800px;
            height: 600px;
            max-width: 800px !important;
            max-height: 362px !important;
            background-size: cover;
        }

        .carousel.banners .carousel-control span {
            width: 0px;
            height: 100px;
            margin-top: -50px;
            font-size: 100px;
        }
        .owl-stage-outer {
            width: 100%;
            height: 100%;
        }

        .carousel-control-next, .carousel-control-prev {
            top: 0;
            right: 0;
            bottom: 0;
            position: absolute;
            z-index: 9;
            position: absolute;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            -webkit-box-pack: center;
            -ms-flex-pack: center;
            justify-content: center;
            width: 15%;
            color: #fff;
            text-align: center;
            opacity: .5;
        }

        .carousel-control-prev {
            left: 0;
        }
        .label-featuered {
            background: #00CFEB;
            display: -webkit-inline-box;
            display: -ms-inline-flexbox;
            display: inline-flex;
            font-size: 13px;
            letter-spacing: 0px;
            font-weight: 700;
            line-height: 16px;
            text-transform: uppercase;
            text-decoration: none !important;
            border: none;
            border-radius: 2px;
            cursor: pointer;
            -webkit-box-pack: center;
            -ms-flex-pack: center;
            justify-content: center;
            padding: 16px 32px;
            height: 48px;
            text-align: center;
            white-space: nowrap;
        }
    </style>
    @yield('css')
</head>

    <body id="top" class="is-boxed has-animations">
        <h1 class="d-none" style="display: none">{{ isset($title) ? $title : config('app.name') }}</h1>

        @if(config('app.env') != 'local')
            @include('partials.facebook')
        @endif

        <div class="body-wrap boxed-container">

            @yield('content')
        </div>

        {{--@include('ironside::website.partials.footer')--}}

        {{--@include('ironside::website.partials.popups')--}}

        {{-- back to top --}}
        <a href="#top" class="back-to-top jumper btn btn-secondary">
            <i class="fa fa-angle-up"></i>
        </a>

        @if(config('app.env') != 'local')
            @include('partials.analytics')
        @endif
        <script
                src="https://code.jquery.com/jquery-3.3.1.js"
                integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
                crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.js"></script>
        {{--<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.2/jquery.fancybox.css"></script>--}}
        <script src="/js/main.js"></script>
        @include('notify::notify')
        <script type="text/javascript">

            $(document).ready(function(){
                var owl = $('.owl-carousel');
                owl.owlCarousel({
                    rtl:true,
                    nav:true,
                    items:1,
                    loop:true,
                    center:true,
                    autoWidth:true,
                    dots:true,
                    lazyLoad:true,
                    autoplay:true,
                    autoplayTimeout:6000,
                    autoplayHoverPause:true
                });
            });
        </script>
        @yield('js')
    </body>
</html>
