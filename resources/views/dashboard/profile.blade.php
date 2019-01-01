@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header bg-primary">
                    <h3 class="card-title text-white">
                        <img src="{{ profile_image() }}" class="img-circle" alt="User Image" style="width: 25px;">
                        <span>
                            {{ __('dashboard/general.update_profile') }}
                        </span>
                    </h3>
                </div>

                <div class="card-body no-padding">

                    @include('DH::partials.info')

                    <form method="POST" action="{{ $selectedNavigation->url . "/" . user()->id }}" accept-charset="UTF-8" enctype="multipart/form-data">
                        <input name="_token" type="hidden" value="{{ csrf_token() }}">
                        <input name="_method" type="hidden" value="PUT">

                        <fieldset>
                            <div class="row">
                                <div class="col col-6">
                                    <div class="form-group {{ form_error_class('firstname', $errors) }}">
                                        <label for="firstname">
                                            {{ __('dashboard/forms.firstname') }}
                                        </label>
                                        <div class="input-group  input-group-rounded">
                                            <input type="text" name="firstname" class="form-control"
                                                   placeholder="{{ __('dashboard/forms.firstname_placeholder') }}" value="{{ ($errors->any()? old('firstname') : user()->firstname) }}">
                                            <span class="input-group-btn">
                                                <i class="fa fa-user"></i>
                                            </span>
                                        </div>
                                        {!! form_error_message('firstname', $errors) !!}
                                    </div>
                                </div>

                                <div class="col col-6">
                                    <div class="form-group {{ form_error_class('lastname', $errors) }}">
                                        <label for="email">
                                            {{ __('dashboard/forms.lastname') }}
                                        </label>
                                        <div class="input-group">
                                            <input type="text" name="lastname" class="form-control"
                                                   placeholder="{{ __('dashboard/forms.lastname_placeholder') }}" value="{{ ($errors->any()? old('lastname') : user()->lastname) }}">
                                            {{--<span class="input-group-addon"><i class="fa fa-user"></i></span>--}}
                                        </div>
                                        {!! form_error_message('lastname', $errors) !!}
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group {{ form_error_class('cellphone', $errors) }}">
                                        <label for="cellphone">
                                            {{ __('dashboard/forms.cellphone') }}
                                        </label>
                                        <input type="text" class="form-control" id="cellphone" name="cellphone"
                                               placeholder="{{ __('dashboard/forms.cellphone_placeholder') }}" value="{{ ($errors && $errors->any()? old('cellphone') : user()->cellphone ) }}">
                                        {!! form_error_message('cellphone', $errors) !!}
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group {{ form_error_class('telephone', $errors) }}">
                                        <label for="telephone">
                                            {{ __('dashboard/forms.telephone') }}
                                        </label>
                                        <input type="text" class="form-control" id="telephone" name="telephone"
                                               placeholder="{{ __('dashboard/forms.telephone_placeholder') }}" value="{{ ($errors && $errors->any()? old('telephone') : user()->telephone ) }}">
                                        {!! form_error_message('telephone', $errors) !!}
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col col-6">
                                    <section class="form-group {{ form_error_class('email', $errors) }}">
                                        <label for="email">
                                            {{ __('dashboard/forms.email_readonly') }}
                                        </label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="email" name="email" placeholder="{{ __('dashboard/forms.email_placeholder') }}" value="{{ ($errors->any()? old('email') : user()->email) }}" readonly>
                                            {{--<span class="input-group-addon"><i class="fa fa-envelope"></i></span>--}}
                                        </div>
                                        {!! form_error_message('email', $errors) !!}
                                    </section>
                                </div>

                                <div class="col col-6">
                                    <div class="form-group {{ form_error_class('password', $errors) }}">
                                        <label for="password">
                                           {!! __('dashboard/forms.password_update') !!}
                                        </label>
                                        <div class="input-group">
                                            <input type="password" class="form-control" id="password" name="password" placeholder="Password" value="" >
                                            {{--<span class="input-group-addon"><i class="fa fa-lock"></i></span>--}}
                                        </div>
                                        {!! form_error_message('password', $errors) !!}
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group {{ form_error_class('born_at', $errors) }}">
                                        <label for="password">
                                            {{ __('dashboard/forms.born_at') }}
                                        </label>
                                        <div class="input-group">
                                            <input id="born_at" type="text" class="form-control" name="born_at"
                                                   placeholder="{{ __('dashboard/forms.born_at_placeholder') }}"
                                                   value="{{ ($errors->any()? old('born_at') : user()->born_at) }}">
                                            {{--<span class="input-group-addon"><i class="fa fa-calendar"></i></span>--}}
                                        </div>
                                        {!! form_error_message('born_at', $errors) !!}
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group {{ form_error_class('password_confirmation', $errors) }}">
                                        <label>
                                            {{ __('dashboard/forms.confirm_password') }}
                                        </label>
                                        <div class="input-group">
                                            <input type="password" class="form-control"
                                                   id="id-password_confirmation"
                                                   name="password_confirmation"
                                                   placeholder="{{ __('dashboard/forms.password_confirm') }}" value="{{ ($errors->any()? old('password_confirmation') : user()->password_confirmation) }}">
                                            {{--<span class="input-group-addon"><i class="fa fa-lock"></i></span>--}}
                                        </div>
                                        {!! form_error_message('password_confirmation', $errors) !!}
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>
                                            {{ __('dashboard/forms.gender') }}
                                        </label>
                                        <div class="inline-group">
                                            <label class="radio" style="margin-top: 0px;">
                                                <input type="radio" name="gender" value="male" {{ ($errors->any() && old('gender') == 'male'? 'checked="checked"' : user()->gender == 'male'? 'checked="checked"':'') }}>
                                                <i></i>{{ __('dashboard/forms.male') }}
                                            </label>
                                            <label class="radio" style="margin-top: 0px;">
                                                <input type="radio"
                                                       name="gender"
                                                       value="female"
                                                        {{ ($errors->any() && old('gender') == 'female'? 'checked="checked"' : user()->gender == 'female'? 'checked="checked"':'') }}
                                                >
                                                <i></i>{{ __('dashboard/forms.female')}}
                                            </label>
                                        </div>
                                        {!! form_error_message('gender', $errors) !!}
                                    </div>
                                </div>



                            </div>

                            <section class="form-group {{ form_error_class('photo', $errors) }}">
                                <label>
                                    {{ __('dashboard/forms.profile_image') }}
                                </label>
                                <div class="input-group input-group-sm">
                                    <input id="photo-label" type="text" class="form-control" readonly placeholder="{{ __('dashboard/forms.browse_image') }}">
                                    <span class="input-group-btn">
                                  <button type="button" class="btn btn-default browse" onclick="document.getElementById('photo').click();">
                                      {{ __('dashboard/forms.browse') }}
                                  </button>
                                </span>
                                    <input id="photo" style="display: none" accept="{{ get_file_extensions('image') }}" type="file" name="photo" onchange="document.getElementById('photo-label').value = this.value">
                                </div>
                                {!! form_error_message('photo', $errors) !!}
                            </section>

                            @if(user()->image)
                                <section>
                                    <img src="{{ profile_image() }}" style="max-height: 300px;">
                                    <input type="hidden" name="image" value="{{ user()->image }}">
                                </section>
                            @endif
                        </fieldset>

                        @include('DH::partials.form_footer')
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    @parent
    <script type="text/javascript" charset="utf-8">
        $(function ()
        {
            $("#born_at").datetimepicker({
                viewMode: 'years',
                format: 'YYYY-MM-DD'
            });
        })
    </script>
@endsection