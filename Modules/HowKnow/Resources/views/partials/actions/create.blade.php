@if(auth()->user()->hasPermission('create_reasons'))
    <a href="{{ route('dashboard.reasons.create') }}"
       class="btn btn-primary font-weight-bolder">
        <i class="fas fa fa-fw fa-plus"></i>
        @lang('howknow::reasons.actions.create')
    </a>
@else
    <button
        type="button"
        disabled
        class="btn btn-primary font-weight-bolder">
        <i class="fas fa fa-fw fa-plus"></i>
        @lang('howknow::reasons.actions.create')
    </button>
@endif
