@extends('ironside::layouts.dashboard.app')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-primary box-solid">
                <div class="card-header  bg-primary with-border">
                    <h3 class="card-title text-white">
                        <span class="widget-icon"><i class="fa fa-user-plus"></i></span>
                        <span>
                            {{ trans('ironside::dashboard/indexes.invite_admin_test_inside') }}
                        </span>
                    </h3>
                </div>

                <div class="box-body no-padding">
                    <form id="form-settings-administrators" method="POST" action="{{ request()->url() }}">
                        {!! csrf_field() !!}
                        <input type="hidden" name="invited_by" value="">

                        <fieldset>
                            <section class="form-group {{ form_error_class('email', $errors) }}">
                                <label for="id-email">
                                    {{ trans('ironside::dashboard/indexes.email_to_send_text') }}
                                </label>
                                <input type="text" class="form-control" id="id-email" name="email"
                                       placeholder="{{ trans('ironside::dashboard/forms.email_placeholder') }}" value="{{ old('email') }}">
                                {!! form_error_message('email', $errors) !!}
                            </section>
                        </fieldset>

                        <div class="form-footer">
                            <button type="submit" class="btn btn-primary btn-submit">
                                {{ trans('ironside::dashboard/indexes.send_invite') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card card-primary box-solid">
                <div class="card-header bg-primary with-border">
                    <h3 class="card-title text-white">
                        <span class="widget-icon"><i class="fa fa-users"></i></span>
                        <span>All Invited Adminstrators</span>
                    </h3>
                </div>

                <div class="card-body">
                    <table id="tbl-list" data-server="false" class="dt-table table nowrap table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th><i class="fa fa-fw fa-envelope text-muted"></i> {{ trans('ironside::dashboard/forms.email') }}</th>
                            <th><i class="fa fa-fw fa-user text-muted"></i> {{ trans('ironside::dashboard/indexes.invited_by') }}</th>
                            <th><i class="fa fa-fw fa-calendar"></i> {{ trans('ironside::dashboard/indexes.created') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($items as $user)
                            <tr>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->invitedBy->fullname }}</td>
                                <td>
                                    {{ $user->created_at }}
                                    <span class="label label-{{ $user->claimed_at ? 'success':'warning' }}">
                                        {{ $user->claimed_at ? trans('ironside::dashboard/indexes.claimed_on') . $user->claimed_at->format('d M Y') : trans('ironside::dashboard/indexes.confirmed_yat') }}
                                    </span>
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