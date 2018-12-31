@section('css')
@parent
<style>
  .small-box h3, .small-box p {
      z-index: 9999999999;
  }
  .small-charts {
      width: 120px !important;
      height: 85px;
  }
  .small-box .icon-chart {
      position: absolute;
      top: 8px;
      right: 0px;
      z-index: 0;
  }
</style>
@endsection

<div class="row">
    <div class="col-md-3">
        <div class="card p-30 bg-warning">
            <div class="media inner">
                <div class="media-left meida media-middle">
                    {{--<span><i class="fa fa-usd f-s-40 color-primary"></i></span>--}}
                    <div class="icon-chart">
                        <canvas class="small-charts" id="chart-visitors"></canvas>
                    </div>
                </div>
                <div class="media-body media-text-right text-white">
                    <h2 class="text-white" id="visitors"></h2>
                    <p class="m-b-0 text-white">
                        {{ trans('dashboard/analytics.visitors-this-month') }}
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card p-30 bg-gradient-success">
            <div class="media">
                <div class="media-left meida media-middle">
                    {{--<span><i class="fa fa-shopping-cart f-s-40 color-success"></i></span>--}}
                    <div class="icon-chart">
                        <canvas class="small-charts" id="chart-unique-visitors"></canvas>
                    </div>
                </div>
                <div class="media-body media-text-right text-white">
                    <h2 class="text-white" id="unique-visitors">&nbsp;</h2>
                    <p class="m-b-0 text-white">
                        {{ trans('dashboard/analytics.unique-visitors-this-month') }}
                    </p>
                </div>

            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card p-30 bg-pink">
            <div class="media">
                <div class="media-left meida media-middle">
                    {{--<span><i class="fa fa-shopping-cart f-s-40 color-success"></i></span>--}}
                    <div class="icon-chart">
                        <canvas class="small-charts" id="chart-bounce-rate"></canvas>
                    </div>
                </div>
                <div class="media-body media-text-right text-white">
                    <h2 class="text-white" id="bounce-rate">&nbsp;</h2>
                    <p class="m-b-0 text-white">
                        {{ trans('dashboard/analytics.bounce-rate-this-month') }}
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card p-30 bg-gradient-danger">
            <div class="media">
                <div class="media-left meida media-middle">
                    {{--<span><i class="fa fa-shopping-cart f-s-40 color-success"></i></span>--}}
                    {{--<div class="icon">--}}
                        {{--<i class="ion ion-speedometer"></i>--}}
                    {{--</div>--}}
                </div>
                <div class="media-body media-text-right text-white">
                    <h2 class="text-white" id="page-load">&nbsp;</h2>
                    <p class="m-b-0 text-white">
                        {{ trans('dashboard/analytics.avg-page-load') }}
                    </p>
                </div>
            </div>
        </div>
    </div>

    @if(isset($activeUsers))
        <div class="col-md-3">
            <div class="card p-30 bg-gradient-secondary">
                <div class="media">
                    <div class="media-left meida media-middle">
                        {{--<span><i class="fa fa-shopping-cart f-s-40 color-success"></i></span>--}}
                        {{--<div class="icon">--}}
                            {{--<i class="ion ion-person"></i>--}}
                        {{--</div>--}}
                    </div>
                    <div class="media-body media-text-right text-white">
                        <h2 class="text-white" id="page-active-visitors">&nbsp;</h2>
                        <p class="m-b-0 text-white">
                            {{ trans('dashboard/analytics.current-active-visitors') }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>

@section('js')
    @parent
    <script type="text/javascript" charset="utf-8">
        $(function () {
            function getMonthlySummary()
            {
                doAjax('/api/analytics/visitors', null, function (response) {
                    $('#visitors').html(response.data['month']['value']);
                    doughnutChart('chart-visitors', response.data);
                });
                doAjax('/api/analytics/unique-visitors', null, function (response) {
                    $('#unique-visitors').html(response.data['month']['value']);
                    doughnutChart('chart-unique-visitors', response.data);
                });
                doAjax('/api/analytics/bounce-rate', null, function (response) {
                    response.data['month']['value'] = parseFloat(response.data['month']['value']).toFixed(2);
                    response.data['last_month']['value'] = parseFloat(response.data['last_month']['value']).toFixed(2);
                    $('#bounce-rate').html(response.data['month']['value'] + '<sup style="font-size: 20px">%</sup>');
                    doughnutChart('chart-bounce-rate', response.data);
                });
                doAjax('/api/analytics/page-load', null, function (response) {
                    $('#page-load').html(parseFloat(response.data).toFixed(0) + '<sup style="font-size: 20px">sec</sup>');
                });
                doAjax('/api/analytics/active-visitors', null, function (response) {
                    $('#page-active-visitors').html(parseFloat(response.data).toFixed(0));
                });
            }
            function doughnutChart(id, data)
            {
                // total page views and visitors line chart
                var ctx = document.getElementById(id).getContext("2d");
                var chart = new Chart(ctx).Doughnut(data, {});
            }
            getMonthlySummary();
        })
    </script>
@endsection
