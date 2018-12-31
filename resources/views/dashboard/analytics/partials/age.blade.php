<div class="card" id="box-age" style="min-height: 400px;">
    <div class="card-header bg-primary shadow rounded gradient-z-12">
        <h3 class="card-title text-white">
            <span><i class="fa fa-user-secret"></i></span>
            <span>{{ trans('dashboard/analytics.age') }}</span>
        </h3>

        @include('DH::partials.boxes.toolbar')
    </div>

    <div class="card-body">
        <div class="loading-widget text-primary">
            <i class="fa fa-fw fa-spinner fa-spin"></i>
        </div>

        <canvas id="chart-age"></canvas>
    </div>
</div>

@section('js')
    @parent
    <script type="text/javascript" charset="utf-8">
        $(function ()
        {
            var chart;

            initToolbarDateRange('#box-age .daterange', updateChart);

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

                $('#box-age .loading-widget').show();
                doAjax('/api/analytics/age', {
                    'start': start, 'end': end,
                }, createBarChart);
            }

            function createBarChart(data)
            {
                // total page views and visitors line chart
                var ctx = document.getElementById("chart-age").getContext("2d");

                console.log(data);

//                var data = {
//                    labels: ["January", "February", "March"],
//                    datasets: [
//                        {
//                            label: "My First dataset",
//                            fillColor: "rgba(220,220,220,0.5)",
//                            strokeColor: "rgba(220,220,220,0.8)",
//                            highlightFill: "rgba(220,220,220,0.75)",
//                            highlightStroke: "rgba(220,220,220,1)",
//                            data: [65, 59, 80]
//                        }
//                    ]
//                };

                console.log(data);

                chart = new Chart(ctx).Bar(data, {});

                $('#box-age .loading-widget').slideUp();
            }

            setTimeout(function ()
            {
                updateChart();
            }, 300);
        })
    </script>
@endsection
