@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-primary">
                <div class="card-header bg-primary with-border">
                    <h3 class="card-title text-white">
                        <span><i class="fa fa-table"></i></span>
                        <span>{{ __('dashboard/indexes.list_all_newsletters') }}</span>
                    </h3>
                </div>

                @include('DH::partials.info')

                @include('DH::partials.toolbar')

                <div class="card-body">

                    <table id="tbl-list" data-server="false" class="dt-table table" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>{{ __('dashboard.user') }}</th>
                            <th>{{ __('dashboard/forms.email') }}</th>
                            <th>{{ __('dashboard/indexes.subscribed_on') }}</th>
                            <th>{{ __('dashboard/forms.action') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($items as $item)
                            <tr>
                                <td>{{ $item->fullname }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->created_at->format('d M Y') }}</td>
                                <td>{!! action_row($selectedNavigation->url, $item->id, $item->name, ['edit', 'delete']) !!}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection