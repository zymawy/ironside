@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card box-solid">
                <div class="bg-primary card-header with-border">
                    <h3 class="card-title text-white">
                        <span><i class="fa fa-edit"></i></span>
                        <span>{{ isset($item)? __('dashboard/forms.edit_the') . $item->title . __('dashboard/forms.entry') : __('dashboard/forms.create_user_text_suburb') }}</span>
                    </h3>
                </div>

                <div class="card-body no-padding">

                    @include('DH::partials.info')

                    <form method="POST" action="{{$selectedNavigation->url . (isset($item)? "/{$item->id}" : '')}}" accept-charset="UTF-8">
                        <input name="_token" type="hidden" value="{{ csrf_token() }}">
                        <input name="_method" type="hidden" value="{{isset($item)? 'PUT':'POST'}}">

                        <input name="zoom_level" type="hidden" value="{{ isset($item)? $item->zoom_level : old('zoom_level') }}" readonly/>
                        <input name="latitude" type="hidden" value="{{ isset($item)? $item->latitude : old('latitude') }}" readonly/>
                        <input name="longitude" type="hidden" value="{{ isset($item)? $item->longitude : old('longitude') }}" readonly/>

                        <fieldset>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group {{ form_error_class('title', $errors) }}">
                                        <label for="title">{{ __('dashboard/forms.title') }}</label>
                                        <input type="text" class="form-control" id="title" name="title" placeholder="Please insert the Title" value="{{ ($errors && $errors->any()? old('title') : (isset($item)? $item->title : '')) }}">
                                        {!! form_error_message('title', $errors) !!}
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group {{ form_error_class('city_id', $errors) }}">
                                        <label for="city">{{ __('dashboard/indexes.city') }}</label>
                                        {!! form_select('city_id', ([0 => __('dashboard/indexes.city_placeholder')] + $cities), ($errors && $errors->any()? old('city_id') : (isset($item)? $item->city_id : '')), ['class' => 'select2 form-control']) !!}
                                        {!! form_error_message('city_id', $errors) !!}
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

    <div class="row">
        <div class="col-lg-12">
            <div class="card box-solid">
                <div class="bg-primary card-header with-border">
                    <h3 class="card-title text-white">
                        <span><i class="fa fa-map-marker"></i></span>
                        <span>{{ __('dashboard/forms.google_map') }}</span>
                    </h3>
                </div>

                <div class="card-body no-padding">
                    <div id="map_canvas" class="google_maps" style="height: 450px;">
                        &nbsp;
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    @parent
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key={{ config('app.google_map_key') }}"></script>
    <script type="text/javascript" charset="utf-8">
        $(function ()
        {
            var latitude = {{ isset($item) && strlen($item->latitude) > 2? $item->latitude : 21.422510 }};
            var longitude = {{ isset($item) && strlen($item->longitude) > 2? $item->longitude : 39.826168 }};
            var zoom_level = {{ isset($item) && strlen($item->zoom_level) >= 1? $item->zoom_level : 6 }};
            initGoogleMapEditClean('map_canvas', latitude, longitude, zoom_level);
        })
    </script>
@endsection