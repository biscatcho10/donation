{{ BsForm::resource('services::galleries')->get(url()->current()) }}
@component('dashboard::layouts.components.accordion')
    @slot('title', trans('services::galleries.actions.filter'))

    <div class="row">
        <div class="col-md-3">
            {{ BsForm::select('service')->options($services)->attribute('class', 'form-control')->label(__("services::services.plural"))->placeholder(__("Select one")) }}
        </div>
        <div class="col-md-3">
            {{ BsForm::number('perPage')
                ->value(request('perPage', 15))
                ->min(1)
                ->label(trans('services::galleries.perPage')) }}
        </div>
    </div>

    @slot('footer')
        <button type="submit" class="btn btn-primary btn-sm">
            <i class="fas fa fa-fw fa-filter"></i>
            @lang('services::galleries.actions.filter')
        </button>
    @endslot
@endcomponent
{{ BsForm::close() }}
