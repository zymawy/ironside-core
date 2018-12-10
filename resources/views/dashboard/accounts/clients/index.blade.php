@extends('ironside::layouts.dashboard.app')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header  gradient-z-12">
                    <h3 class="card-title text-white">
                        <span><i class="fa fa-table"></i></span>
                        <span>
                            {{ trans('ironside::dashboard/indexes.list_all_clients') }}
                        </span>
                    </h3>
                </div>

                <div class="card-body">
                    @include('ironside::dashboard.partials.info')

                    <div class="card card-inverse card-block bg-faded">
                        <form id="js-form-filters">
                            {!! csrf_field() !!}

                            <div class="row filters">
                                <div class="col-sm-6 col-md-3">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-user-circle-o"></i></span>
                                        <input id="filter_name" type="text" class="form-control"
                                               placeholder="{{ trans('ironside::dashboard/indexes.client_name') }}" name="name">
                                    </div>
                                </div>

                                <div class="col-sm-6 col-md-3">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-mobile-phone"></i></span>
                                        <input id="filter_cellphone" type="text" class="form-control"
                                               placeholder="{{ trans('ironside::dashboard/forms.cellphone') }}" name="cellphone">
                                    </div>
                                </div>

                                <div class="col-sm-6 col-md-3">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-envelope-o"></i></span>
                                        <input id="filter_email" type="text" class="form-control" placeholder="{{ trans('ironside::dashboard/forms.email') }}" name="email">
                                    </div>
                                </div>

                                <div class="col-md-2 col-sm-2">
                                    <a href="{{ request()->url() }}" class="btn btn-default btn-ajax-submit" data-toggle="tooltip" title="{{ trans('ironside::dashboard/forms.refresh_filters') }}">
                                        <i class="fa fa-refresh"></i>
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="pagination-card">
                        @include('ironside::dashboard.accounts.clients.pagination')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
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