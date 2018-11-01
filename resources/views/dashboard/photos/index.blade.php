@extends('ironside::layouts.dashboard.app')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-primary card-solid">
                <div class="card-header bg-ironside">
                    <h3 class="card-title">
                        <span><i class="fa fa-table"></i></span>
                        <span>List All Photos</span>
                    </h3>
                </div>

                <div class="card-body">

                    @include('ironside::dashboard.partials.info')

                    <table id="tbl-list" data-server="false" class="dt-table table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Category</th>
                            <th>Image</th>
                            <th>Created</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($items as $item)
                            <tr>
                                <td>{{ $item->name }} {{ $item->is_cover? '(Cover)':'' }}</td>
                                <td>{{ ($item->photoable)? $item->photoable->name:'' }}</td>
                                <td>
                                    <a target="_blank" href="{{ $item->url }}">
                                        <img style="height: 50px;" src="{{ $item->urlForName($item->thumb) }}" title="{{ $item->name }}">
                                    </a>
                                </td>
                                <td>{{ $item->created_at->format('d M Y') }}</td>
                                <td>{!! action_row($selectedNavigation->url, $item->id, $item->name, ['delete']) !!}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection