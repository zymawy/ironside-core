@extends('ironside::dashboard.dashboard')

@section('content')
    {{-- devices + browsers --}}
    <div class="row">
        <div class="col-md-6">
            @include('ironside::dashboard.analytics.partials.devices_category')
        </div>

        <div class="col-md-6">
            @include('ironside::dashboard.analytics.partials.browsers')
        </div>
    </div>

    <div class="row">
        <div class="col-sm-6">
            @include('ironside::dashboard.analytics.partials.devices')
        </div>
    </div>
@endsection