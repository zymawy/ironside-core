@extends('ironside::layouts.dashboard.app')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-primary card-solid">
                <div class="card-header with-border">
                    <h3 class="card-title">
                        <span><i class="fa fa-table"></i></span>
                        <span>List All Banners</span>
                    </h3>
                </div>

                <div class="card-body">

                    @include('ironside::dashboard.partials.info')

                    @include('ironside::dashboard.partials.toolbar')

                    <table id="tbl-list" data-server="false" class="dt-table table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>Banner</th>
                            <th>Summary</th>
                            <th>Button</th>
                            <th>Active From</th>
                            <th>Active To</th>
                            <th>Image</th>
                            <th>Website</th>
                            <th>Action</th>
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
                                <td>{{ $item->is_website ? 'Yes':'No' }}</td>
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