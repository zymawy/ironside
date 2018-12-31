@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-solid">
                <div class="card-header with-border bg-primary">
                    <h3 class="card-title text-white">
                        <span><i class="fa fa-table"></i></span>
                        <span>
                            {{ trans('dashboard/indexes.list_all_banners')  }}
                        </span>
                    </h3>
                </div>

                @include('DH::partials.info')
                <div class="m-t-20 m-b-20">
                            @include('DH::partials.toolbar', ['order' => true])
                </div>

                <div class="card-body">
                    <table id="tbl-list" data-server="false" class="dt-table table" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>{{ trans('dashboard/indexes.banner')  }}</th>
                            <th>{{ trans('dashboard/indexes.summary')  }}</th>
                            <th>{{ trans('dashboard/indexes.button')  }}</th>
                            <th>{{ trans('dashboard/forms.active_from')  }}</th>
                            <th>{{ trans('dashboard/forms.active_to')  }}</th>
                            <th>{{ trans('dashboard/indexes.image')  }}</th>
                            <th>{{ trans('dashboard/indexes.website')  }}</th>
                            <th>{{ trans('dashboard/indexes.action')  }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($items as $item)
                            <tr>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->summary }}</td>
                                <td>
                                    <a target="_blank" href="{{ $item->action_url }}">{{ $item->action_name }}</a>
                                </td>
                                <td>{{ format_date($item->active_from) }}</td>
                                <td>{{ isset($item->active_to)? format_date($item->active_to):'-' }}</td>
                                <td>{!! image_row_link($item->image_thumb, $item->image) !!}</td>
                                <td>
                                    {!! $item->is_website ?
                                    '<span class="badge badge-success">' . trans('dashboard/general.yes') . '</span>'
                                    :
                                   '<span class="badge badge-danger">' . trans('dashboard/general.no') . '</span>'
                                    !!}
                                </td>
                                <td>
                                    <div class="btn-toolbar">
                                        <a href="/dashboard/photos/banners/{{ $item->id }}/crop-resource" class="btn bttn-material-circle bttn-royal bttn-xs m-b-10 m-l-5" data-toggle="tooltip" title="{{ __('dashboard/indexes.crop') . $item->name }}">
                                            <i class="fa fa-crop"></i>
                                        </a>
                                        {!! action_row($selectedNavigation->url, $item->id, $item->name, ['show', 'edit', 'delete'], false) !!}
                                    </div>
                                </td>
                                {{--<td>{!! action_row($selectedNavigation->url, $item->id, $item->title, ['show', 'edit', 'delete']) !!}</td>--}}
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection