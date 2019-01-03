@extends('layouts.app')

@section('content')
    <!-- Default box -->
    <div class="card">
        <div class="card-header bg-primary with-border">
            <h3 class="card-title text-white">
                <span><i class="fa fa-users"></i></span>
                <span>{{ trans('dashboard/general.list_all') }} {{ ucfirst(str_plural($resource)) }}</span>
            </h3>
        </div>

        <div class="card-body">
            @include('DH::partials.info')
            <div class="m-t-10 m-b-10">
                <a class="btn bttn-fill bttn-danger" href="/dashboard/developer/area/log"><i class="fa fa-angle-double-left"></i> {{ trans('dashboard/log.back_to_all_logs') }}</a><br><br>
            </div>
            <h3>{{ $file_name }}:</h3>
            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                @forelse($logs as $key => $log)
                    <div class="card text-white bg-{{ $log['level_class'] }}">
                        <div class="card-heading" role="tab" id="heading{{ $key }}">
                            <h4 class="card-title text-white">
                                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse{{ $key }}" aria-expanded="true" aria-controls="collapse{{ $key }}">
                                    <i class="fa fa-{{ $log['level_img'] }}"></i>
                                    <span>[{{ $log['date'] }}]</span>
                                    <div class="text-white">
                                        {{ str_limit($log['text'], 150) }}
                                    </div>
                                </a>
                            </h4>
                        </div>
                        <div id="collapse{{ $key }}" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading{{ $key }}">
                            <div class="card-body text-white">
                                <p>{{$log['text']}}</p>
                                <pre>
                    {{ trim($log['stack']) }}
                  </pre>
                            </div>
                        </div>
                    </div>
                @empty
                    <h3 class="text-center">No Logs to display.</h3>
                @endforelse
            </div>
        </div><!-- /.box-body -->
    </div><!-- /.box -->

@endsection

@section('js')
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/8.6/styles/default.min.css">
    <script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/8.6/highlight.min.js"></script>
    <script>hljs.initHighlightingOnLoad();</script>
@endsection