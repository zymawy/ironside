<div class="card card-primary" id="card-interests-market" style="min-height: 400px;">
    <div class="card-header shadow rounded bg-primary">
        <h3 class="card-title text-white">
            <span><i class="fa fa-file-text"></i></span>
            <span>{{ trans('dashboard/analytics.top-interests-market') }}</span>
        </h3>

        @include('dashboard.partials.boxes.toolbar')
    </div>

    <div class="card-body">
        <div class="loading-widget text-primary">
            <i class="fa fa-fw fa-spinner fa-spin"></i>
        </div>

        <table id="tbl-interests-market" data-order-by="1|desc" class="table nowrap table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
            <tr>
                <th>{{ trans('dashboard/analytics.category') }}</th>
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

            initToolbarDateRange('#card-interests-market .daterange', updateInterestsMarket);

            function updateInterestsMarket(start, end)
            {
                $('#box-interests-market .loading-widget').show();

                if (datatable) {
                    datatable.destroy();
                    $('#box-interests-market table tbody').html('')
                }

                if (!start) {
                    start = moment().subtract(29, 'days').format('YYYY-MM-DD');
                    end = moment().format('YYYY-MM-DD');
                }

                doAjax('/api/analytics/interests-market', {
                    'start': start, 'end': end,
                }, renderTableInterestsMarket);
            }

            function renderTableInterestsMarket(data)
            {
                $('#box-interests-market .loading-widget').slideUp();

                for (var i = 0; i < data.length; i++) {
                    var html = '<tr><td>' + data[i][0] + '</td><td>' + data[i][1] + '</td></tr>';
                    $('#box-interests-market table tbody').append(html);
                }

                datatable = initDataTables('#tbl-interests-market');
            }

            setTimeout(function ()
            {
                updateInterestsMarket();
            }, 300);
        })
    </script>
@endsection
