@if(auth()->user()->hasPermission('create_events'))
    <a href="{{ route('dashboard.events.create', $gallery) }}"
       class="btn btn-primary font-weight-bolder">
        <i class="fas fa fa-fw fa-plus"></i>
        @lang('services::events.actions.create')
    </a>
@else
    <button
        type="button"
        disabled
        class="btn btn-primary font-weight-bolder">
        <i class="fas fa fa-fw fa-plus"></i>
        @lang('services::events.actions.create')
    </button>
@endif
