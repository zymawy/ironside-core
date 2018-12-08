@extends('layouts.dashboard.app')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-primary box-solid">
                <div class="card-header with-border">
                    <h3 class="card-title">
                        <span><i class="fa fa-table"></i></span>
                        <span>
                            {{ trans('ironside::dashboard/indexes.list_all_document')  }}
                        </span>
                    </h3>
                </div>

                <div class="card-body">

                    @include('dashboard.partials.info')

                    <table id="tbl-list" data-server="false" data-page-length="25" class="dt-table table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>{{ trans('ironside::dashboard/forms.name') }}</th>
                            <th>{{ trans('ironside::dashboard/indexes.belongs_to') }}</th>
                            <th>{{ trans('ironside::dashboard/indexes.document') }}</th>
                            <th>{{ trans('ironside::dashboard/indexes.created') }}</th>
                            <th>{{ trans('ironside::dashboard/indexes.action') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($items as $item)
                            <tr>
                                <td>{{ $item->name }} {{ $item->is_cover? '(Cover)':'' }}</td>
                                <td>{{ ($item->documentable? $item->documentable->name:'-') }}</td>
                                <td>
                                    <a target="_blank" href="{{ $item->url }}">
                                        <img style="height: 50px;" src="{{ $item->url }}" title="{{ $item->name }}">
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