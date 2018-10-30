@extends('ironside::dashboard.dashboard')

@section('content')
    {{-- most visited and referrers --}}
    <div class="row">
        <div class="col-md-6">
            @include('ironside::dashboard.analytics.partials.visited_pages')
        </div>

        <div class="col-md-6">
            @include('ironside::dashboard.analytics.partials.referrers')
        </div>
    </div>

    <div class="row">
        <div class="col-sm-6">
            @include('ironside::dashboard.analytics.partials.keywords')
        </div>
        <div class="col-sm-6">

        </div>
    </div>
@endsection