@extends('ironside::layouts.dashboard.app')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-primary">
                <div class="card-header bg-primary with-border">
                    <h3 class="card-title text-white">
                        <span><i class="fa fa-table"></i></span>
                        <span>List All Roles</span>
                    </h3>
                </div>

                <div class="card-body">

                    @include('ironside::dashboard.partials.info')

                    @include('ironside::dashboard.partials.toolbar')

                    <table id="tbl-list" data-server="false" class="dt-table table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Slug</th>
                            <th>Keyword</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($items as $item)
                            <tr>
                                <td><i class="fa fa-{{ $item->icon }}"></i> {{ $item->name }}</td>
                                <td>{{ $item->slug }}</td>
                                <td>{{ $item->keyword }}</td>
                                <td>
                                    @if(!config('app.is_preview'))
                                        {!! action_row($selectedNavigation->url, $item->id, $item->name, ['edit', 'delete']) !!}
                                    @else
                                        <span class="label label-warning">{{ $item->name }} Role is needed</span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection