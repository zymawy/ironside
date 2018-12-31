@extends('layouts.auth')
@section('content')
    <div class="unix-login">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="login-content card">
                        <div class="login-form">
                            <h4>{{ __('auth.login.title.page') }}</h4>
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="form-group">
                                    <label>{{ __('auth.login.email') }}</label>
                                    <input type="email" name="email" value="{{ old('email') }}" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('auth.login.email') }}" required autofocus>
                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>{{ __('auth.login.password') }}</label>
                                    <input type="password" name="password"  class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="{{ __('auth.login.password') }}" required>
                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('auth.login.remmeberMe') }}
                                    </label>
                                    <label class="pull-right">
                                        {{--{{ route('password.request') }}--}}
                                        <a href="#">{{ __('auth.login.forgottenPassword') }}</a>
                                    </label>

                                </div>
                                <button type="submit" class="btn btn-primary btn-flat m-b-30 m-t-30">{{ __('auth.login.signIn') }}</button>
                                <div class="register-link m-t-15 text-center">
                                    <p>{{ __('auth.login.noAccount') }} <a href="{{ route('register') }}"> {{ __('auth.login.signUp') }}</a></p>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection