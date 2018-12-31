@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card box-primary box-solid">
                <div class="card-header bg-primary with-border">
                    <h3 class="card-title text-white">
                        <span><i class="fa fa-align-center"></i></span>
                        <span>Update {{ ucfirst($resource) }} List Order</span>
                    </h3>
                </div>

                <div class="card-body">

                    @include('DH::partials.info')

                    <div class="well well-sm well-toolbar m-t-20 m-b-20" id="nestable-menu">
                        <a href="javascript:window.history.back();" class="btn btn-labeled  bttn-slant bttn-pill">
                            <span class="btn-label"><i class="fa fa-fw fa-chevron-left"></i></span>Back
                        </a>

                        <button type="button" class="btn btn-labeled bttn-slant bttn-warning" data-action="expand-all">
                            <span class="btn-label"><i class="fa fa-fw fa-plus-circle"></i></span>Expand All
                        </button>

                        <button type="button" class="btn btn-labeled bttn-slant bttn-warning" data-action="collapse-all">
                            <span class="btn-label"><i class="fa fa-fw fa-minus-circle text-red"></i></span>Collapse All
                        </button>
                    </div>

                    <div class="row">
                        <div class="col-xs-12">
                            <div class="dd" id="dd-navigation" style="max-width: 100%">
                                {!! $itemsHtml !!}
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
            initNestableMenu(3, "{{ request()->url() }}");
        })
    </script>
@endsection