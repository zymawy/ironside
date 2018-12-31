@extends('dashboard.dashboard')

@section('content')
    {{-- interests --}}
    <div class="row">
        <div class="col-md-6">
            @include('DH::analytics.partials.interests_affinity')
        </div>

        <div class="col-md-6">
            @include('DH::analytics.partials.interests_market')
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            @include('DH::analytics.partials.interests_other')
        </div>
    </div>
@endsection