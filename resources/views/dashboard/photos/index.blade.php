@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-primary">
                <div class="card-header bg-primary with-border">
                    <h3 class="card-title text-white">
                        <span><i class="fa fa-table"></i></span>
                        <span>{{ __('dashboard/indexes.list_all_photos') }}</span>
                    </h3>
                </div>

                <div class="card-body">

                    @include('DH::partials.info')

                    <table id="tbl-list" data-server="false" class="dt-table table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>{{ __('dashboard/indexes.name') }}</th>
                            <th>{{__('dashboard/forms.category')}}</th>
                            <th>{{ __("dashboard/indexes.image") }}</th>
                            <th>{{ __('dashboard/indexes.created') }}</th>
                            <th>{{ __('dashboard/forms.action') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($items as $item)
                            <tr>
                                <td>{{ $item->name }} {{ $item->is_cover? '('. __('dashboard/indexes.cover') .')':'' }}</td>
                                <td>{{ ($item->photoable)? $item->photoable->name:'' }}</td>
                                <td>
                                    <a target="_blank" href="{{ $item->url }}">
                                        <img style="height: 50px;" src="{{ $item->urlForName($item->thumb) }}" title="{{ $item->name }}">
                                    </a>
                                </td>
                                <td>{{ $item->created_at->format('d M Y') }}</td>
                                <td>{!! action_row($selectedNavigation->url, $item->id, $item->name, ['delete']) !!}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection