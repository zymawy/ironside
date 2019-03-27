@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-primary box-solid">
                <div class="card-header bg-primary with-border">
                    <h3 class="card-title text-white">
                        <span><i class="fa fa-table"></i></span>
                        <span>
                            {{ trans('dashboard/indexes.list_all_document_cat')  }}
                        </span>
                    </h3>
                </div>

                <div class="margin-20 m-t-20">
                        @include('DH::partials.info')

                        @include('DH::partials.toolbar')
                </div>

                <div class="card-body">

                    <table id="tbl-list" data-server="false" class="dt-table table" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>{{ trans('dashboard/forms.title')  }}</th>
                            <th>{{ trans('dashboard/forms.total_document')  }}</th>
                            <th>{{ trans('dashboard/forms.document')  }}</th>
                            <th>{{ trans('dashboard/forms.created')  }}</th>
                            <th>{{ trans('dashboard/forms.action')  }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($items as $item)
                            <tr>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->documents->count() }}</td>
                                <td>
                                    @foreach($item->documents as $document)
                                        <a href="{{ $document->url }}">{{ $document->name }}</a>{{ $loop->last?'':' | ' }}
                                    @endforeach
                                </td>
                                <td>{{ $item->created_at->format('d M Y') }}</td>
                                <td>
                                    <div class="btn-toolbar">
                                        <div class="btn-group">
                                            <a href="/dashboard/documents/category/{{ $item->id }}" class="btn bttn-material-flat bttn-info bttn-xs m-b-10 m-l-5" data-toggle="tooltip"
                                               title="{{trans('dashboard/indexes.add_document_to') . $item->name }}">
                                                <i class="fa fa-files-o"></i>
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
