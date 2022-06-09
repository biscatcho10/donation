@if(auth()->user()->hasPermission('create_volunteers'))
    <a href="{{ route('dashboard.volunteers.create') }}"
       class="btn btn-primary font-weight-bolder">
        <i class="fas fa fa-fw fa-plus"></i>
        @lang('volunteers::volunteers.actions.create')
    </a>
@else
    <button
        type="button"
        disabled
        class="btn btn-primary font-weight-bolder">
        <i class="fas fa fa-fw fa-plus"></i>
        @lang('volunteers::volunteers.actions.create')
    </button>
@endif
