{{ BsForm::resource('donations::donors')->get(url()->current()) }}
@component('dashboard::layouts.components.accordion')
    @slot('title', trans('donations::donors.actions.filter'))

    <div class="row">
        <div class="col-md-3">
            {{ BsForm::select('donor')->options($donors)->label(__("donations::donations.attributes.donor"))->placeholder(__("donations::donors.select")) }}
        </div>
        <div class="col-md-3">
            {{ BsForm::select('type')->options([
                'online' => __('donations::donations.attributes.online'),
                'offline' => __('donations::donations.attributes.offline'),
            ])->label(__("donations::donations.attributes.type"))->placeholder(__("donations::donations.attributes.type")) }}
        </div>
        <div class="col-md-3">
            {{ BsForm::number('perPage')
                ->value(request('perPage', 15))
                ->min(1)
                ->label(trans('donations::donors.perPage')) }}
        </div>
    </div>

    @slot('footer')
        <button type="submit" class="btn btn-primary btn-sm">
            <i class="fas fa fa-fw fa-filter"></i>
            @lang('donations::donors.actions.filter')
        </button>
    @endslot
@endcomponent
{{ BsForm::close() }}
