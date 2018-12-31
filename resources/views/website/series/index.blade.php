@extends('layouts.app')

@section('css')
    @parent
    <style>
        .title {
            margin-bottom: 29px !important;
            margin-top: 29px !important;
        }
        .media-content {
            text-align: right !important;
        }
        .box {
            -webkit-box-shadow: none !important;
            -moz-box-shadow: none !important;
            box-shadow: none !important;
        }
        .related-list .autoplay {
            padding-bottom: 10px;
        }

        .related-list .autoplay .autoplay-title {
            font-weight: bold;
        }
        .related-list .autoplay .autoplay-toggle {
            float:right;
        }
        .related-list .autoplay .autoplay-toggle .fa{
            font-size: 13px;
            padding:5px 10px;
        }
        .media-content {
            text-align: right !important;
        }
    </style>
@stop
@section('content')
    <section class="hero is-small is-meshal is-bold">
        <div class="hero-body">
            <div class="container">
                <div class="is-full-desktop is-narrow">
                    <div class="level is-centered">
                        <div class="level-item">
                            <div>
                                <h1 class="title is-1 m-t-29 m-b-29 has-text-centered has-text-white">
                                    <b-icon icon="home"></b-icon>
                                    {{ $series->title }}
                                </h1>
                                <p class="subtitle">
                                    {{ $series->description }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Hero footer: will stick at the bottom -->
    </section>
    <div class="container">
        <div class="columns is- is-marginless is-centered">
            <div class="column is-three-quarters">
                <nav class="card">
                    <div class="card-content is-right" dir="rtl">
                        <div class="is-full-desktop">
                            <div class="box related-list">
                                {{--<p class="autoplay">--}}
                                    {{--<span class="autoplay-title">Up next</span>--}}
                                    {{--<span class="autoplay-toggle">--}}
                                  {{--Autoplay--}}
                                  {{--<i class="fa fa-info-circle"></i>--}}
                                {{--</span>--}}
                                {{--</p>--}}

                                @include('website.partials.series.related_list',['lessons' => $series->lessons])

                            </div>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
@endsection