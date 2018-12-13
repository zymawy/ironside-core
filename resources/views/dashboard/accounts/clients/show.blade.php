@extends('ironside::layouts.dashboard.app')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card box-solid">
                <div class="card-header bg-primary with-border">
                    <h3 class="card-title text-white">
                        <span><i class="fa fa-user"></i></span>
                        <span>
                            {{ trans('ironside::dashboard/indexes.account_holder') }}
                        </span>
                    </h3>
                </div>

                <div class="card-body no-padding">
                    <form>
                        <fieldset>
                            <div class="row">
                                <div class="col-md-4">
                                    <section class="form-group">
                                        <label>{{ trans('ironside::dashboard/indexes.full_name') }}</label>
                                        <input type="text" class="form-control" value="{{ $user->fullname }}" readonly>
                                    </section>
                                </div>

                                <div class="col-md-4">
                                    <section class="form-group">
                                        <label>{{ trans('ironside::dashboard/indexes.cell_phone') }}</label>
                                        <input type="text" class="form-control" value="{{ $user->cellphone }}" readonly>
                                    </section>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>{{ trans('ironside::dashboard/indexes.telephone') }}</label>
                                        <input type="text" class="form-control" value="{{ $user->telephone }}" readonly>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>{{ trans('ironside::dashboard/indexes.createdAt') }}</label>
                                        <input type="text" class="form-control" value="{{ $user->created_at }}" readonly>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>
                                            {{ trans('ironside::dashboard/indexes.registeredAt') }}
                                        </label>
                                        <input type="text" class="form-control" value="{{ $user->registered_at }}" readonly>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>{{ trans('ironside::dashboard/indexes.confirmed_at') }}</label>
                                        <input type="text" class="form-control" value="{{ $user->confirmed_at }}" readonly>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @include('ironside::dashboard.partials.form_footer', ['submit' => false])
@endsection