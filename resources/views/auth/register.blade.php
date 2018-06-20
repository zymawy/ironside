@extends('layouts.auth.app')

@section('title-page')
    @lang('auth.register.title.page')
@stop

@section('content')
<div class="unix-login">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-lg-4">
                        <div class="login-content card">
                            <div class="login-form">
                                <h4>{{ __('auth.register.title.page') }}</h4>
                                <form method="POST" action="{{ route('register') }}">
                                    @csrf
                                    <div class="form-group">
                                        <label>{{ __('auth.register.username') }}</label>
                                        <input type="text" value="{{ old('name') }}" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" placeholder="{{ __('auth.register.username') }}" required autofocus>
                                        @if ($errors->has('name'))
                                            <span class="invalid-feedback">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label>{{ __('auth.register.email') }}</label>
                                        <input type="email" value="{{ old('email') }}" name="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('auth.register.email') }}" required>
                                        @if ($errors->has('email'))
                                            <span class="invalid-feedback">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label>{{ __('auth.register.password') }}</label>
                                        <input type="password" name="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="{{ __('auth.register.password') }}">
                                        @if ($errors->has('password'))
                                            <span class="invalid-feedback">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label>{{ __('auth.register.confirmPassword') }}</label>
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="{{ __('auth.register.confirmPassword') }}" required>
                                    </div>
                                    <div class="checkbox">
                                        <label>
        										<input type="checkbox" name="agreed" {{ old('agreed') ? 'checked' : '' }}>{{ __('auth.register.agreePolicy') }}
        									</label>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-flat m-b-30 m-t-30">{{ __('auth.register.title.page') }}</button>
                                    <div class="register-link m-t-15 text-center">
                                        <p> <a href="{{ route('login') }}">{{ __('auth.register.alreadyHaveAccount') }}</a></p>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection


