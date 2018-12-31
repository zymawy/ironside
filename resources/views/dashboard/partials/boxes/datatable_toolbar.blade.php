<h3 class="card-title">
    <span><i class="fa fa-table"></i></span>
    <span>{{ isset($title)? $title:'DataTable' }}
        ({{ $fromDate->format('l, d F') }} - {{ $toDate->format('l, d F') }})
    </span>
</h3>

<div class="pull-right box-tools">
    <a href="{{ request()->url() }}/datatable/reset" class="btn btn-flat btn-success btn-sm" data-toggle="tooltip" title="{{ trans('dashboard/analytics.reset-date-filter') }}">
        <i class="fa fa-refresh"></i>
    </a>

    <button type="button" class="btn btn-flat btn-success btn-sm daterange" data-toggle="tooltip" title="{{ trans('dashboard/analytics.date-range') }}">
        <i class="fa fa-calendar"></i>
    </button>

    <button type="button" class="btn btn-pink btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse">
        <i class="fa fa-minus"></i>
    </button>
</div>

@section('js')
    @parent
    <script type="text/javascript" charset="utf-8">
        $(function ()
        {
            initDateRangeLatest('#js-box-datatable .daterange', updateDatatables);

            function updateDatatables(start, end)
            {
                doAjax('{{ request()->url() }}/datatable/dates', {
                    'date_from': start, 'date_to': end,
                }, function ()
                {
                    location.reload();
                });
            }
        })
    </script>
@endsection