<table class="table-pagination table table-striped table-bordered" cellspacing="0" width="100%">
    <thead>
    <tr>
        <th>
            {{ trans('ironside::dashboard/indexes.full_name') }}
        </th>
        <th>
            {{ trans('ironside::dashboard/indexes.cell_phone') }}
            </th>
        <th>
            {{ trans('ironside::dashboard/indexes.email') }}
        </th>
        <th>
            {{ trans('ironside::dashboard/indexes.roles') }}
        </th>
        <th>{{ trans('ironside::dashboard/indexes.action') }}</th>
    </tr>
    </thead>
    <tbody>
    @foreach($paginator as $item)
        <tr>
            <td>{{ $item->fullname }}</td>
            <td>{{ $item->cellphone }}</td>
            <td>{{ $item->email }}</td>
            <td>{{ $item->roles_string }}</td>
            <td>

                <div class="btn-group">
                    <a href="/dashboard/accounts/clients/{{$item->id}}" class="btn btn-default btn-xs" data-toggle="tooltip" title="{{trans('ironside::dashboard/indexes.show') . $item->fullname}}">
                        <i class="fa fa-eye"></i>
                    </a>
                </div>

                <div class="btn-group">
                    <a href="/dashboard/accounts/clients/{{$item->id}}/edit" class="btn btn-primary btn-xs" data-toggle="tooltip" title="{{trans('ironside::dashboard/indexes.edit') . $item->fullname }}">
                        <i class="fa fa-edit"></i>
                    </a>
                </div>

                <div class="btn-group">
                    <form id="form-delete-row{{ $item->id }}" method="POST" action="/admin/accounts/clients/{{ $item->id }}">
                        <input name="_method" type="hidden" value="DELETE">
                        <input name="_token" type="hidden" value="{{ csrf_token() }}">
                        <input name="_id" type="hidden" value="{{ $item->id }}">
                        <a data-form="form-delete-row{{ $item->id }}" class="btn btn-danger btn-xs btn-delete-row" data-toggle="tooltip" title="{{trans('ironside::dashboard/indexes.delete') . $item->fullname }}">
                            <i class="fa fa-trash"></i>
                        </a>
                    </form>
                </div>

                @if ($item->confirmed_at)
                    <div class="btn-group">
                        <form id="impersonate-login-form-{{$item->id}}" action="{{route('impersonate.login', $item->id)}}" method="post">
                            <input name="_token" type="hidden" value="{{csrf_token()}}">
                            <input name="redirect_to" type="hidden" value="/{{$item->logged_in_as}}">
                            <a data-form="impersonate-login-form-{{$item->id}}" class="btn btn-warning btn-xs btn-confirm-modal-row" data-toggle="tooltip" title="{{trans('ironside::dashboard/indexes.impersonate') . $item->fullname }}">
                                <i class="fa fa-user-secret"></i>
                            </a>
                        </form>
                    </div>
                @endif

                <div class="btn-group">
                    <span class="label label-{{ $item->confirmed_at ? 'success':'warning' }}">
                        {{ $item->confirmed_at ?  trans('ironside::dashboard/indexes.confirmed') . $item->confirmed_at->format('d M Y') : trans('ironside::dashboard/indexes.confirmed_yat') }}
                    </span>
                </div>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

@include('ironside::dashboard.partials.pagination_footer')