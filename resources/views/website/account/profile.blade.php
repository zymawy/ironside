@extends('layouts.app')

@section('css')
    <style>
        .stat-val {
            font-size: 3em;
            padding-top: 20px;
            font-weight: bold;
        }

        .section.profile-heading .column.is-2-tablet.has-text-centered + .has-text-centered {
            border-left: 1px dotted rgba(0, 0, 0, .2);
        }


        .control.is-pulled-left span.select {
            margin-right: 5px;
            border-radius: 2px;
        }

        .modal-card .content h1 {
            padding: 40px 10px 10px;
            border-bottom: 1px solid #dadada
        }

        .container.profile .profile-options .tabs ul li.link a {
            margin-bottom: 20px;
            padding: 20px;
            background-color: #F1F1F1;
        }
    </style>
@stop
@section('content')
    <section class="hero is-small is-meshal is-bold" style="padding-top: 0 !important;">
        <div class="hero-body">
            <div class="container">
                <div class="columns">
                    <div class="column is-2 is-norrow">
                        <figure class="image is-128x128">
                            <img src="{!!   Gravatar::get(user()->email)  !!}">
                        </figure>
                    </div>
                    <div class="column is-10 has-text-white">
                        <h1 class="title has-text-white">
                            {{ user()->firstname }} - {{ user()->id }}
                            <br>

                        </h1>
                        <h2 class="subtitle p-t-10 p-r-10 has-text-white">
                            &#x1F942; عضو  {{ user()->created_at->diffForHumans() }}
                        </h2>
                        <div class="hero-foot">
                            <div class="tabs">
                                <ul>
                                    @if(user()->level)
                                    <li class="">
                                        انت الان في المستوى :
                                        {{--badge" data-badge=""--}}
                                        <button class="button is-badge-small">
                                                {{ user()->level->title }}
                                        </button>
                                    </li>
                                        @else
                                        <li>
                                            <article class="message">
                                                <div class="message-body">
                                               لست مشترك في اي مستوى!
                                                </div>
                                            </article>
                                        </li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Hero footer: will stick at the bottom -->
    </section>
    <div class="container">
        @if(user()->confirmed_at)
        <div class="columns is- is-marginless is-centered">
            <div class="column">
                <nav class="card">
                    <header class="card-header">
                        <p class="card-header-title">
                            الاحداث
                        </p>
                    </header>

                    <div class="card-content">
                      @include('website.partials.side_news')
                    </div>
                </nav>
            </div>
            <div class="column is-three-quarters">
                <nav class="card">
                    @if ($errors->any())
                        <b-notification type="is-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </b-notification>
                    @endif
                        @if (session()->has('success'))
                            <b-notification type="is-success">
                              {{ session()->get('success') }}
                            </b-notification>
                        @endif
                    <div class="card-content">
                        <template>
                            <section>
                                <b-tabs type="is-boxed" :animated="false">
                                    {{--<b-tab-item label="الرئيسية" icon="home">--}}

                                        {{--@include('website.partials.account.myTimeLine')--}}

                                    {{--</b-tab-item>--}}
                                    <b-tab-item label="المستوىات" icon="google-photos">
                                        @if(!empty(user()->level))
                                            @foreach(user()->level->series as $series)
                                                @include('website.partials.account.series',['series' => $series])
                                            @endforeach
                                            @else
                                            <article class="message is-warning">
                                                <div class="message-header">
                                                    <p>لست مشترك في اي مستوى</p>
                                                    <button class="delete" aria-label="delete"></button>
                                                </div>
                                                <div class="message-body">
                                                    لست مشترك في اي مستوى 
                                                    <a href="{{ route('subscriptions') }}"
                                                       class="button is-success">
                                                        <b-icon icon="check"></b-icon>

                                                          اشترك الان
                                                    </a>
                                                </div>
                                            </article>
                                       @endif
                                    </b-tab-item>
                                    <b-tab-item label="الاشتراك" icon="library-music">

                                        @include('website.partials.account.subscriptions')

                                    </b-tab-item>
                                    <b-tab-item label="الاعدادت" icon="account-multiple-plus">

                                        @include('website.partials.account.mySettings')

                                    </b-tab-item>
                                    <b-tab-item class="is-active" label="كلمة المرور" icon="lock-open">

                                        @include('website.partials.account.myChangePassword')

                                    </b-tab-item>
                                </b-tabs>
                            </section>
                        </template>
                    </div>
                </nav>
            </div>
        </div>
            @else
            <div class="container">
                <div class="m-t-20 is-centered">
                    <b-message closable="false" type="is-info" has-icon>
                        <p class="has-text-centered">
                            تم إنشاء حسابك بالنجاح ، سيتم التواصل معك عبر بريدك الالكتروني حال <strong> اعتمادك </strong> في المنصة!
                        </p>
                    </b-message>
                </div>
            </div>
        @endif
    </div>
@endsection

@section('js')
    <script>
        $(() => {
            $('#edit-preferences').click(function(){
                $('#edit-preferences-modal').addClass('is-active');
            });
            $('.modal-card-head button.delete, .modal-save, .modal-cancel').click(function(){
                $('#edit-preferences-modal').removeClass('is-active');
            });
        });
    </script>
@stop
<script>
    import BIcon from "buefy/src/components/icon/Icon";
    export default {
        components: {BIcon}
    }
</script>