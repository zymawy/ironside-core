<div class="card" id="box-visited-pages" style="min-height: 400px;">
    <div class="card-header with-border bg-primary">
        <h3 class="box-title">
            <span><i class="fa fa-codepen"></i></span>
            <span>{{ trans('ironside::dashboard/analytics.most-visited-pages') }}</span>
        </h3>

        @include('ironside::dashboard.partials.boxes.toolbar')
    </div>

    <div class="card-body">
        <div class="loading-widget text-primary">
            <i class="fa fa-fw fa-spinner fa-spin"></i>
        </div>

        <table id="tbl-visited-pages" data-order-by="1|desc" class="table nowrap table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
            <tr>
                <th>{{ trans('ironside::dashboard/analytics.visited-pages') }}</th>
                <th>{{ trans('ironside::dashboard/analytics.sessions') }}</th>
            </tr>
            </thead>
            <tbody></tbody>
        </table>
    </div>
</div>

@section('js')
    @parent
    <script type="text/javascript" charset="utf-8">
        $(function ()
        {
            var datatable;

            initToolbarDateRange('#box-visited-pages .daterange', updateVisitedPages);

            function updateVisitedPages(start, end)
            {
                $('#box-visited-pages .loading-widget').show();

                if (datatable) {
                    datatable.destroy();
                    $('#box-visited-pages table tbody').html('')
                }

                if (!start) {
                    start = moment().subtract(29, 'days').format('YYYY-MM-DD');
                    end = moment().format('YYYY-MM-DD');
                }

                doAjax('/api/analytics/visited-pages', {
                    'start': start, 'end': end,
                }, renderTableVisitedPages);
            }

            function renderTableVisitedPages(data)
            {
                $('#box-visited-pages .loading-widget').slideUp();

                for (var i = 0; i < data.length; i++) {
                    var html = '<tr><td>' + data[i]['url'] + '</td><td>' + data[i]['pageViews'] + '</td></tr>';
                    $('#box-visited-pages table tbody').append(html);
                }

                datatable = initDataTables('#tbl-visited-pages');
            }

            setTimeout(function ()
            {
                updateVisitedPages();
            }, 300);
        })
    </script>
@endsection
