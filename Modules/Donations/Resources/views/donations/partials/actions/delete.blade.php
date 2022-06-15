@if(auth()->user()->hasPermission('delete_donations'))
    <a href="#donation-{{ $donation->id }}-delete-model" class="btn btn-outline-danger waves-effect waves-light btn-sm"
       data-toggle="modal">
        <i class="fas fa-trash-alt fa fa-fw"></i>
    </a>

    <!-- Modal -->
    <div class="modal fade" id="donation-{{ $donation->id }}-delete-model" tabindex="-1" role="dialog"
         aria-labelledby="modal-title-{{ $donation->id }}" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"
                        id="modal-title-{{ $donation->id }}">@lang('donations::donations.dialogs.delete.title')</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @lang('donations::donations.dialogs.delete.info')
                </div>
                <div class="modal-footer">
                    {{ BsForm::delete(route('dashboard.donations.destroy', $donation)) }}
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        @lang('donations::donations.dialogs.delete.cancel')
                    </button>
                    <button type="submit" class="btn btn-danger">
                        @lang('donations::donations.dialogs.delete.confirm')
                    </button>
                    {{ BsForm::close() }}
                </div>
            </div>
        </div>
    </div>
@else
    <button
        type="button"
        disabled
        class="btn btn-outline-danger waves-effect waves-light btn-sm">
        <i class="fas fa-trash-alt fa fa-fw"></i>
    </button>
@endcan
