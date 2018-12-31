<div class="card" id="box-total-views">
    <div class="card-header shadow rounded bg-primary">
        <h3 class="card-title">
            <span><i class="fa fa-users"></i></span>
            <span>{{ trans('dashboard/analytics.total-page-views') }}</span>
        </h3>

        @include('DH::partials.boxes.toolbar')
    </div>

    <div class="card-body">
        <div class="loading-widget text-primary">
            <i class="fa fa-fw fa-spinner fa-spin"></i>
        </div>

        <div id="chart-page-views-legend" class="chart-legend"></div>
        <canvas id="chart-page-views"></canvas>
    </div>
</div>

@section('js')
    @parent
    <script type="text/javascript" charset="utf-8">
        $(function ()
        {
            var chart;
            initToolbarDateRange('#box-total-views .daterange', updateChart);
            /**
             * Get the chart's data
             * @param view
             */
            function updateChart(start, end)
            {
                if (chart) {
                    chart.destroy();
                }
                if (!start) {
                    start = moment().subtract(29, 'days').format('YYYY-MM-DD');
                    end = moment().format('YYYY-MM-DD');
                }
                $('#box-total-views .loading-widget').show();
                doAjax('/api/analytics/visitors-views', {
                    'start': start, 'end': end,
                }, createLineChart);
            }
            function createLineChart(data)
            {
                // total page views and visitors line chart
                var ctx = document.getElementById("chart-page-views").getContext("2d");
                chart = new Chart(ctx).Line(data, {
                    multiTooltipTemplate: "<%= value %> - <%= datasetLabel %>"
                });
                 $('#box-total-views .loading-widget').slideUp();
                $('#chart-page-views-legend').html(chart.generateLegend());
            }
            setTimeout(function ()
            {
                updateChart();
            }, 300);
        })
    </script>
@endsection
