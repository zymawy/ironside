<html>
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('/css/dashboard/theme.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/dashboard/datatable.css') }}">
</head>
<body>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header bg-primary">
                <h3 class="card-title text-white">
                    <span><i class="fa fa-table"></i></span>
                    <span>List All {{ ucfirst(str_plural($resource)) }}</span>
                </h3>
            </div>

            <div class="card-body">

                @include('DH::partials.info')

                @include('DH::partials.toolbar', ['order' => true])
                <div class="table-responsive">
                    <table id="tbl-list" data-page-length="25" data-server="{{$ajax}}" class="dt-table table dataTable" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>Title</th>
                            <th class="desktop">Description</th>
                            <th>Slug</th>
                            <th>Url</th>
                            <th>Parent</th>
                            {{--<th>Roles</th>--}}
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($items as $item)
                            <tr>
                                <td>{{ $item->title }}</td>
                                <td>{!! $item->description !!}</td>
                                <td>{{ $item->slug }}</td>
                                <td>{{ $item->url }}</td>
                                <td>{{ ($item->parent)? $item->parent->title : '-' }}</td>
                                {{--                                <td>{{ $item->rolesString }}</td>--}}
                                <td>
                                    {!! action_row($selectedNavigation->url, $item->id, $item->title, ['edit', 'delete']) !!}
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


<script src="/js/dashboard/app.js"></script>
{{--<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>--}}
<script src="/js/dashboard/datatable.js"></script>
{{--<script src="/js/dashboard/theme.js"></script>--}}
<script>
    /* Set the defaults for DataTables initialisation */
    $.extend(true, $.fn.dataTable.defaults, {
        "oClasses": {
            "sFilter": 'dataTables_filter input-group',
        },
        "oLanguage": {
            "sLengthMenu": "_MENU_",
            "sSearch": "",
            "sInfo": "Showing <span class='txt-color-darken'>_START_</span> to <span class='txt-color-darken'>_END_</span> of <span class='text-primary'>_TOTAL_</span> entries",
            "sInfoEmpty": "<span class='text-danger'>Showing 0 to 0 of 0 entries</span>",
            "sSearch": "<span class='input-group-addon'><i class='glyphicon glyphicon-search'></i></span> "
        }
    });

    $(function ()
    {
        $('.dt-table').each(function ()
        {
            var id = $(this).attr('id');
            var ajax = $(this).attr('data-server');
            if (ajax == 'false') {
                var pageLength = $(this).attr('data-page-length');
                initDataTables('#' + id, {
                    iDisplayLength : pageLength ? 10 : pageLength
                });
            }
        })

        initActionDeleteClick();
    });

    function initDatatablesAjax(selector, url, columns, displayLength)
    {
        displayLength = (displayLength ? displayLength : 10);
        return initDataTables(selector, {
            ajax: url,
            processing: true,
            serverSide: true,
            columns: columns,
            iDisplayLength: (displayLength ? displayLength : 10),
            aLengthMenu: [[displayLength, 25, 50, -1], [displayLength, 25, 50, "All"]]
        });
    }

    function initDataTables(selector, options)
    {
        var options = (options ? options : {});
        options.responsive = true;
        options.order = getOrderBy(selector);
        // options.aLengthMenu = [[15, 25, 50, -1], [15, 25, 50, "All"]];
        // options.iDisplayLength = 15;
        options.sDom = "<'dt-toolbar'<'col-lg-12 col-sm-6'f><'col-sm-6 col-lg-12 hidden-xs'l>r>" +
            "t" +
            "<'dt-toolbar-footer'<'col-sm-6 col-lg-12 hidden-xs'i><'col-lg-12 col-sm-6'p>>";
        options.drawCallback = function(settings) {
            $('[data-toggle="tooltip"]').tooltip();
        }

        // datatable
        var table = $(selector).DataTable(options);

        // reregister the tooltip events on table
        table.$('[data-toggle="tooltip"]').tooltip();

        return table;
    }

    function getOrderBy(element)
    {
        var orderByVal = $(element).attr('data-order-by');

        var orderBy = [0, 'asc'];
        if (!(orderByVal == 'false' || orderByVal == false || orderByVal == undefined)) {
            var pieces = orderByVal.split('|');
            if (pieces.length == 1) {
                orderBy = [pieces[0], 'asc'];
            }
            else if (pieces.length == 2) {
                orderBy = [pieces[0], pieces[1]];
            }
        }

        return orderBy;
    }

    function initActionDeleteClick(element)
    {
        $('.dt-table').off('click', '.btn-delete-row');
        $('.dt-table').off('click', '.btn-confirm-modal-row');
        if(element) {
            element.off('click', '.btn-delete-row');
            element.off('click', '.btn-confirm-modal-row');
        }

        // DELETE ROW LINK
        $('.dt-table').on('click', '.btn-delete-row', onActionDeleteClick);
        $('.dt-table').on('click', '.btn-confirm-modal-row', onConfirmRowlick);

        if(element) {
            element.on('click', '.btn-delete-row', onActionDeleteClick);
            element.on('click', '.btn-confirm-modal-row', onConfirmRowlick);
        }

        function onActionDeleteClick(e)
        {
            e.preventDefault();
            var formId = $(this).attr('data-form');
            var title = $(this).attr('data-original-title');
            if (title.length > 7) {
                title = '<strong>' + title.substring(0, 6).toLowerCase() + '</strong> the <strong>' + title.slice(7) + '</strong>';
            }

            var content = "Are you sure you want to " + title + " entry? ";
            $('#modal-confirm').find('.modal-body').find('p').html(content);
            $('#modal-confirm').find('.modal-footer').find('.btn-primary').on('click', function (e)
            {
                $('#' + formId).submit();
            });
            $('#modal-confirm').modal('show');

            return false;
        }

        function onConfirmRowlick(e)
        {
            e.preventDefault();
            var formId = $(this).attr('data-form');
            var title = $(this).attr('data-original-title');
            title = '<strong>' + title + '</strong>';

            var content = "Are you sure you want to " + title + "? ";
            $('#modal-confirm').find('.modal-body').find('p').html(content);
            $('#modal-confirm').find('.modal-footer').find('.btn-primary').on('click', function (e)
            {
                $('#' + formId).submit();
            });
            $('#modal-confirm').modal('show');
            return false;
        }
    }
</script>
</body>
</html>
