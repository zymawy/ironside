@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header bg-primary with-border">
                    <h3 class="card-title">
                        <span><i class="fa fa-edit"></i></span>
                        <span>{{ isset($item)? trans('DH::forms.edit_the') . $item->fullname . '': trans('ironside::dashboard.forms.create_user_text_title') }}</span>
                    </h3>
                </div>

                <div class="card-body no-padding">

                    @include('DH::partials.info')

                    <form id="form-edit" method="POST" action="{{$selectedNavigation->url . (isset($item)? "/{$item->id}" : '')}}" accept-charset="UTF-8" enctype="multipart/form-data">
                        <input name="_token" type="hidden" value="{{ csrf_token() }}">
                        <input name="_method" type="hidden" value="{{isset($item)? 'PUT':'POST'}}">

                        <fieldset>
                            <div class="row">
                                <div class="col col-6">
                                    <div class="form-group {{ form_error_class('firstname', $errors) }}">
                                        <label for="firstname">
                                            {{ trans('dashboard/forms.firstname') }}
                                        </label>
                                        <div class="input-group">
                                        <input type="text" name="firstname" class="form-control" placeholder="{{ trans('dashboard/forms.firstname_placeholder') }}" value="{{ ($errors->any()? old('firstname') : $item->firstname) }}">
                                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                        </div>
                                        {!! form_error_message('firstname', $errors) !!}
                                    </div>
                                </div>

                                <div class="col col-6">
                                    <div class="form-group {{ form_error_class('lastname', $errors) }}">
                                        <label for="email">
                                            {{ trans('dashboard/forms.lastname') }}
                                        </label>
                                        <div class="input-group">
                                            <input type="text" name="lastname" class="form-control" placeholder="{{ trans('dashboard/forms.lastname_placeholder') }}" value="{{ ($errors->any()? old('lastname') : $item->lastname) }}">
                                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                        </div>
                                        {!! form_error_message('lastname', $errors) !!}
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group {{ form_error_class('cellphone', $errors) }}">
                                        <label for="cellphone">
                                            {{ trans('dashboard/forms.cellphone') }}
                                        </label>
                                        <input type="text" class="form-control" id="cellphone" name="cellphone" placeholder="{{ trans('dashboard/forms.cellphone_placeholder') }}" value="{{ ($errors && $errors->any()? old('cellphone') : $item->cellphone ) }}">
                                        {!! form_error_message('cellphone', $errors) !!}
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group {{ form_error_class('telephone', $errors) }}">
                                        <label for="telephone">
                                            {{ trans('dashboard/forms.telephone') }}
                                        </label>
                                        <input type="text" class="form-control" id="telephone" name="telephone" placeholder="{{ trans('dashboard/forms.telephone_placeholder') }}" value="{{ ($errors && $errors->any()? old('telephone') : $item->telephone ) }}">
                                        {!! form_error_message('telephone', $errors) !!}
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col col-6">
                                    <section class="form-group {{ form_error_class('email', $errors) }}">
                                        <label for="email">
                                            {{ trans('dashboard/forms.email_readonly') }}
                                        </label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="email" name="email" placeholder="{{ trans('dashboard/forms.email_placeholder') }}" value="{{ ($errors->any()? old('email') : $item->email) }}" readonly>
                                            <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                        </div>
                                        {!! form_error_message('email', $errors) !!}
                                    </section>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group {{ form_error_class('born_at', $errors) }}">
                                        <label for="password">
                                            {{ trans('dashboard/forms.born_at') }}
                                        </label>
                                        <div class="input-group">
                                            <input id="born_at" type="text" class="form-control" name="born_at" placeholder="{{ trans('dashboard/forms.born_at_placeholder') }}" value="{{ ($errors->any()? old('born_at') : $item->born_at) }}">
                                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                        </div>
                                        {!! form_error_message('born_at', $errors) !!}
                                    </div>
                                </div>
                            </div>

                            <div class="form-group {{ form_error_class('roles', $errors) }}">
                            	<label for="roles">
                                    {{ trans('dashboard/forms.roles') }}
                                </label>
                            	{!! form_select('roles[]', $roles, ($errors && $errors->any()? old('roles') : (isset($item)? $item->roles->pluck('id')->all() : '')), ['class' => 'select2 form-control', 'multiple']) !!}
                            	{!! form_error_message('roles', $errors) !!}
                            </div>
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
