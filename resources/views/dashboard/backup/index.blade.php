@extends('layouts.app')

@section('css')
    <!-- Ladda Buttons (loading buttons) -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/pnotify/3.2.1/pnotify.css" rel="stylesheet" type="text/css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/Ladda/1.0.6/ladda-themeless.min.css" rel="stylesheet" type="text/css" />

@endsection

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

            <div class="well well-sm well-toolbar m-t-30 m-b-30">
                <button id="create-new-backup-button" href="{{ request()->url() .'/create' }}"
                        class="btn bttn-material-flat bttn-primary ladda-button"
                        data-style="zoom-in">
                <span class="ladda-label"><i class="fa fa-plus"></i>
                    {{ trans('dashboard/backup.create_a_new_backup') }}
                </span>
                </button>
                <h3>{{ trans('dashboard/backup.existing_backups') }}:</h3>
            </div>
            <br>
            <table id="tbl-list" data-server="false" data-page-length="25" class="dt-table display nowrap table  table-condensed" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th>#</th>
                    <th>{{ trans('dashboard/backup.location') }}</th>
                    <th>{{ trans('dashboard/backup.date') }}</th>
                    <th class="text-right">{{ trans('dashboard/backup.file_size') }}</th>
                    <th class="text-right">{{ trans('dashboard/backup.actions') }}</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($backups as $k => $b)
                    <tr>
                        <th scope="row">{{ $k+1 }}</th>
                        <td>{{ $b['disk'] }}</td>
                        <td>{{ \Carbon\Carbon::createFromTimeStamp($b['last_modified'])->formatLocalized('%d %B %Y, %H:%M') }}</td>
                        <td class="text-right">{{ round((int)$b['file_size']/1048576, 2).' MB' }}</td>
                        <td class="text-right">
                            @if ($b['download'])
                                <a class="btn bttn-xs bttn-material-flat bttn-default"
                                   href="{{  request()->url() . '/download/' }}?disk={{ $b['disk'] }}&path={{ urlencode($b['file_path']) }}&file_name={{ urlencode($b['file_name']) }}">
                                    <i class="fa fa-cloud-download"></i>
                                    {{ trans('dashboard/backup.download') }}</a>
                            @endif
                            <a class="btn bttn-xs bttn-material-flat bttn-danger"
                               data-button-type="delete"
                               href="{{  request()->url() . '/delete/'.$b['file_name'] }}?disk={{ $b['disk'] }}">
                                <i class="fa fa-trash-o"></i>
                                {{ trans('dashboard/backup.delete') }}
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

        </div><!-- /.box-body -->
    </div><!-- /.box -->

@endsection

@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pnotify/3.2.1/pnotify.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Ladda/1.0.6/spin.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Ladda/1.0.6/ladda.min.js"></script>
    <script>
        jQuery(document).ready(function($) {
            // capture the Create new backup button
            $("#create-new-backup-button").click(function(e) {
                e.preventDefault();
                var create_backup_url = $(this).attr('href');
                // Create a new instance of ladda for the specified button
                var l = Ladda.create( document.querySelector( '#create-new-backup-button' ) );
                // Start loading
                l.start();
                // Will display a progress bar for 10% of the button width
                l.setProgress( 0.3 );
                setTimeout(function(){ l.setProgress( 0.6 ); }, 2000);
                // do the backup through ajax
                $.ajax({
                    url: create_backup_url,
                    type: 'PUT',
                    success: function(result) {
                        l.setProgress( 0.9 );
                        // Show an alert with the result
                        if (result.indexOf('failed') >= 0) {
                            new PNotify({
                                title: "{{ trans('dashboard/backup.create_warning_title') }}",
                                text: "{{ trans('dashboard/backup.create_warning_message') }}",
                                type: "warning"
                            });
                        }
                        else
                        {
                            new PNotify({
                                title: "{{ trans('dashboard/backup.create_confirmation_title') }}",
                                text: "{{ trans('dashboard/backup.create_confirmation_message') }}",
                                type: "success"
                            });
                        }
                        // Stop loading
                        l.setProgress( 1 );
                        l.stop();
                        // refresh the page to show the new file
                        setTimeout(function(){ location.reload(); }, 3000);
                    },
                    error: function(result) {
                        l.setProgress( 0.9 );
                        // Show an alert with the result
                        new PNotify({
                            title: "{{ trans('dashboard/backup.create_error_title') }}",
                            text: "{{ trans('dashboard/backup.create_error_message') }}",
                            type: "warning"
                        });
                        // Stop loading
                        l.stop();
                    }
                });
            });
            // capture the delete button
            $("[data-button-type=delete]").click(function(e) {
                e.preventDefault();
                var delete_button = $(this);
                var delete_url = $(this).attr('href');
                if (confirm("{{ trans('dashboard/backup.delete_confirm') }}") == true) {
                    $.ajax({
                        url: delete_url,
                        type: 'DELETE',
                        success: function(result) {
                            // Show an alert with the result
                            new PNotify({
                                title: "{{ trans('dashboard/backup.delete_confirmation_title') }}",
                                text: "{{ trans('dashboard/backup.delete_confirmation_message') }}",
                                type: "success"
                            });
                            // delete the row from the table
                            delete_button.parentsUntil('tr').parent().remove();
                        },
                        error: function(result) {
                            // Show an alert with the result
                            new PNotify({
                                title: "{{ trans('dashboard/backup.delete_error_title') }}",
                                text: "{{ trans('dashboard/backup.delete_error_message') }}",
                                type: "warning"
                            });
                        }
                    });
                } else {
                    new PNotify({
                        title: "{{ trans('dashboard/backup.delete_cancel_title') }}",
                        text: "{{ trans('dashboard/backup.delete_cancel_message') }}",
                        type: "info"
                    });
                }
            });
        });
    </script>
@endsection