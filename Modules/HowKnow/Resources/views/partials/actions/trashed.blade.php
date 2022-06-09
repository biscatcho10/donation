@if(auth()->user()->hasPermission('readtrashed_reasons'))
    <a href="{{ route('dashboard.reasons.trashed') }}"
       class="btn btn-primary font-weight-bolder">
        <i class="fas fa-trash-alt"></i>
        @lang('howknow::reasons.actions.trashed')
    </a>
@else
    <button
        type="button"
        disabled
        class="btn btn-primary font-weight-bolder">
        <i class="fas fa-trash-alt"></i>
        @lang('howknow::reasons.actions.trashed')
    </button>
@endif
