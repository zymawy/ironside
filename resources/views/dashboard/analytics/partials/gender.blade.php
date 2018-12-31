<div class="card card-primary" id="card-gender" style="min-height: 400px;">
    <div class="card-header shadow rounded bg-primary">
        <h3 class="card-title">
            <span><i class="fa fa-female"></i></span>
            <span>{{ trans('dashboard/analytics.gender') }}</span>
        </h3>

        @include('dashboard.partials.boxes.toolbar')
    </div>

    <div class="card-body">
        <div class="loading-widget text-primary">
            <i class="fa fa-fw fa-spinner fa-spin"></i>
        </div>

        <div id="chart-gender-legend" class="chart-legend" style="margin: 20px 0;"></div>
        <canvas id="chart-gender"></canvas>
    </div>
</div>

@section('js')
    @parent
    <script type="text/javascript" charset="utf-8">
        $(function ()
        {
            var chart;

            initToolbarDateRange('#card-gender .daterange', updateChart);

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

                $('#box-gender .loading-widget').show();
                doAjax('/api/analytics/gender', {
                    'start': start, 'end': end,
                }, createPieChart);
            }

            function createPieChart(data)
            {
                // total page views and visitors line chart
                var ctx = document.getElementById("chart-gender").getContext("2d");

                chart = new Chart(ctx).Doughnut(data, {
                    multiTooltipTemplate: "<%= value %> - <%= datasetLabel %>"
                });

                 $('#box-gender .loading-widget').slideUp();

                $('#chart-gender-legend').html(chart.generateLegend());
            }

            setTimeout(function ()
            {
                updateChart();
            }, 300);
        })
    </script>
@endsection
