@extends('ironside::dashboard.dashboard')

@section('content')
    @include('ironside::dashboard.analytics.partials.analytics_header', ['activeUsers' => true])

    <div class="row">
        <div class="col-sm-12">
            @include('ironside::dashboard.analytics.partials.visitors_views')
        </div>
    </div>

    {{-- locations + devices_category --}}
    <div class="row">
        <div class="col-md-7">
            @include('ironside::dashboard.analytics.partials.locations')
        </div>
        <div class="col-md-5">
            @include('ironside::dashboard.analytics.partials.devices_category')
        </div>
    </div>
@endsection
