@extends('ironside::layouts.dashboard')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-primary card-solid">
                <div class="card-header with-border">
                    <h3 class="card-title">
                        <span><i class="fa fa-eye"></i></span>
                        <span>Banners - {{ $item->name }}</span>
                    </h3>
                </div>

                <div class="card-body no-padding">

                    @include('ironside::dashboard.partials.info')

                    <form>
                        <fieldset>
                            <div class="row">
                                <section class="col col-6">
                                    <section class="form-group">
                                        <label>Name</label>
                                        <input type="text" class="form-control" value="{{ $item->name }}" readonly>
                                    </section>
                                </section>

                                <section class="col col-6">
                                    <section class="form-group">
                                        <label>Summary</label>
                                        <input type="text" class="form-control" value="{{ $item->summary }}" readonly>
                                    </section>
                                </section>
                            </div>

                            <div class="row">
                                <div class="col col-6">
                                    <section class="form-group">
                                        <label>Action Name</label>
                                        <input type="text" class="form-control" value="{{ $item->action_name }}" readonly>
                                    </section>
                                </div>

                                <div class="col col-6">
                                    <section class="form-group">
                                        <label>Action Url</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" value="{{ $item->action_url }}" readonly>
                                            <span class="input-group-addon"><i class="fa fa-link"></i></span>
                                        </div>
                                    </section>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col col-6">
                                    <section class="form-group">
                                        <label>Active From</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" value="{{ $item->active_from }}" readonly>
                                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                        </div>
                                    </section>
                                </div>

                                <div class="col col-6">
                                    <section class="form-group">
                                        <label>Active To</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" value="{{ $item->active_to }}" readonly>
                                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                        </div>
                                    </section>
                                </div>
                            </div>

                            @if(isset($item) && $item && $item->image)
                                <section>
                                    <img src="{{ uploaded_images_url($item->image) }}" style="max-height: 300px;">
                                    <input type="hidden" name="image" value="{{ $item->image }}">
                                </section>
                            @endif
                        </fieldset>

                        @include('ironside::`dashboard.partials.form_footer', ['submit' => false])
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection