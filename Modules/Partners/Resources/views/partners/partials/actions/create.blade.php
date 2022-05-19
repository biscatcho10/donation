@if(auth()->user()->hasPermission('create_partners'))
    <a href="{{ route('dashboard.partners.create') }}"
       class="btn btn-primary font-weight-bolder">
        <i class="fas fa fa-fw fa-plus"></i>
        @lang('partners::partners.actions.create')
    </a>
@else
    <button
        type="button"
        disabled
        class="btn btn-primary font-weight-bolder">
        <i class="fas fa fa-fw fa-plus"></i>
        @lang('partners::partners.actions.create')
    </button>
@endif
