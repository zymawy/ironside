<div class="card  border-primary" id="card-browsers" style="min-height: 400px;">
    <div class="card-header bg-primary shadow rounded">
        <h3 class="card-title text-white">
            <span><i class="fa fa-chrome"></i></span>
            <span>{{ trans('dashboard/analytics.top-browsers') }}</span>
        </h3>

        @include('DH::partials.boxes.toolbar')
    </div>

    <div class="card-body">
        <div class="loading-widget text-primary">
            <i class="fa fa-fw fa-spinner fa-spin"></i>
        </div>

        <div id="chart-browsers-legend" class="chart-legend" style="margin: 20px 0;"></div>
        <canvas id="chart-browsers"></canvas>
    </div>
</div>

@section('js')
    @parent
    <script type="text/javascript" charset="utf-8">
        $(function ()
        {
            var chart;

            initToolbarDateRange('#card-browsers .daterange', updateChart);

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

                $('#card-browsers .loading-widget').show();
                doAjax('/api/analytics/browsers', {
                    'start': start, 'end': end,
                }, createPieChart);
            }

            function createPieChart(data)
            {
                // total page views and visitors line chart
                var ctx = document.getElementById("chart-browsers").getContext("2d");

                chart = new Chart(ctx).Doughnut(data, {
                    multiTooltipTemplate: "<%= value %> - <%= datasetLabel %>"
                });

                 $('#card-browsers .loading-widget').slideUp();

                $('#chart-browsers-legend').html(chart.generateLegend());
            }

            setTimeout(function ()
            {
                updateChart();
            }, 300);
        })
    </script>
@endsection
