@extends('ironside::layouts.dashboard.app')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card box-solid">
                <div class="card-header bg-primary with-border">
                    <h3 class="card-title text-white">
                        <span><i class="fa fa-users"></i></span>
                        <span>{{ trans('ironside::dashboard/general.list_all') }} {{ ucfirst(str_plural($resource)) }}</span>
                    </h3>
                </div>

                <div class="card-body">

                    @include('ironside::dashboard.partials.info')

                    <div class="well well-sm well-toolbar">
                        <a class="btn btn-labeled btn-primary" href="{{ request()->url().'/invites' }}">
                            <span class="btn-label"><i class="fa fa-fw fa-user-plus"></i></span>
                            {{ trans('ironside::dashboard/indexes.invite_admin_test') }}
                        </a>
                    </div>

                    <table id="tbl-list" data-server="false" data-page-length="25" class="dt-table table nowrap table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th><i class="fa fa-fw fa-user text-muted"></i> {{ trans('ironside::dashboard/forms.name') }} </th>
                            <th><i class="fa fa-fw fa-envelope text-muted"></i> {{ trans('ironside::dashboard/forms.email') }}</th>
                            <th><i class="fa fa-fw fa-mobile-phone text-muted"></i>  {{ trans('ironside::dashboard/forms.cellphone') }}</th>
                            <th>{{ trans('ironside::dashboard/forms.gender') }}</th>
                            <th>{{ trans('ironside::dashboard/forms.roles') }}</th>
                            <th><i class="fa fa-fw fa-calendar text-muted"></i> {{ trans('ironside::dashboard/indexes.last_login') }} </th>
                            <th>{{ trans('ironside::dashboard/indexes.action') }} </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($items as $item)
                            <tr>
                                <td>{{ $item->fullname }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->cellphone }}</td>
                                <td>{{ $item->gender }}</td>
                                <td>{{ $item->roles_string }}</td>
                                <td>{{ ($item->logged_in_at)? $item->logged_in_at->diffForHumans():'-' }}</td>
                                <td>
                                    <div class="btn-toolbar">
                                        @if($item->confirmed_at)
                                            <div class="btn-group">
                                                <form id="impersonate-login-form-{{ $item->id }}" action="{{ route('impersonate.login', $item->id) }}" method="post">
                                                    <input name="_token" type="hidden" value="{{ csrf_token() }}">
                                                    <a data-form="impersonate-login-form-{{ $item->id }}" class="btn btn-warning btn-xs btn-confirm-modal-row" data-toggle="tooltip"
                                                       title="{{trans('ironside::dashboard.indexes.impersonate') . $item->fullname }}">
                                                        <i class="fa fa-user-secret"></i>
                                                    </a>
                                                </form>
                                            </div>
                                        @endif

                                        {!! action_row($selectedNavigation->url, $item->id, $item->fullname, ['edit', 'delete'], false) !!}

                                        <div class="btn-group">
                                            <span class="label label-{{ $item->confirmed_at ? 'success':'warning' }}">
                                                {{ $item->confirmed_at ? trans('ironside::dashboard/indexes.impersonate') . $item->confirmed_at->format('d M Y') : trans('ironside::dashboard/indexes.confirmed_yat') }}
                                            </span>
                                        </div>
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