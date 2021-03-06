@if($paginator->total() > 0)
    <style>
        .js-pagination-loader {
            display: none;
        }
    </style>

    <div class="row paginator-footer">
        <div class="col-md-12">
            <p class="text-center">
                {{ trans('ironside::dashboard/general.showing') }}
                <strong>{{ (($paginator->currentPage() - 1) * $paginator->perPage()) + 1 }}</strong>
                {{ trans('ironside::dashboard/general.to') }}
                <strong>{{ $paginator->perPage() * $paginator->currentPage() > $paginator->total()? $paginator->total() : $paginator->perPage() * $paginator->currentPage() }}</strong>
                {{ trans('ironside::dashboard/general.of') }}
                <strong><span class="text-primary">{{ $paginator->total() }}</span></strong>
                {{ trans('ironside::dashboard/general.entries') }}
                @if(isset($paginator->originalEntries) && $paginator->originalEntries != $paginator->total())
                    <span class="text-muted">
                        (filtered from
                        <strong>{{ $paginator->originalEntries }}</strong>
                        total entries)
                    </span>
                @endif
            </p>
        </div>

        <div class="col-md-12 text-center">
            {{ $paginator->links() }}
        </div>
    </div>

    <div class="js-pagination-loader text-primary text-center">
        <i class="fa fa-spinner fa-spin fa-2x"></i>
    </div>
@endif