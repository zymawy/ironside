@extends('layouts.app')

@section('content')
	<div class="row">
		<div class="col-lg-12">
			<div class="card card-primary">
				<div class="card-header bg-primary with-border">
					<h3 class="card-title text-white">
						<span><i class="fa fa-table"></i></span>
						<span>
							{{ trans('dashboard/indexes.list_all_articles')  }}
						</span>
					</h3>
				</div>

				@include('DH::partials.info')

				@include('DH::partials.toolbar')

				<div class="card-body">
					<table id="tbl-list" data-server="false" class="dt-table table" cellspacing="0" width="100%">
						<thead>
						<tr>
                            <th>{{ trans('dashboard/forms.title')  }}</th>
                            <th class="desktop">{{ trans('dashboard/forms.summary')  }}</th>
                            <th>{{ trans('dashboard/forms.category')  }}</th>
                            <th>{{ trans('dashboard/forms.active_from')  }}</th>
                            <th>{{ trans('dashboard/forms.active_to')  }}</th>
                            <th>{{ trans('dashboard/forms.cover_photo')  }}</th>
                            <th style="min-width: 100px;">{{ trans('dashboard/indexes.action')  }}</th>
						</tr>
						</thead>
						<tbody>
						@foreach ($items as $item)
							<tr>
                                <td>{{ $item->title }}</td>
                                <td>{!! $item->summary !!}</td>
                                <td>{{ ($item->category)? $item->category->name:'-' }}</td>
                                <td>{{ format_date($item->active_from) }}</td>
                                <td>{{ isset($item->active_to)? format_date($item->active_to):'-' }}</td>
                                <td>
                                    @if($item->cover_photo)
                                        <a target="_blank" href="{{ $item->cover_photo->url }}">
                                            <img style="height: 50px;" src="{{ $item->cover_photo->urlForName($item->cover_photo->thumb) }}" title="{{ $item->cover_photo->name }}">
                                        </a>
                                    @endif
                                </td>
                                <td>{!! action_row($selectedNavigation->url, $item->id, $item->title, [['image' => '/dashboard/photos/articles/'.$item->id], 'show', 'edit', 'delete']) !!}</td>
							</tr>
						@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
@endsection