@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header  gradient-z-12">
                    <h3 class="card-title text-white">
                        <span><i class="fa fa-table"></i></span>
                        <span>
                            {{ trans('dashboard/indexes.list_all_clients') }}
                        </span>
                    </h3>
                </div>

                <div class="card-body">
                    @include('DH::partials.info')
                    <div class="well well-sm well-toolbar m-t-30 m-b-30">
                        <a class="btn btn-labeled btn-primary" href="{{ request()->url().'/create' }}">
                            <span class="btn-label"><i class="fa fa-fw fa-user-plus"></i></span>
                            {{ trans('dashboard/forms.create_user_text_user') }}
                        </a>
                    </div>

                    <div class="pagination-card">
                        @include('DH::accounts.clients.pagination')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    @parent
    <script type="text/javascript" charset="utf-8">
        $(function () {
            var pagination = new PaginationClass({
                onComplete: onPaginationComplete
            });

            function onPaginationComplete()
            {
                $('[data-toggle="tooltip"]').tooltip();
                initActionDeleteClick($('.table-pagination'));
            }

            onPaginationComplete();

            $('#filter_name').on("propertychange change click keyup input paste", onFilterFieldChange);
            $('#filter_cellphone').on("propertychange change click keyup input paste", onFilterFieldChange);
            $('#filter_email').on("propertychange change click keyup input paste", onFilterFieldChange);

            var filterTimeout;

            function onFilterFieldChange()
            {
                var elem = $(this);
                if (elem.data('oldVal') != elem.val()) {
                    clearTimeout(filterTimeout);
                    elem.data('oldVal', elem.val());
                    filterTimeout = setTimeout(function () {
                        filterEntries();
                    }, 500);
                }
            }

            function filterEntries()
            {
                doAjax('/dashboard/accounts/clients/filter', {
                    name: $('#filter_name').val(),
                    cellphone: $('#filter_cellphone').val(),
                    email: $('#filter_email').val(),
                }, function (response) {
                    pagination.showPage(1, true);
                });
            }
        })
    </script>
@endsection
