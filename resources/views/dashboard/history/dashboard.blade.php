@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card border-primary">
                <div class="card-header bg-primary with-border">
                    <h3 class="card-title text-white">
                        <span><i class="fa fa-table"></i></span>
                        <span>
                            {{ trans('dashboard/indexes.list_all_dashboard_action')  }}
                        </span>
                    </h3>

                    {{--<div class="pull-right card-tools">--}}
                        {{--<button type="button" class="btn btn-default btn-sm" data-widget="collapse">--}}
                            {{--<i class="fa fa-minus"></i>--}}
                        {{--</button>--}}
                    {{--</div>--}}
                </div>

                <div class="card-body">
                    <table id="tbl-list-activities" data-order-by="0|desc" data-server="false" class="table" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>
                                {{ trans('dashboard/forms.id') }}
                            </th>
                            <th>
                                {{ trans('dashboard/forms.user') }}
                            </th>
                            <th>
                                {{ trans('dashboard/forms.action') }}
                            </th>
                            <th>
                                {{ trans('dashboard/indexes.after') }}
                            </th>
                            <th>
                                {{ trans('dashboard/indexes.before') }}
                            </th>
                            <th>
                                {{ trans('dashboard/forms.created') }}
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($activities as $activity)
                            <tr>
                                <td>{{ $activity->id }}</td>
                                <td>{{ isset($activity->user)? $activity->user->fullname:'System' }}</td>
                                <td>{!! $activity->name !!}</td>
                                <td>{!! activitiy_after($activity) !!}</td>
                                <td>{!! $activity->before !!}</td>
                                {{--<td>{{ isset($activity->subject)? isset($activity->subject->title)? $activity->subject->title:'':'' }}</td>--}}
                                <td>{{ $activity->created_at->diffForHumans() }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    @parent
    <script type="text/javascript" charset="utf-8">
        $(function ()
        {
            initDataTables('#tbl-list-activities', {
                'pageLength': 25,
                'columnDefs': [
                    {
                        "targets": [0],
                        "visible": false,
                        "searchable": false
                    },
                ]
            });
        })
    </script>
@endsection