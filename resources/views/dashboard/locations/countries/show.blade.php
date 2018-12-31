@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card box-primary box-solid">
                <div class="card-header bg-primary with-border">
                    <h3 class="card-title text-white">
                        <span><i class="fa fa-eye"></i></span>
                        <span>{{ __('dashboard/indexes.countries') }} - {{ $item->title }}</span>
                    </h3>
                </div>

                <div class="card-body no-padding">

                    @include('DH::partials.info')

                    <form>
                        <fieldset>
                            <div class="row">
                                <section class="col col-6">
                                    <section class="form-group">
                                        <label>{{ __('dashboard/forms.title') }}</label>
                                        <input type="text" class="form-control" value="{{ $item->title }}" readonly>
                                    </section>
                                </section>
                            </div>
                        </fieldset>

                        @include('DH::partials.form_footer', ['submit' => false])
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card box-primary box-solid">
                <div class="card-header bg-primary with-border">
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
            var latitude = {{ isset($item) && strlen($item->latitude) > 2? $item->latitude : -30 }};
            var longitude = {{ isset($item) && strlen($item->longitude) > 2? $item->longitude : 24 }};
            var zoom_level = {{ isset($item) && strlen($item->zoom_level) >= 1? $item->zoom_level : 6 }};
            initGoogleMapView('map_canvas', latitude, longitude, zoom_level);
        })
    </script>
@endsection