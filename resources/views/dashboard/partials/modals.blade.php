{{-- confirm modal --}}
<div class="modal fade" id="modal-confirm" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header alert-warning">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">{{ trans('dashboard/general.are-you-sure') }}</h4>
            </div>
            <div class="modal-body">
                <p></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">
                    {{ trans('dashboard/general.no') }}
                </button>
                <button type="button" class="btn btn-primary btn-submit">
                   {{ trans('dashboard/general.yes') }}
                </button>
            </div>
        </div>
    </div>
</div>

{{-- notifications --}}
<div class="modal fade" id="modal-notifications" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header alert-info">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">
                    {{ trans('dashboard/general.notifications') }}
                </h4>
            </div>
            <div class="modal-body">
                <table id="tbl-notifications" class="table table-striped table-bordered" width="100%">
                    <thead>
                    <tr>
                        <th>{{ trans('dashboard/general.date') }}</th>
                        <th>{{ trans('dashboard/general.type') }}</th>
                        <th>{{ trans('dashboard/general.read') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td colspan="3" class="text-center">{{ trans('dashboard/general.currently-no-notices') }}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">{{ trans('dashboard/general.close') }}</button>
            </div>
        </div>
    </div>
</div>