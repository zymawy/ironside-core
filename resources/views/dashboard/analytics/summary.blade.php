@extends('dashboard.dashboard')

@section('content')
    @include('dashboard.analytics.partials.analytics_header', ['activeUsers' => true])

    <div class="row">
        <div class="col-sm-12">
            @include('dashboard.analytics.partials.visitors_views')
        </div>
    </div>

    {{-- locations + devices_category --}}
    <div class="row">
        <div class="col-md-7">
            @include('dashboard.analytics.partials.locations')
        </div>
        <div class="col-md-5">
            @include('dashboard.analytics.partials.devices_category')
        </div>
    </div>
@endsection