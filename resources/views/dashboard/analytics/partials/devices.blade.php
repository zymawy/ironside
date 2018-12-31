<div class="card border-primary" id="card-devices" style="min-height: 400px;">
    <div class="card-header bg-primary shadow rounded">
        <h3 class="card-title text-white">
            <span><i class="fa fa-mobile"></i></span>
            <span>{{ trans('dashboard/analytics.top-devices') }}</span>
        </h3>

        @include('DH::partials.boxes.toolbar')
    </div>

    <div class="card-body">
        <div class="loading-widget text-primary">
            <i class="fa fa-fw fa-spinner fa-spin"></i>
        </div>

        <table id="tbl-devices" data-order-by="1|desc" class="table nowrap table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
            <tr>
                <th>{{ trans('dashboard/analytics.devices') }}</th>
                <th>{{ trans('dashboard/analytics.sessions') }}</th>
            </tr>
            </thead>
            <tbody></tbody>
        </table>
    </div>
</div>

@section('js')
    @parent
    <script type="text/javascript" charset="utf-8">
        $(function ()
        {
            var datatable;

            initToolbarDateRange('#card-devices .daterange', updateDevices);

            function updateDevices(start, end)
            {
                $('#card-devices .loading-widget').show();

                if (datatable) {
                    datatable.destroy();
                    $('#card-devices table tbody').html('')
                }

                if (!start) {
                    start = moment().subtract(29, 'days').format('YYYY-MM-DD');
                    end = moment().format('YYYY-MM-DD');
                }

                doAjax('/api/analytics/devices', {
                    'start': start, 'end': end,
                }, renderTableDevices);
            }

            function renderTableDevices(data)
            {
                $('#card-devices .loading-widget').slideUp();

                for (var i = 0; i < data.length; i++) {
                    var html = '<tr><td>' + data[i][0] + '</td><td>' + data[i][1] + '</td></tr>';
                    $('#card-devices table tbody').append(html);
                }

                datatable = initDataTables('#tbl-devices');
            }

            setTimeout(function ()
            {
                updateDevices();
            }, 300);
        })
    </script>
@endsection
