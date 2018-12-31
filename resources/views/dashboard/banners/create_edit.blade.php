@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header bg-primary with-border">
                    <h3 class="card-title text-white">
                        <span><i class="fa fa-edit"></i></span>
                        <span>{{ isset($item)? trans('dashboard/forms.edit_the') . $item->title . trans('dashboard/forms.entry'): trans('dashboard/forms.create_banner_text_title') }}</span>
                    </h3>
                </div>

                <div class="card-body no-padding">

                    @include('DH::partials.info')

                    <form method="POST" action="{{$selectedNavigation->url . (isset($item)? "/{$item->id}" : '')}}" accept-charset="UTF-8" enctype="multipart/form-data">
                        <input name="_token" type="hidden" value="{{ csrf_token() }}">
                        <input name="_method" type="hidden" value="{{isset($item)? 'PUT':'POST'}}">

                        <fieldset>
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group {{ form_error_class('name', $errors) }}">
                                        <label for="name">
                                            {{ trans('dashboard/forms.name') }}
                                        </label>
                                        <input type="text" class="form-control" id="name" name="name" placeholder="{{ trans('dashboard/forms.name_placeholder') }}" value="{{ ($errors && $errors->any()? old('name') : (isset($item)? $item->name : '')) }}">
                                        {!! form_error_message('name', $errors) !!}
                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <label for="name">
                                        {{ trans('dashboard/forms.hide_name') }}
                                    </label>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" id="hide_name" name="hide_name" {{ ($errors && $errors->any()? (old('hide_name')? 'checked="checked"':'') :  (isset($item) && $item->hide_name? 'checked="checked"':'')) }}>
                                            <i></i> {{ trans('dashboard/forms.hide_name') }}
                                        </label>
                                        {!! form_error_message('hide_name', $errors) !!}
                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <label for="name">
                                        {{ trans('dashboard/forms.hide_all_pages') }}
                                    </label>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" id="is_website" name="is_website" {{ ($errors && $errors->any()? (old('is_website')? 'checked="checked"':'') :  (!isset($item) ? 'checked="checked"': $item->is_website? 'checked="checked"':'')) }}>
                                            <i></i> {{ trans('dashboard/forms.is_visible') }}
                                        </label>
                                        {!! form_error_message('is_website', $errors) !!}
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group {{ form_error_class('summary', $errors) }}">
                                        <label for="summary">
                                            {{ trans('dashboard/forms.summary') }}
                                        </label>
                                        <textarea name="summary" id="summary" cols="30" rows="2" class="form-control">{{ ($errors && $errors->any()? old('summary') : (isset($item)? $item->summary : '')) }}</textarea>
                                        {!! form_error_message('summary', $errors) !!}
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col col-6">
                                    <section class="form-group {{ form_error_class('action_name', $errors) }}">
                                        <label for="id-action_name">
                                            {{ trans('dashboard/forms.action_name') }}
                                        </label>
                                        <input type="text" class="form-control" id="id-action_name" name="action_name"
                                               placeholder="{{ trans('dashboard/forms.action_name_placeholder') }}"
                                               value="{{ ($errors && $errors->any()? old('action_name') : (isset($item)? $item->action_name : '')) }}">
                                        {!! form_error_message('action_name', $errors) !!}
                                    </section>
                                </div>

                                <div class="col col-6">
                                    <section class="form-group {{ form_error_class('action_url', $errors) }}">
                                        <label for="id-action_url">
                                            {{ trans('dashboard/forms.action_url') }}
                                        </label>
                                        <input type="text" class="form-control" id="id-action_url" name="action_url"
                                               placeholder="{{ trans('dashboard/forms.action_url_placeholder') }}"
                                               autocomplete="off"
                                               value="{{ ($errors && $errors->any()? old('action_url') : (isset($item)? $item->action_url : '')) }}">
                                        {!! form_error_message('action_url', $errors) !!}
                                    </section>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col col-6">
                                    <section class="form-group {{ form_error_class('active_from', $errors) }}">
                                        <label for="active_from">
                                            {{ trans('dashboard/forms.active_from') }}
                                        </label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="active_from" name="active_from" data-date-format="YYYY-MM-DD HH:mm:ss"
                                                   placeholder="{{ trans('dashboard/forms.active_from_placeholder') }}"
                                                   autocomplete="off"
                                                   value="{{ ($errors && $errors->any()? old('active_from') : (isset($item)? $item->active_from : '')) }}">
                                            {{--<span class="input-group-addon"><i class="fa fa-calendar"></i></span>--}}
                                        </div>
                                        {!! form_error_message('active_from', $errors) !!}
                                    </section>
                                </div>

                                <div class="col col-6">
                                    <section class="form-group {{ form_error_class('active_to', $errors) }}">
                                        <label for="active_to">
                                            {{ trans('dashboard/forms.active_to') }}
                                        </label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="active_to" data-date-format="YYYY-MM-DD HH:mm:ss"
                                                   name="active_to" placeholder="{{ trans('dashboard/forms.active_to_placeholder') }}"
                                                   autocomplete="off"
                                                   value="{{ ($errors && $errors->any()? old('active_to') : (isset($item)? $item->active_to : '')) }}">
                                            {{--<span class="input-group-addon"><i class="fa fa-calendar"></i></span>--}}
                                        </div>
                                        {!! form_error_message('active_to', $errors) !!}
                                    </section>
                                </div>
                            </div>

                            <section class="form-group {{ form_error_class('photo', $errors) }}">
                                <label>
                                    {{ trans('dashboard/forms.browse_for_an_image') }}
                                </label>
                                <div class="input-group input-group-sm">
                                    <input id="photo-label" type="text" class="form-control" readonly placeholder="{{ trans('dashboard/forms.browse_for_an_image_placeholder') }}">
                                    <span class="input-group-btn">
                                  <button type="button" class="browse btn bttn-default" onclick="document.getElementById('photo').click();">
                                      {{ trans('dashboard/forms.browse') }}
                                  </button>
                                </span>
                                    <input id="photo" style="display: none" accept="{{ get_file_extensions('image') }}" type="file" name="photo" onchange="document.getElementById('photo-label').value = this.value">
                                </div>
                                {!! form_error_message('photo', $errors) !!}
                            </section>

                            @if(isset($item) && $item && $item->image)
                                <section>
                                    <img src="{{ uploaded_images_url($item->image) }}" style="max-width: 100%; max-height: 300px;">
                                    <input type="hidden" name="image" value="{{ $item->image }}">
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
        $(function () {
            setDateTimePickerRange('#active_from', '#active_to');
        })
    </script>
@endsection