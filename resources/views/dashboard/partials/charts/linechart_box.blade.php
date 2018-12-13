<div class="card bg-success {{ isset($boxClass)? $boxClass:'' }} " id="{{ $id }}">
    <div class="card-header with-border">
        <h3 class="card-title">
            <span><i class="fa fa-{{ isset($icon)? $icon:'line-chart' }}"></i></span>
            <span>{{ isset($title)? $title:'Title' }}</span>
        </h3>

        @include('ironside::dashboard.partials.boxes.toolbar')
        {{-- , ['btnDateClass' => 'btn-default'] --}}
    </div>

    <div class="card-body">
        @include('ironside::dashboard.partials.charts.linechart')
    </div>
</div>

