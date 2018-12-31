<div class="row">
    <div class="col-lg-12">
        <div class="card card-primary box-solid">
            <div class="card-header bg-primary with-border">
                <h3 class="card-title text-white">
                    <span><i class="fa fa-table"></i></span>
                    <span>{!! $page->name !!}</span>
                </h3>
                <div class="">
                    <a class="btn bttn-unite bttn-danger" target="_blank" href="{!! $page->url !!}">
                        <i class="fa fa-eye"></i>
                        View Page
                    </a>
                </div>
            </div>

            <div class="card-body">
                @if(($page->sections->count() <= 1))
                    <div class="alert alert-info m-t-20 m-b-20">
                        <h4 class="title">How to create Page Sections</h4>
                        <ul>
                            <li>Update the list order by dragging the headings up or down.</li>
                            <li>Create a new Component</li>
                        </ul>
                    </div>
                @endif

                <div class="well well-sm well-toolbar m-t-20 m-b-20" id="nestable-menu">
                    <a href="/dashboard/pages" class="btn btn-labeled bttn-jelly bttn-default">
                        <span class="btn-label"><i class="fa fa-fw fa-chevron-left"></i></span>Back
                    </a>

                    <a class="btn btn-labeled bttn-fill bttn-primary" href="{{ (isset($url)? $url : request()->url()).'/content/create' }}">
                        <span class="btn-label"><i class="fa fa-fw fa-align-justify"></i></span>
                        Create Content
                    </a>
                </div>

                <div class="row">
                    <div class="col-xs-12">
                        <div class="dd" id="dd-navigation" style="max-width: 100%">
                            <ol class="dd-list">
                                @foreach($page->sections as $item)
                                    <li class="dd-item" data-id="{{ $item->id }}">
                                        <div class="btn-toolbar dt-table" data-server="true" style="float: right; margin-top: 5px; margin-right: 5px;">
                                            <div class="btn-group">
                                                <a href="{{ "/dashboard/pages/{$page->id}/sections/content/{$item->id}/edit" }}" class="btn  bttn-fill bttn-primary bttn-xs" data-toggle="tooltip" title="Edit {{ $item->heading }}">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                            </div>

                                            <div class="btn-group">
                                                <form id="form-delete-row{{ $item->id }}" method="POST" action="{{ "/dashboard/pages/{$page->id}/sections/{$item->id}" }}">
                                                    <input name="_method" type="hidden" value="DELETE">
                                                    <input name="_id" type="hidden" value="{{ $item->id }}">
                                                    <input name="_token" type="hidden" value="{{ csrf_token() }}">
                                                    <a data-form="form-delete-row{{ $item->id }}" class="btn  bttn-fill bttn-danger bttn-xs btn-delete-row" data-toggle="tooltip" title="Delete {{ $item->heading }}">
                                                        <i class="fa fa-trash"></i>
                                                    </a>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="dd-handle">
                                            <div>
                                                    <span class="text-bold" style="font-size: larger;">
                                                        {{ $item->heading }}
                                                        <span class="text-muted">
                                                            ({{ $item->heading_element }}
                                                            )
                                                            {{--<em><small>{{ $item->type }}</small></em>--}}
                                                        </span>
                                                    </span>
                                            </div>
                                            <div>
                                                <div class="media">
                                                    @if($item->media)
                                                        <div class="media-left">
                                                            <a href="#">
                                                                <img class="media-object" src="{{ $item->thumbUrl }}" style="height: 30px;">
                                                            </a>
                                                        </div>
                                                    @endif
                                                    <div class="media-body">
                                                        {!! $item->summary !!}
                                                    </div>
                                                </div>

                                                @foreach($item->documents as $document)
                                                    <a href="{{ $document->url }}">{{ $document->name }}</a>{{ $loop->last?'':' | ' }}
                                                @endforeach

                                                @foreach($item->photos as $photo)
                                                    <img class=img-responsive" src="{{ $photo->thumb_url }}" style="height: 30px;">
                                                @endforeach
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@section('js')
    @parent
    @include('DH::partials.nestable')
    <script type="text/javascript" charset="utf-8">
        $(function () {
            initNestableMenu(1, "{{ (isset($url)? $url : request()->url()) }}/order");
        })
    </script>
@endsection