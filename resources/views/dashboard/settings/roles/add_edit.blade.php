@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-primary">
                <div class="card-header bg-primary with-border">
                    <h3 class="card-title text-white">
                        <span><i class="fa fa-edit"></i></span>
                        <span>{{ isset($item)? __('dashboard/forms.edit_the') . $item->name . __('dashboard/forms.entry'): __('dashboard/forms.create_user_text_role') }}</span>
                    </h3>
                </div>

                <div class="card-body no-padding">

                    @include('DH::partials.info')

                    <form method="POST" action="{{$selectedNavigation->url . (isset($item)? "/{$item->id}" : '')}}" accept-charset="UTF-8">
                        <input name="_token" type="hidden" value="{{ csrf_token() }}">
                        <input name="_method" type="hidden" value="{{isset($item)? 'PUT':'POST'}}">

                        <fieldset>
                            <div class="row">
                                <div class="col-md-6">
                                    <section class="form-group {{ form_error_class('name', $errors) }}">
                                        <label for="id-title">
                                            {{ __('dashboard/indexes.name') }}
                                        </label>
                                        <input type="text" class="form-control input-generate-slug" id="id-name" name="name" placeholder="{{ __('dashboard/forms.name_placeholder') }}" value="{{ ($errors && $errors->any()? old('name') : (isset($item)? $item->name : '')) }}">
                                        {!! form_error_message('name', $errors) !!}
                                    </section>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group {{ form_error_class('slug', $errors) }}">
                                        <label for="id-slug">
                                            {{ __('dashboard/forms.slug') }}
                                        </label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="id-slug" name="slug" placeholder="{{ __('dashboard/forms.slug_placeholder') }}" value="{{ ($errors && $errors->any()? old('slug') : (isset($item)? $item->slug : '')) }}">
                                            <span class="input-group-btn">
                                                <span class="btn btn-primary btn-group-right"><i class="fa fa-link"></i></span>
                                            </span>
                                        </div>
                                        {!! form_error_message('slug', $errors) !!}
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group {{ form_error_class('icon', $errors) }}">
                                        <label for="icon">
                                            {{ __('dashboard/forms.icon') }}
                                        </label>
                                        <div class="input-group">
                                            <span class="input-group-btn">
                                                <span class="btn btn-primary btn-group-right">fa fa-</span>
                                            </span>
                                            <input type="text" class="form-control" id="icon" name="icon" placeholder="Please insert the Icon" value="{{ ($errors && $errors->any()? old('icon') : (isset($item)? $item->icon : '')) }}">
                                        </div>
                                        {!! form_error_message('icon', $errors) !!}
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group {{ form_error_class('keyword', $errors) }}">
                                        <label for="keyword">Keyword</label>
                                        <input type="text" class="form-control" id="keyword" name="keyword" placeholder="Please insert the Keyword" value="{{ ($errors && $errors->any()? old('keyword') : (isset($item)? $item->keyword : '')) }}">
                                        {!! form_error_message('keyword', $errors) !!}
                                    </div>
                                </div>
                            </div>
                        </fieldset>

                        @include('DH::partials.form_footer')
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection