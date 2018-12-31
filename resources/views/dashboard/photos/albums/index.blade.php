@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-primary">
                <div class="card-header bg-primary with-border">
                    <h3 class="card-title text-white">
                        <span><i class="fa fa-table"></i></span>
                        <span>{{ trans('dashboard/indexes.list_all_photos') }}</span>
                    </h3>
                </div>

                @include('DH::partials.info')

                @include('DH::partials.toolbar')

                <div class="card-body">

                    <table id="tbl-list" data-server="false" class="dt-table table" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>{{ __('dashboard/indexes.name') }}</th>
                            <th>{{ __('dashboard/indexes.total_photos') }}</th>
                            <th>{{ __('dashboard/indexes.cover_photo') }}</th>
                            <th>{{ __('dashboard/indexes.created') }}</th>
                            <th>{{ __('dashboard/forms.action') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($items as $item)
                            <tr>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->photos->count() }}</td>
                                <td>
                                    @if($item->cover_photo)
                                        <a target="_blank" href="{{ $item->cover_photo->url }}">
                                            <img style="height: 50px;" src="{{ $item->cover_photo->urlForName($item->cover_photo->thumb) }}" title="{{ $item->cover_photo->name }}">
                                        </a>
                                    @endif
                                </td>
                                <td>{{ $item->created_at->format('d M Y') }}</td>
                                <td>
                                    <div class="btn-toolbar">
                                        <div class="btn-group">
                                            <a href="/dashboard/photos/albums/{{ $item->id }}"
                                               class="btn bttn-material-flat bttn-info bttn-xs m-b-10 m-l-5"
                                               data-toggle="tooltip" title="{{ __('dashboard/indexes.add_photo') }} {{ $item->name }}"
                                            >
                                                <i class="fa fa-image"></i>
                                            </a>
                                        </div>
                                        {!! action_row($selectedNavigation->url, $item->id, $item->name, ['edit', 'delete'], false) !!}
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection