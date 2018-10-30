@extends('ironside::dashboard.dashboard')

@section('content')
    {{-- demographics --}}
    <div class="row">
        <div class="col-md-6">
            @include('ironside::dashboard.analytics.partials.gender')
        </div>

        <div class="col-md-6">
            @include('ironside::dashboard.analytics.partials.age')
        </div>
    </div>
@endsection