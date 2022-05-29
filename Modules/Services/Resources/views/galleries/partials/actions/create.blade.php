@if(auth()->user()->hasPermission('create_galleries'))
    <a href="{{ route('dashboard.galleries.create') }}"
       class="btn btn-primary font-weight-bolder">
        <i class="fas fa fa-fw fa-plus"></i>
        @lang('services::galleries.actions.create')
    </a>
@else
    <button
        type="button"
        disabled
        class="btn btn-primary font-weight-bolder">
        <i class="fas fa fa-fw fa-plus"></i>
        @lang('services::galleries.actions.create')
    </button>
@endif
