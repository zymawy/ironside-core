@extends('ironside::layouts.dashboard.app')

@section('content')
    @include('ironside::dashboard.analytics.partials.analytics_header')

    <div class="row">
        <div class="col-sm-12">
            @include('ironside::dashboard.analytics.partials.visitors_views')
        </div>
    </div>

    {{-- locations + most visited pages --}}
    <div class="row">
        <div class="col-md-5">
            @include('ironside::dashboard.analytics.partials.visited_pages')
        </div>

        <div class="col-md-7">
            @include('ironside::dashboard.analytics.partials.locations')
        </div>
    </div>

    <div class="row">
        <div class="col-sm-6">
            @include('ironside::dashboard.analytics.partials.devices')
        </div>
        <div class="col-sm-6">
            @include('ironside::dashboard.analytics.partials.browsers')
        </div>
    </div>
@endsection