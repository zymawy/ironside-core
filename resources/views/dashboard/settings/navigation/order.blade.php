@extends('ironside::layouts.dashboard.app')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-primary">
                <div class="card-header bg-primary with-border">
                    <h3 class="card-title text-white">
                        <span><i class="fa fa-align-center"></i></span>
                        <span>Update {{ ucfirst($resource) }} List Order</span>
                    </h3>
                </div>

                <div class="card-body">

                    @include('ironside::dashboard.partials.info')

{{--                    @include('ironside::dashboard.partials.toolbar', ['order' => true])--}}

                    <div class="well well-sm well-toolbar m-t-10 m-b-10" id="nestable-menu">
                        <a href="javascript:window.history.back();" class="btn b-ir-theme m-b-10 m-l-5">
                            <span class="badge"><i class="fa fa-fw fa-chevron-left"></i></span>Back
                        </a>

                        <button type="button" class="btn b-ir-primary m-b-10 m-l-5" data-action="expand-all">
                            <span class="badge"><i class="fa fa-fw fa-plus-circle"></i></span>Expand All
                        </button>

                        <button type="button" class="btn  b-ir-success m-b-10 m-l-5" data-action="collapse-all">
                            <span class="badge"><i class="fa fa-fw fa-minus-circle text-red"></i></span>Collapse All
                        </button>
                    </div>

                    <div class="row">
                        <div class="col-xs-12">
                            <div class="dd" id="dd-navigation" style="max-width: 100%">
                                {!! $itemsHtml !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('ironside::dashboard.partials.nestable')
@endsection

@section('js')
    @parent
    <script type="text/javascript" charset="utf-8">
        $(function ()
        {
            initNestableMenu(4, "{{ request()->url() }}");
        })
    </script>
@endsection