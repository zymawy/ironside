@extends('layouts.auth')
@section('css')
    @parent

@stop
@section('content')
    <div class="unix-login">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-lg-4">
                    <div class="login-content card">

                        <div class="col-lg-11 offset-lg-1 col-md-10 offset-md-1 col-sm-12">
                            <h2 class="page-header text-center mb-4">{{ __('auth.register.title.page') }}</h2>

                            <form id="form-member-register mt-3" method="POST" action="/auth/register" accept-charset="UTF-8">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                                <input type="hidden" name="token" value="{{ $userInvite ? $userInvite->token : '' }}">

                                <div class="row">
                                    <div class="col-md-6 col-sm-6">
                                        <div class="form-group {{ form_error_class('firstname', $errors) }}">
                                            <label>
                                                {{ __('dashboard/forms.firstname') }}
                                            </label>
                                            <input type="text" class="form-control" name="firstname" placeholder="{{__('dashboard/forms.firstname_placeholder')}}" value="{{ old('firstname') }}">
                                            {!! form_error_message('firstname', $errors) !!}
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <div class="form-group {{ form_error_class('lastname', $errors) }}">
                                            <label>{{ __('dashboard/forms.lastname') }}</label>
                                            <input type="text" class="form-control" name="lastname" placeholder="{{ __('dashboard/forms.lastname_placeholder') }}" value="{{ old('lastname') }}">
                                            {!! form_error_message('lastname', $errors) !!}
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group {{ form_error_class('email', $errors) }}">
                                    <label>
                                        {{ __('dashboard/forms.email') }}
                                    </label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="id-email" name="email" placeholder="{{ __('dashboard/forms.email_placeholder') }}" value="{{ $userInvite ? $userInvite->email : old('email') }}">
                                        <div class="input-group-append"><span class="input-group-text"><i class="fa fa-envelope"></i></span></div>
                                    </div>
                                    {!! form_error_message('email', $errors) !!}
                                </div>

                                <div class="form-group {{ form_error_class('password', $errors) }}">
                                    <label>
                                        {{ __('auth.register.password') }}
                                    </label>
                                    <div class="input-group">
                                        <input type="password" class="form-control" id="id-password" name="password" placeholder="{{ __('passwords.password') }}" value="{{ old('password') }}">
                                        <div class="input-group-append"><span class="input-group-text"><i class="fa fa-lock"></i></span></div>
                                    </div>
                                    {!! form_error_message('password', $errors) !!}
                                </div>

                                <div class="form-group {{ form_error_class('password_confirmation', $errors) }}">
                                    <label>
                                        {{ __('auth.register.confirmPassword') }}
                                    </label>
                                    <div class="input-group">
                                        <input type="password" class="form-control" id="id-password_confirmation" name="password_confirmation"
                                               placeholder="{{ __('dashboard/forms.confirm_password') }}" value="{{ old('password_confirmation') }}">
                                        <div class="input-group-append"><span class="input-group-text"><i class="fa fa-lock"></i></span></div>
                                    </div>
                                    {!! form_error_message('password_confirmation', $errors) !!}
                                </div>

                                <div class="row">
                                    <div class="col-6">
                                        <a class="btn btn-link btn-sm padding-left-0" href="{{ route('login') }}">
                                            {{ __('dashboard/forms.have_account') }}
                                        </a>
                                    </div>

                                    <div class="col-6 text-right">
                                        <button type="submit" class="btn btn-primary btn-submit">
                                            {{ __('auth.register.title.page') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
