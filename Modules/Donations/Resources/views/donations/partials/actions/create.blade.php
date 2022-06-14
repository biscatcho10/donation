@if(auth()->user()->hasPermission('create_donors'))
    <a href="{{ route('dashboard.donors.create') }}"
       class="btn btn-primary font-weight-bolder">
        <i class="fas fa fa-fw fa-plus"></i>
        @lang('donations::donors.actions.create')
    </a>
@else
    <button
        type="button"
        disabled
        class="btn btn-primary font-weight-bolder">
        <i class="fas fa fa-fw fa-plus"></i>
        @lang('donations::donors.actions.create')
    </button>
@endif
