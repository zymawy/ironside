@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-primary box-solid">
                <div class="card-header bg-primary with-border">
                    <h3 class="box-title text-white">
                        <span><i class="fa fa-table"></i></span>
                        <span>List All Pages</span>
                    </h3>
                </div>

                <div class="card-body">

                    @include('DH::partials.info')

                    <div class="well well-sm well-toolbar m-t-20 m-b-20">
                        <a class="btn btn-labeled bttn-slant bttn-primary" href="{{ request()->url().'/create' }}">
                            <span class="btn-label"><i class="fa fa-fw fa-plus"></i></span>Create {{ ucfirst($resource) }}
                        </a>

                        <a class="btn btn-labeled bttn-slant bttn-royal text-black" href="{{ request()->url().'/order' }}">
                            <span class="btn-label"><i class="fa fa-fw fa-align-center"></i></span>General Order
                        </a>

                        <a class="btn btn-labeled bttn-slant bttn-royal text-black" href="{{ Request::url().'/order/featured' }}">
                            <span class="btn-label"><i class="fa fa-fw fa-align-center"></i></span>
                            Featured Order
                        </a>

                        <a class="btn btn-labeled bttn-slant bttn-royal text-black" href="{{ request()->url().'/order/header' }}">
                            <span class="btn-label"><i class="fa fa-fw fa-align-center"></i></span>
                            Header Order
                        </a>

                        <a class="btn btn-labeled bttn-slant bttn-royal text-black" href="{{ request()->url().'/order/footer' }}">
                            <span class="btn-label"><i class="fa fa-fw fa-align-center"></i></span>
                            Footer Order
                        </a>
                    </div>

                    <table id="tbl-list" data-server="false" data-page-length="25" class="dt-table table" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>Page</th>
                            <th>Description</th>
                            <th>Url</th>
                            <th>Parent</th>
                            <th>Page Views</th>
                            <th style="min-width: 100px;">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($items as $item)
                            <tr>
                                <td>{{ $item->name }}</td>
                                <td>{!! $item->description !!}</td>
                                <td><h5><span class="badge badge-primary">{!! $item->url !!}</span></h5></td>
                                <td>{{ ($item->parent)? $item->parent->title : '-' }}</td>
                                <td><h5><span class="badge badge-success ">{{ $item->views }}</span></h5></td>
                                <td>
                                    <div class="btn-toolbar">
                                        <div class="btn-group">
                                            <a href="/dashboard/pages/{{ $item->id }}/sections"
                                               class="btn bttn-material-flat bttn-success btn-xs m-b-10 m-l-5"
                                               data-toggle="tooltip" title="Manage Page Content">
                                                <i class="fa fa-wpforms"></i>
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