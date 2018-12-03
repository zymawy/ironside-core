<div class="form-footer">
    @if(isset($submit) == false || $submit == true)
        <button class="btn btn-flat b-ir-primary btn-submit">
            <span class="badge"><i class="fa fa-fw fa-save"></i></span>{{ trans('ironside::dashboard/general.submit') }}
        </button>
    @endif

    <a href="javascript:window.history.back();" class="btn btn-flat b-ir-success">
        <span class="badge"><i class="fa fa-fw fa-chevron-left"></i></span>{{ trans('ironside::dashboard/general.back') }}
    </a>
</div>