@if(auth()->user()->hasPermission('create_methods'))
    <a href="{{ route('dashboard.donation-methods.create') }}"
       class="btn btn-primary font-weight-bolder">
        <i class="fas fa fa-fw fa-plus"></i>
        @lang('donations::methods.actions.create')
    </a>
@else
    <button
        type="button"
        disabled
        class="btn btn-primary font-weight-bolder">
        <i class="fas fa fa-fw fa-plus"></i>
        @lang('donations::methods.actions.create')
    </button>
@endif
