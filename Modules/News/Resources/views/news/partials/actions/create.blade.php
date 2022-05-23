@if(auth()->user()->hasPermission('create_news'))
    <a href="{{ route('dashboard.news.create') }}"
       class="btn btn-primary font-weight-bolder">
        <i class="fas fa fa-fw fa-plus"></i>
        @lang('news::news.actions.create')
    </a>
@else
    <button
        type="button"
        disabled
        class="btn btn-primary font-weight-bolder">
        <i class="fas fa fa-fw fa-plus"></i>
        @lang('news::news.actions.create')
    </button>
@endif
