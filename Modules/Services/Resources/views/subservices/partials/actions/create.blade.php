@if(auth()->user()->hasPermission('create_subservices'))
    <a href="{{ route('dashboard.subservices.create', $service) }}"
       class="btn btn-primary font-weight-bolder">
        <i class="fas fa fa-fw fa-plus"></i>
        @lang('services::subservices.actions.create')
    </a>
@else
    <button
        type="button"
        disabled
        class="btn btn-primary font-weight-bolder">
        <i class="fas fa fa-fw fa-plus"></i>
        @lang('services::subservices.actions.create')
    </button>
@endif
