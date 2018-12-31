<div class="card" id="card-device-category" style="min-height: 400px;">
    <div class="card-header shadow rounded bg-primary">
        <h3 class="card-title  text-white">
            <span><i class="fa fa-tv"></i></span>
            <span>{{ trans("dashboard/analytics.device-category") }}</span>
        </h3>
        <div class="padded">
            @include('DH::partials.boxes.toolbar')
        </div>
    </div>

    <div class="card-body">
        <div class="loading-widget text-primary">
            <i class="fa fa-fw fa-spinner fa-spin"></i>
        </div>

        <div id="chart-device-category-legend" class="chart-legend" style="margin: 20px 0;"></div>
        <canvas id="chart-device-category"></canvas>
    </div>
</div>

@section('js')
    @parent
    <script type="text/javascript" charset="utf-8">
        $(function ()
        {
            var chart;

            initToolbarDateRange('#card-device-category .daterange', updateChart);

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

                $('#card-device-category .loading-widget').show();
                doAjax('/api/analytics/device-category', {
                    'start': start, 'end': end,
                }, createPieChart);
            }

            function createPieChart(data)
            {
                // total page views and visitors line chart
                var ctx = document.getElementById("chart-device-category").getContext("2d");

                chart = new Chart(ctx).Doughnut(data, {
                    multiTooltipTemplate: "<%= value %> - <%= datasetLabel %>"
                });

                 $('#card-device-category .loading-widget').slideUp();

                $('#chart-device-category-legend').html(chart.generateLegend());
            }

            setTimeout(function ()
            {
                updateChart();
            }, 300);
        })
    </script>
@endsection
