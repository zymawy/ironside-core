@extends('ironside::layouts.dashboard.app')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-primary card-solid">
                <div class="card-header bg-primary with-border">
                    <h3 class="card-title">
                        <span><i class="fa fa-table"></i></span>
                        <span>
                            {{ trans('ironside::dashboard/indexes.list_all_website_action')  }}
                        </span>
                    </h3>

                    <div class="pull-right card-tools">
                        <button type="button" class="btn btn-default btn-sm" data-widget="collapse">
                            <i class="fa fa-minus"></i>
                        </button>
                    </div>
                </div>

                <div class="card-body">
                    <table id="tbl-list-actions" data-order-by="0|desc" data-server="false" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>{{ trans('ironside::dashboard/forms.id') }}</th>
                            <th>{{ trans('ironside::dashboard/forms.type') }}</th>
                            <th>{{ trans('ironside::dashboard/forms.description') }}</th>
                            <th>{{ trans('ironside::dashboard/indexes.created') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($actions as $action)
                            <tr>
                                <td>{!! $action->id !!}</td>
                                <td>{!! $action->title !!}</td>
                                <td>{!! $action->description !!}</td>
                                <td>{{ $action->created_at->diffForHumans() }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    @parent
    <script type="text/javascript" charset="utf-8">
        $(function ()
        {
            initDataTables('#tbl-list-actions', {
                'pageLength': 25,
                'columnDefs': [
                    {
                        "targets": [0],
                        "visible": false,
                        "searchable": false
                    },
                ]
            });
        })
    </script>
@endsection