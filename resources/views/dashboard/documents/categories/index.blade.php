@extends('ironside::layouts.dashboard.app')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-primary box-solid">
                <div class="card-header bg-primary with-border">
                    <h3 class="card-title">
                        <span><i class="fa fa-table"></i></span>
                        <span>
                            {{ trans('ironside::dashboard/indexes.list_all_document_cat')  }}
                        </span>
                    </h3>
                </div>

                <div class="card-body">

                    @include('ironside::dashboard.partials.info')

                    @include('ironside::dashboard.partials.toolbar')

                    <table id="tbl-list" data-server="false" class="dt-table table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>{{ trans('ironside::dashboard/forms.title')  }}</th>
                            <th>{{ trans('ironside::dashboard/forms.total_document')  }}</th>
                            <th>{{ trans('ironside::dashboard/forms.document')  }}</th>
                            <th>{{ trans('ironside::dashboard/forms.created')  }}</th>
                            <th>{{ trans('ironside::dashboard/forms.action')  }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($items as $item)
                            <tr>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->documents->count() }}</td>
                                <td>
                                    @foreach($item->documents as $document)
                                        <a href="{{ $document->url }}">{{ $document->name }}</a>{{ $loop->last?'':' | ' }}
                                    @endforeach
                                </td>
                                <td>{{ $item->created_at->format('d M Y') }}</td>
                                <td>
                                    <div class="btn-toolbar">
                                        <div class="btn-group">
                                            <a href="/dashboard/documents/category/{{ $item->id }}" class="btn btn-info btn-xs" data-toggle="tooltip"
                                               title="{{trans('ironside::dashboard/indexes.add_document_to') . $item->name }}">
                                                <i class="fa fa-files-o"></i>
                                            </a>
                                        </div>
                                        {!! action_row($selectedNavigation->url, $item->id, $item->name, ['edit', 'delete'], false) !!}
                                    </div>
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