@extends('dashboard.dashboard')

@section('content')
    {{-- devices + browsers --}}
    <div class="row">
        <div class="col-md-6">
            @include('DH::analytics.partials.devices_category')
        </div>

        <div class="col-md-6">
            @include('DH::analytics.partials.browsers')
        </div>
    </div>

    <div class="row">
        <div class="col-sm-6">
            @include('DH::analytics.partials.devices')
        </div>
    </div>
@endsection