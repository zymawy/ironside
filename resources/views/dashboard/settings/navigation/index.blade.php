@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-primary">
                <div class="card-header bg-primary with-border">
                    <h3 class="card-title text-white">
                        <span><i class="fa fa-table"></i></span>
                        <span>List All {{ ucfirst(str_plural($resource)) }}</span>
                    </h3>
                </div>

                <div class="card-body">

                    @include('DH::partials.info')

                    @include('DH::partials.toolbar', ['order' => true])
                    <div class="table-responsive">
                        <table id="tbl-list" data-page-length="25" data-server="{{$ajax}}" class="dt-table table dataTable" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th>Title</th>
                                <th class="desktop">Description</th>
                                <th>Slug</th>
                                <th>Url</th>
                                <th>Parent</th>
                                {{--<th>Roles</th>--}}
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($items as $item)
                                <tr>
                                    <td>{{ $item->title }}</td>
                                    <td>{!! $item->description !!}</td>
                                    <td>{{ $item->slug }}</td>
                                    <td>{{ $item->url }}</td>
                                    <td>{{ ($item->parent)? $item->parent->title : '-' }}</td>
                                    {{--                                <td>{{ $item->rolesString }}</td>--}}
                                    <td>
                                        {!! action_row($selectedNavigation->url, $item->id, $item->title, ['edit', 'delete']) !!}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@include('ironside::dashboard.partials.datatables', ['options' => [
                    ['data' => 'title', 'name' => 'title'],
                    ['data' => 'description', 'name' => 'description'],
                    ['data' => 'slug', 'name' => 'slug'],
                    ['data' => 'url', 'name' => 'url'],
                    ['data' => 'parent', 'name' => 'parent'],
                    ['data' => 'is_hidden', 'name' => 'is_hidden'],
                ]])
