<div class="form-footer">
    @if(isset($submit) == false || $submit == true)
        <button class="btn btn-flat btn-labeled btn-primary btn-submit">
            <span class="btn-label"><i class="fa fa-fw fa-save"></i></span>{{ trans('dashboard/general.submit') }}
        </button>
    @endif

    <a href="javascript:window.history.back();" class="btn btn-flat btn-labeled btn-pink">
        <span class="btn-label"><i class="fa fa-fw fa-chevron-left"></i></span>{{ trans('dashboard/general.back') }}
    </a>
</div>