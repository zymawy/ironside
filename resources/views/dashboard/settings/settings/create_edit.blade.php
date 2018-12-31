@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-primary">
                <div class="card-header bg-primary with-border">
                    <h3 class="card-title text-white">
                        <span><i class="fa fa-edit"></i></span>
                        <span>{{ isset($item)? __('dashboard/forms.edit_the') . $item->title . __('dashboard/forms.entry'): __('dashboard/forms.create_user_text_settings') }}</span>
                    </h3>
                </div>

                <div class="card-body no-padding">

                    @include('DH::partials.info')

                    <form method="POST" action="{{$selectedNavigation->url . (isset($item)? "/{$item->id}" : '')}}" accept-charset="UTF-8">
                        <input name="_token" type="hidden" value="{{ csrf_token() }}">
                        <input name="_method" type="hidden" value="{{isset($item)? 'PUT':'POST'}}">

                        <fieldset>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group {{ form_error_class('name', $errors) }}">
                                        <label for="name">{{ __('dashboard/indexes.name') }}</label>
                                        <input type="text" class="form-control" id="name" name="name" placeholder="{{ __('dashboard/forms.action_name_placeholder') }}" value="{{ ($errors && $errors->any()? old('name') : (isset($item)? $item->name : '')) }}">
                                        {!! form_error_message('name', $errors) !!}
                                    </div>
                                </div>
                            </div>

                            <div class="form-group {{ form_error_class('description', $errors) }}">
                                <label for="id-description">{{ __('dashboard/forms.description') }}</label>
                                <textarea name="description" id="" cols="30" rows="10" class="form-control">{{ ($errors && $errors->any()? old('description') : (isset($item)? $item->description : '')) }}</textarea>
                                {!! form_error_message('description', $errors) !!}
                            </div>
                        </fieldset>

                        @include('DH::partials.form_footer')
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection