@extends('layouts.app')

@section('css')
    <style>
        .has-text-muted {
            color: #95A5A6;
        }

        .spacer {
            height: 20px;
        }

        .nav-left .searchbox {
            margin-top: 10px;
        }

        .avatar-photo {
            border-radius: 50px;
        }

        .video-title {
            font-size: 1.5em;
            font-weight: 500;
        }

        .box.video-description {
            padding: 20px 20px 5px 20px;
        }

        .video-description-more {
            font-size: 12px;
            font-weight: bold;
            text-transform: uppercase;
            margin-top: -15px;
        }

        .related-card .video-title {
            display: block;
            font-size: 13px;
            font-weight: 500;
        }

        .related-card .video-account, .related-card .video-views {
            display: block;
            font-size: 11px;
            color: #95A5A6;
        }

        .related-card img {
            height: 68px;
        }

        .related-card.media .media, .related-card.media + .media {
            border-top: none;
        }

        .related-list .autoplay {
            padding-bottom: 10px;
        }

        .related-list .autoplay .autoplay-title {
            font-weight: bold;
        }

        .related-list .autoplay .autoplay-toggle {
            float: right;
        }

        .related-list .autoplay .autoplay-toggle .fa {
            font-size: 13px;
            padding: 5px 10px;
        }

        .title {
            margin-bottom: 29px !important;
            margin-top: 29px !important;
        }

        .media-content {
            text-align: right !important;
        }
        .hero {
            padding-top: 5px !important;
        }
        .hero.is-large .hero-body {
            padding: 0 !important;
            margin: 0 !important;
        }
        .content figure {
            margin-left: 1em !important;
            margin-right: -3em !important;
            text-align: center;
        }
    </style>
@stop
@section('content')
    <section class="hero is-dark is-large">
        <div class="hero-head">
        </div>
        <div class="hero-body">
            <div class="container has-text-centered">
                <div class="video-player-wrap">
                    <div class="video-player">
                        <div style="max-width: 1600px;">
                           <div>
                               <vue-plyr
                                       :options="{settings:['captions', 'quality', 'speed', 'loop']}"
                               >
                                   <div data-plyr-provider="youtube" data-plyr-embed-id="{!! $lesson->identifier !!}"></div>
                               </vue-plyr>
                           </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="spacer"></div>
    <div class="container">
        <div class="columns">
            <div class="column is-9">
                <div class="box video-meta">
                    <div class="video-title">
                        {{ $lesson->title }}
                    </div>
                    <br>
                        <p><strong>اخر تحديث {{ $lesson->updated_at->diffforhumans() }}</strong></p>
                        <hr>
                    <p>
                        {!!  $lesson->description  !!}
                    </p>
                </div>

                <div class="box">
                    <article class="media">
                        <div class="media-content">
                            @include('website.partials.form.form_comment')
                        </div>
                        <figure class="media-right">
                            <p class="image is-64x64">
                                <img src="{!!   Gravatar::get(user()->email)  !!}">
                            </p>
                        </figure>
                    </article>
                    <hr>
                    @isset($comments['root'])
                        @include('website.partials.form.list_comment',['collection' => $comments['root']])
                    @endisset

                </div>
            </div>
            <div class="column is-3">
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
    </div>
@stop

@section('js')
    @parent
@stop