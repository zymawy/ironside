@extends('dashboard.dashboard')

@section('content')
    {{-- demographics --}}
    <div class="row">
        <div class="col-md-6">
            @include('DH::analytics.partials.gender')
        </div>

        <div class="col-md-6">
            @include('DH::analytics.partials.age')
        </div>
    </div>
@endsection