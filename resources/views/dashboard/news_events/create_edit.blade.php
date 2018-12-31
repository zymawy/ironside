@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-primary">
                <div class="card-header bg-primary with-border">
                    <h3 class="card-title text-white">
                        <span><i class="fa fa-edit"></i></span>
                        <span>{{ isset($item)? __('dashboard/forms.edit_the') . $item->title . __('dashboard/forms.entry'): __('dashboard/forms.create_user_text_news') }}</span>
                    </h3>
                </div>

                <div class="card-body no-padding">

                    @include('DH::partials.info')

                    <form method="POST" action="{{$selectedNavigation->url . (isset($item)? "/{$item->id}" : '')}}" accept-charset="UTF-8" enctype="multipart/form-data">
                        <input name="_token" type="hidden" value="{{ csrf_token() }}">
                        <input name="_method" type="hidden" value="{{isset($item)? 'PUT':'POST'}}">

                        <fieldset>
                            <div class="row">
                                <div class="col col-6">
                                    <div class="form-group {{ form_error_class('title', $errors) }}">
                                        <label for="id-title">{{ __('dashboard/forms.title') }}</label>
                                        <input type="text" class="form-control input-generate-slug" id="id-title" name="title" placeholder="{{ __('dashboard/forms.title_placeholder') }}" value="{{ ($errors && $errors->any()? old('title') : (isset($item)? $item->title : '')) }}">
                                        {!! form_error_message('title', $errors) !!}
                                    </div>
                                </div>

                                <div class="col col-6">
                                    <div class="form-group {{ form_error_class('category_id', $errors) }}">
                                        <label for="category">{{ __('dashboard/forms.category') }}</label>
                                        {!! form_select('category_id', ([0 => __('dashboard/forms.category_placeholder')] + $categories), ($errors && $errors->any()? old('category_id') : (isset($item)? $item->category_id : '')), ['class' => 'select2 form-control']) !!}
                                        {!! form_error_message('category_id', $errors) !!}
                                    </div>
                                </div>
                            </div>

                            <div class="form-group {{ form_error_class('summary', $errors) }}">
                                <label for="summary">{{ __('dashboard/forms.category_summary') }}</label>
                                <input type="text" class="form-control" id="summary" name="summary" placeholder="{{ __('dashboard/forms.category_summary_placeholder') }}" value="{{ ($errors && $errors->any()? old('summary') : (isset($item)? $item->summary : '')) }}">
                                {!! form_error_message('summary', $errors) !!}
                            </div>

                            <div class="row">
                                <div class="col col-md-6">
                                    <div class="form-group {{ form_error_class('active_from', $errors) }}">
                                        <label for="active_from">{{ __('dashboard/forms.active_from') }}</label>
                                        <div class="input-group">
                                            <input type="text" autocomplete="off" class="form-control" id="active_from" data-date-format="YYYY-MM-DD HH:mm:ss" name="active_from" placeholder="{{ __('dashboard/forms.active_from_placeholder') }}" value="{{ ($errors && $errors->any()? old('active_from') : (isset($item)? $item->active_from : '')) }}">
                                            {{--<span class="input-group-addon"><i class="fa fa-calendar"></i></span>--}}
                                        </div>
                                        {!! form_error_message('active_from', $errors) !!}
                                    </div>
                                </div>

                                <div class="col col-md-6">
                                    <div class="form-group {{ form_error_class('active_to', $errors) }}">
                                        <label for="active_to">{{ __('dashboard/forms.active_to') }}</label>
                                        <div class="input-group">
                                            <input type="text"
                                                   class="form-control"
                                                   id="active_to"
                                                   data-date-format="YYYY-MM-DD HH:mm:ss"
                                                   name="active_to"
                                                   autocomplete="off"
                                                   placeholder="{{ __('dashboard/forms.active_to_placeholder') }}" value="{{ ($errors && $errors->any()? old('active_to') : (isset($item)? $item->active_to : '')) }}">
                                            {{--<span class="input-group-addon"><i class="fa fa-calendar"></i></span>--}}
                                        </div>
                                        {!! form_error_message('active_to', $errors) !!}
                                    </div>
                                </div>
                            </div>

                            <div class="form-group {{ form_error_class('content', $errors) }}">
                                <label for="article-content">{{ __('dashboard/forms.content') }}</label>
                                <textarea class="form-control summernote" id="article-content" name="content" rows="18">{{ ($errors && $errors->any()? old('content') : (isset($item)? $item->content : '')) }}</textarea>
                                {!! form_error_message('content', $errors) !!}
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
    {!! isRTL() ? '<script src="/lang/summernote-ar-AR.js"></script>':''  !!}
    <script type="text/javascript" charset="utf-8">
        $(function ()
        {
            setDateTimePickerRange('#active_from', '#active_to');

            initSummerNote('.summernote',400,"{!!  isRTL() ? "ar-AR":"en-US"  !!}");
        })
    </script>
@endsection