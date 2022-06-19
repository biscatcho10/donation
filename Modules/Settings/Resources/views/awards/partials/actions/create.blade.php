@if(auth()->user()->hasPermission('create_awards'))
    <a href="{{ route('dashboard.awards.create') }}"
       class="btn btn-primary font-weight-bolder">
        <i class="fas fa fa-fw fa-plus"></i>
        @lang('settings::awards.actions.create')
    </a>
@else
    <button
        type="button"
        disabled
        class="btn btn-primary font-weight-bolder">
        <i class="fas fa fa-fw fa-plus"></i>
        @lang('settings::awards.actions.create')
    </button>
@endif
