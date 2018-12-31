@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card box-solid">
                <div class="bg-primary card-header with-border">
                    <h3 class="card-title text-white">
                        <span><i class="fa fa-align-center"></i></span>
                        <span>{{ __('dashboard/general.banner_order_text', ['resource' => ucfirst($resource)]) }}</span>
                    </h3>
                </div>

                <div class="card-body">
                    <div class="well well-sm well-toolbar m-t-20 m-b-20" id="nestable-menu">
                        <a href="javascript:window.history.back();" class="btn btn-labeled bttn-slant bttn-danger">
                            <span class="btn-label"><i class="fa fa-fw fa-chevron-left"></i></span>{{ __('dashboard/general.back') }}
                        </a>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="dd" id="dd-navigation" style="max-width: 100%">
                                <ol class="dd-list">
                                    @foreach($items as $item)
                                        <li class="dd-item" data-id="{{ $item->id }}">
                                            <div class="dd-handle" style="overflow: auto;">
                                                <p style="float: left">
                                                    {{ $item->name }}
                                                    {!! trans('dashboard/general.visibility',
                                                            [
                                                            'is_website' => $item->is_website? __('dashboard/general.all_pages') : __('dashboard/general.page_specific'),
                                                            'active_to' => $item->active_to? $item->active_to . ' - ' . $item->active_to->diffForHumans() : __('dashboard/general.never')
                                                            ])
                                                    !!}
                                                    <br/>{{ $item->summary }}
                                                </p>
                                                <img src="{{ uploaded_images_url($item->image) }}" style="height: 50px; float: right;">
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

    @include('DH::partials.nestable')
@endsection

@section('js')
    @parent
    <script type="text/javascript" charset="utf-8">
        $(function ()
        {
            initNestableMenu(1, "{{ request()->url() }}");
        })
    </script>
@endsection