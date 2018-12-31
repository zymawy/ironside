@extends('layouts.auth')
@section('css')
    <style>
        html,
        body,
        .centered-image{
            display: flex;
            height: 100%;
            width: 100%;
            align-items: center;
            justify-content: center;
            background: #0f8a9d;
            background: linear-gradient(57deg, #00C6A7 0%, #1E4D92 100%);
            font-family: 'DroidArabicKufiRegular', Serif;
        }
        .card.is-wide {
            width: 1400px;
            /*height: 300px;*/
        }
        .is-center {
            justify-content: center;
            align-items: center;
        }
        .card {
            box-shadow: 0 3rem 3rem -1rem rgba(10,10,10,.2);
            /*max-width: 520px;*/
            padding: 3rem;
        }
        figure {
            /*line-height: 250px;*/
            text-align: center;
            margin-bottom: 20px;
        }

        img {
            vertical-align: middle;
        }
    </style>
@stop
@section('content')
    <div class="columns is-centered">
        <div class="column is-5">
            <figure class=" m-b-10">
                <a href="/">
                    <img src="https://via.placeholder.com/140" class="">
                </a>
            </figure>
            <div class="card is-wide">
                <header class="card-header is-center">
                    <p class="card-header-title"> اعادة كلمة المرور</p>
                </header>

                <div class="card-content is-center">
                    <form action="/auth/password/reset" accept-charset="UTF-8" method="POST">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="field is-horizontal">
                            <div class="field-body {{ form_error_class('email', $errors) }}">
                                <div class="field">
                                    <p class="control">
                                        <input type="text" class="input" id="id-email" name="email" placeholder="البريد الالكتروني" value="{{ old('email') }}">

                                    </p>

                                    {!! form_error_message('email', $errors,'help is-danger') !!}
                                </div>
                            </div>
                        </div>


                        <div class="field is-horizontal">
                            <div class="field-body {{ form_error_class('password', $errors) }}">
                                <div class="field">
                                    <p class="control">
                                        <input type="password" class="input" id="id-password" name="password" placeholder="كلمة المرور" value="{{ old('password') }}">
                                    </p>

                                    {!! form_error_message('password', $errors,'help is-danger') !!}
                                </div>
                            </div>
                        </div>

                        <div class="field is-horizontal">
                            <div class="field-body {{ form_error_class('password_confirmation', $errors) }}">
                                <div class="field">
                                    <p class="control">
                                        <input type="password" class="input" id="id-password_confirmation" name="password_confirmation" placeholder="اعادة كتابة كلمة المرور" value="">
                                    </p>

                                    {!! form_error_message('password_confirmation', $errors,'help is-danger') !!}
                                </div>
                            </div>
                        </div>


                        <hr/>

                        <div class="field is-horizontal">
                            <div class="field-body">
                                <div class="field is-grouped">
                                    <div class="control">
                                        <button type="submit" class="button button-main">
                                            اعادة كلمة المرور
                                        </button>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection