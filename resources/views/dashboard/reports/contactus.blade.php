@extends('ironside::layouts.dashboard.app')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-primary" id="box-main-chart">
                <div class="card-header bg-primary with-border">
                    <h3 class="card-title text-white">
                        <span><i class="fa fa-comment-o"></i></span>
                        <span>Contact Us</span>
                    </h3>

                    @include('ironside::dashboard.partials.boxes.toolbar')
                </div>

                <div class="box-body">

                    @include('ironside::dashboard.partials.charts.linechart', [
                        'id' => 'box-main-chart',
                    ])

                    <hr/>

                    <table data-order-by="4|desc" id="main-datatable" class="table table-striped table-bordered" width="100%">
                        <thead>
                        <tr>
                            <th>Fullname</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Content</th>
                            <th>Created On</th>
                        </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    @parent
    <script type="text/javascript" charset="utf-8">
        function onUpdate(start, end)
        {
            datatable = initDatatablesAjax('#main-datatable', "{{ request()->url() }}" + "/datatable?date_from=" + start + '&date_to=' + end, [
                {data: 'fullname', name: 'fullname'},
                {data: 'phone', name: 'phone'},
                {data: 'email', name: 'email'},
                {data: 'content', name: 'content'},
                {data: 'date', name: 'date'},
            ]);
        }
    </script>
@endsection
