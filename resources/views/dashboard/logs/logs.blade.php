@extends('layouts.app')
@section('css')
    @parent
    <!-- Ladda Buttons (loading buttons) -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/pnotify/3.2.1/pnotify.css" rel="stylesheet" type="text/css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/Ladda/1.0.6/ladda-themeless.min.css" rel="stylesheet" type="text/css" />

@endsection

@section('content')

    {{--<section class="content-header">--}}
        {{--<h1>--}}
            {{--{{ trans('dashboard/log.log_manager') }}<small>{{ trans('dashboard/log.log_manager_description') }}</small>--}}
        {{--</h1>--}}
        {{--<ol class="breadcrumb">--}}
            {{--<li><a href="">{{ trans('dashboard/log') }}</a></li>--}}
            {{--<li><a href="{{ request()->url() .'/log' }}">{{ trans('dashboard/log.log_manager') }}</a></li>--}}
            {{--<li class="active">{{ trans('dashboard/log.existing_logs') }}</li>--}}
        {{--</ol>--}}
    {{--</section>--}}

    <!-- Default box -->
    <div class="card">
        <div class="card-body">
            <table id="tbl-list" data-server="false" data-page-length="25" class="dt-table table table-hover table-condensed">
                <thead>
                <tr>
                    <th>#</th>
                    <th>{{ trans('dashboard/log.file_name') }}</th>
                    <th>{{ trans('dashboard/log.date') }}</th>
                    <th>{{ trans('dashboard/log.last_modified') }}</th>
                    <th class="text-right">{{ trans('dashboard/log.file_size') }}</th>
                    <th>{{ trans('dashboard/log.actions') }}</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($files as $key => $file)
                    <tr>
                        <th scope="row">{{ $key + 1 }}</th>
                        <td>{{ $file['file_name'] }}</td>
                        <td>{{ \Carbon\Carbon::createFromTimeStamp($file['last_modified'])->formatLocalized('%d %B %Y') }}</td>
                        <td>{{ \Carbon\Carbon::createFromTimeStamp($file['last_modified'])->formatLocalized('%H:%M') }}</td>
                        <td class="text-right">{{ round((int)$file['file_size']/1048576, 2).' MB' }}</td>
                        <td>
                            <a class="btn bttn-xs bttn-material-flat bttn-royal" href="{{ request()->url() .'/preview/'. base64_encode($file['file_name']) }}"><i class="fa fa-eye"></i> {{ trans('dashboard/log.preview') }}</a>
                            <a class="btn bttn-xs bttn-material-flat bttn-default" href="{{ request()->url() .'/download/'.base64_encode($file['file_name']) }}"><i class="fa fa-cloud-download"></i> {{ trans('dashboard/log.download') }}</a>
                            <a class="btn bttn-xs bttn-material-flat bttn-danger" data-button-type="delete" href="{{ request()->url() .'/delete/'.base64_encode($file['file_name']) }}"><i class="fa fa-trash-o"></i> {{ trans('dashboard/log.delete') }}</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

        </div><!-- /.box-body -->
    </div><!-- /.box -->

@endsection

@section('js')
    @parent
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pnotify/3.2.1/pnotify.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Ladda/1.0.6/spin.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Ladda/1.0.6/ladda.min.js"></script>

    <script>
        jQuery(document).ready(function($) {
            // capture the delete button
            $("[data-button-type=delete]").click(function(e) {
                e.preventDefault();
                var delete_button = $(this);
                var delete_url = $(this).attr('href');
                if (confirm("{{ trans('dashboard/log.delete_confirm') }}") == true) {
                    $.ajax({
                        url: delete_url,
                        type: 'DELETE',
                        data: {
                            _token: "<?php echo csrf_token(); ?>"
                        },
                        success: function(result) {
                            // delete the row from the table
                            delete_button.parentsUntil('tr').parent().remove();
                            // Show an alert with the result
                            new PNotify({
                                title: "{{ trans('dashboard/log.delete_confirmation_title') }}",
                                text: "{{ trans('dashboard/log.delete_confirmation_message') }}",
                                type: "success"
                            });
                        },
                        error: function(result) {
                            // Show an alert with the result
                            new PNotify({
                                title: "{{ trans('dashboard/log.delete_error_title') }}",
                                text: "{{ trans('dashboard/log.delete_error_message') }}",
                                type: "warning"
                            });
                        }
                    });
                } else {
                    new PNotify({
                        title: "{{ trans('dashboard/log.delete_cancel_title') }}",
                        text: "{{ trans('dashboard/log.delete_cancel_message') }}",
                        type: "info"
                    });
                }
            });
        });
    </script>
@endsection