@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-primary">
                <div class="card-header bg-primary with-border">
                    <h3 class="card-title text-white">
                        <span><i class="fa fa-table"></i></span>
                        <span>
                            {{ __('dashboard/indexes.list_all_roles') }}
                        </span>
                    </h3>
                </div>

                @include('DH::partials.info')

                @include('DH::partials.toolbar')

                <div class="card-body">

                    <table id="tbl-list" data-server="false" class="dt-table table" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>{{ __('dashboard/indexes.name') }}</th>
                            <th>
                                {{ __('dashboard/forms.slug') }}
                            </th>
                            <th>
                                {{ __('dashboard/indexes.keyword') }}
                            </th>
                            <th>
                                {{ __('dashboard/forms.action') }}
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($items as $item)
                            <tr>
                                <td><i class="fa fa-{{ $item->icon }}"></i> {{ $item->name }}</td>
                                <td>
                                    <h5>
                                        <span class="badge badge-primary">
                                            {{ $item->slug }}
                                        </span>
                                    </h5>
                                </td>
                                <td>{{ $item->keyword }}</td>
                                <td>
                                    @if(!config('app.is_preview'))
                                        {!! action_row($selectedNavigation->url, $item->id, $item->name, ['edit', 'delete']) !!}
                                    @else
                                        <span class="label label-warning">{{ $item->name }} Role is needed</span>
                                    @endif
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