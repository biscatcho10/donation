{{ BsForm::resource('donations::methods')->get(url()->current()) }}
@component('dashboard::layouts.components.accordion')
    @slot('title', trans('donations::methods.actions.filter'))

    <div class="row">
        <div class="col-md-3">
            {{ BsForm::text('name')->value(request('name')) }}
        </div>
        <div class="col-md-3">
            {{ BsForm::number('perPage')
                ->value(request('perPage', 15))
                ->min(1)
                ->label(trans('donations::methods.perPage')) }}
        </div>
    </div>

    @slot('footer')
        <button type="submit" class="btn btn-primary btn-sm">
            <i class="fas fa fa-fw fa-filter"></i>
            @lang('donations::methods.actions.filter')
        </button>
    @endslot
@endcomponent
{{ BsForm::close() }}
