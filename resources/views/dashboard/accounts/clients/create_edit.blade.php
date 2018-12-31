@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card box-solid">
                <div class="card-header bg-primary">
                    <h3 class="card-title text-white">
                        <span><i class="fa fa-edit"></i></span>
                        <span>{{ isset($item)? trans('dashboard/forms.edit_the') . $item->fullname . trans('dashboard/forms.entry'): trans('dashboard/forms.create_user_text_user') }}</span>
                    </h3>
                </div>

                <div class="card-body no-padding">

                    @include('dashboard.partials.info')

                    @if(isset($item))
                        <div class="col-lg-12">
                            <div class=" well-sm well-toolbar">
                                <form action="/dashboard/accounts/clients/{{ $item->id }}/notify/forgot-password" accept-charset="UTF-8" method="POST">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                                    <input type="hidden" name="email" value="{{ ($errors->any()? old('email') : $item->email) }}">

                                    <div class="row">
                                        <div class="col-md-12">
                                            <button type="submit" class="btn btn-small btn-primary btn-flat btn-submit pull-right">
                                                <i class="fa fa-refresh"></i>
                                                {{ __('dashboard/general.send_forgot_text') }}
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    @endif

                    <form id="form-edit" method="POST" action="{{$selectedNavigation->url . (isset($item)? "/{$item->id}" : '')}}" accept-charset="UTF-8" enctype="multipart/form-data">
                        <input name="_token" type="hidden" value="{{ csrf_token() }}">
                        <input name="_method" type="hidden" value="{{isset($item)? 'PUT':'POST'}}">

                        <fieldset>
                            <div class="row">
                                <div class="col col-6">
                                    <div class="form-group {{ form_error_class('firstname', $errors) }}">
                                        <label for="firstname">{{ __('dashboard/forms.firstname') }}</label>
                                        <div class="input-group">
                                            {{--<span class="input-group-addon"><i class="fa fa-user"></i></span>--}}
                                            <input type="text" class="form-control {{ form_error_class('firstname', $errors) }}" id="firstname" name="firstname"
                                                   placeholder="{{ __('dashboard/forms.firstname_placeholder') }}" value="{{ ($errors && $errors->any()? old('firstname') : (isset($item)? $item->firstname : '')) }}">
                                        </div>
                                        {!! form_error_message('firstname', $errors,'invalid-feedback') !!}
                                    </div>
                                </div>

                                <div class="col col-6">
                                    <div class="form-group {{ form_error_class('lastname', $errors) }}">
                                        <label for="lastname">{{ __('dashboard/forms.lastname') }}</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control {{ form_error_class('lastname', $errors) }}" id="lastname" name="lastname"
                                                   placeholder="{{ __('dashboard/forms.lastname_placeholder') }}" value="{{ ($errors && $errors->any()? old('lastname') : (isset($item)? $item->lastname : '')) }}">
                                            {{--<span class="input-group-addon"><i class="fa fa-user"></i></span>--}}
                                        </div>
                                        {!! form_error_message('lastname', $errors,'invalid-feedback') !!}
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group {{ form_error_class('cellphone', $errors) }}">
                                        <label for="cellphone">{{ __('dashboard/forms.cellphone') }}</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control {{ form_error_class('cellphone', $errors) }}" id="cellphone" name="cellphone"
                                                   placeholder="{{ __('dashboard/forms.cellphone_placeholder') }}" value="{{ ($errors && $errors->any()? old('cellphone') : (isset($item)? $item->cellphone : '')) }}">
                                            {{--<span class="input-group-addon"><i class="fa fa-mobile-phone"></i></span>--}}
                                        </div>
                                        {!! form_error_message('cellphone', $errors,'invalid-feedback') !!}
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group {{ form_error_class('telephone', $errors) }}">
                                        <label for="telephone">{{ __('dashboard/forms.telephone') }}</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control {{ form_error_class('telephone', $errors) }}" id="telephone"
                                                   name="telephone"
                                                   placeholder="{{ __('dashboard/forms.telephone_placeholder') }}" value="{{ ($errors && $errors->any()? old('telephone') : (isset($item)? $item->telephone : '')) }}">
                                            {{--<span class="input-group-addon"><i class="fa fa-phone"></i></span>--}}
                                        </div>
                                        {!! form_error_message('telephone', $errors,'invalid-feedback') !!}
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col col-6">
                                    <div class="form-group {{ form_error_class('email', $errors) }}">
                                        <label for="email">{{ __('dashboard/forms.email') }}</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control {{ form_error_class('email', $errors) }}" id="email" name="email"
                                                   placeholder="{{ __('dashboard/forms.email_placeholder') }}" value="{{ ($errors && $errors->any()? old('email') : (isset($item)? $item->email : '')) }}">
                                            {{--<span class="input-group-addon"><i class="fa fa-envelope"></i></span>--}}
                                        </div>
                                        {!! form_error_message('email', $errors,'invalid-feedback') !!}
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group {{ form_error_class('born_at', $errors) }}">
                                        <label for="born_at">{{ __('dashboard/forms.born_at') }}</label>
                                        <div class="input-group">
                                            <input id="born_at" type="text" class="form-control {{ form_error_class('born_at', $errors) }}"
                                                   name="born_at"
                                                   autocomplete="off"
                                                   placeholder="{{ __('dashboard/forms.born_at_placeholder') }}"
                                                   value="{{ ($errors && $errors->any()? old('born_at') : (isset($item)? $item->born_at : '')) }}"
                                                   >
                                            {{--<span class="input-group-addon"><i class="fa fa-calendar"></i></span>--}}
                                        </div>
                                        {!! form_error_message('born_at', $errors, 'invalid-feedback') !!}
                                    </div>
                                </div>
                            </div>

                            <div class="form-group {{ form_error_class('roles', $errors) }}">
                                <label for="roles">{{ __('dashboard/forms.roles') }}</label>
                                {!! form_select('roles[]', $roles, ($errors && $errors->any()? old('roles') : (isset($item)? $item->roles->pluck('id')->all() : '')), ['class' => 'select2 form-control', 'multiple']) !!}
                                {!! form_error_message('roles', $errors,'invalid-feedback') !!}
                            </div>
                        </fieldset>

                        <div class="col-md-2">
                            <label for="active_user">
                                {{ trans('dashboard/forms.active_user') }}
                            </label>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" id="active_user" name="active_user" {{ ($errors && $errors->any()? (old('active_user')? 'checked="checked"':'') :  (isset($item) && $item->hide_name? 'checked="checked"':'')) }}>
                                    <i></i> {{ trans('dashboard/forms.active_user') }}
                                </label>
                                {!! form_error_message('active_user', $errors) !!}
                            </div>
                        </div>

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
        $(function () {
            $("#born_at").datetimepicker({
                viewMode: 'years',
                format: 'YYYY-MM-DD'
            });
        })
    </script>
@endsection
