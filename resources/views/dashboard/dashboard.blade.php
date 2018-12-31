@extends('layouts.app')

@section('content')
    @include('DH::analytics.partials.analytics_header')

    <div class="row">
        <div class="col-sm-12">
            @include('DH::analytics.partials.visitors_views')
        </div>
    </div>

    {{-- locations + most visited pages --}}
    <div class="row">
        <div class="col-md-5">
            @include('DH::analytics.partials.visited_pages')
        </div>

        <div class="col-md-7">
            @include('DH::analytics.partials.locations')
        </div>
    </div>

    <div class="row">
        <div class="col-sm-6">
            @include('DH::analytics.partials.devices')
        </div>
        <div class="col-sm-6">
            @include('DH::analytics.partials.browsers')
        </div>
    </div>
@endsection
