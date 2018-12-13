@extends('ironside::layouts.dashboard.app')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-solid">
                <div class="card-header with-border bg-primary">
                    <h3 class="card-title">
                        <span><i class="fa fa-table"></i></span>
                        <span>
                            {{ trans('ironside::dashboard/indexes.list_all_banners')  }}
                        </span>
                    </h3>
                </div>

                <div class="card-body">

                    @include('ironside::dashboard.partials.info')

                    @include('ironside::dashboard.partials.toolbar')

                    <table id="tbl-list" data-server="false" class="dt-table table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>{{ trans('ironside::dashboard/indexes.banner')  }}</th>
                            <th>{{ trans('ironside::dashboard/indexes.summary')  }}</th>
                            <th>{{ trans('ironside::dashboard/indexes.button')  }}</th>
                            <th>{{ trans('ironside::dashboard/forms.action_from')  }}</th>
                            <th>{{ trans('ironside::dashboard/forms.action_to')  }}</th>
                            <th>{{ trans('ironside::dashboard/indexes.image')  }}</th>
                            <th>{{ trans('ironside::dashboard/indexes.website')  }}</th>
                            <th>{{ trans('ironside::dashboard/indexes.action')  }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($items as $item)
                            <tr>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->summary }}</td>
                                <td>
                                    <a target="_blank" href="{{ $item->action_url }}">{{ $item->action_name }}</a>
                                </td>
                                <td>{{ format_date($item->active_from) }}</td>
                                <td>{{ isset($item->active_to)? format_date($item->active_to):'-' }}</td>
                                <td>{!! image_row_link($item->image_thumb, $item->image) !!}</td>
                                <td>{{ $item->is_website ? trans('ironside::dashboard/general.yes'):trans('ironside::dashboard/general.no') }}</td>
                                <td>{!! action_row($selectedNavigation->url, $item->id, $item->title, ['show', 'edit', 'delete']) !!}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection