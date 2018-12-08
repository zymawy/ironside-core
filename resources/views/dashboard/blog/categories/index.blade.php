@extends('ironside::layouts.dashboard.app')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-primary card-solid">
                <div class="card-header with-border">
                    <h3 class="card-title">
                        <span><i class="fa fa-table"></i></span>
                        <span>
                            {{ trans('ironside::dashboard/indexes.list_all_articles_cat')  }}
                        </span>
                    </h3>
                </div>

                <div class="card-body">

                    @include('ironside::dashboard.partials.info')
                    <hr>
                    @include('ironside::dashboard.partials.toolbar')
                    <hr>
                    <table id="tbl-list" data-server="false" class="dt-table table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>{{ trans('ironside::dashboard/forms.name') }}</th>
                            <th>{{ trans('ironside::dashboard/forms.slug') }}</th>
                            <th>{{ trans('ironside::dashboard/indexes.created')  }}</th>
                            <th>{{ trans('ironside::dashboard/indexes.action')  }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($items as $item)
                            <tr>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->slug }}</td>
                                <td>{{ format_date($item->created_at) }}</td>
                                <td>{!! action_row($selectedNavigation->url, $item->id, $item->name, ['edit', 'delete']) !!}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection