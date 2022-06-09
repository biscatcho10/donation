{{ BsForm::resource('reason')->get(url()->current()) }}
@component('dashboard::layouts.components.accordion')
    @slot('title', trans('howknow::reasons.actions.filter'))

    <div class="row">
        <div class="col-md-3">
            {{ BsForm::text('reason')->value(request('reason'))->label(trans('howknow::reasons.attributes.reason')) }}
        </div>
        <div class="col-md-3">
            {{ BsForm::number('perPage')->value(request('perPage', 15))->min(1)->label(trans('howknow::reasons.perPage')) }}
        </div>
    </div>

    @slot('footer')
        <button type="submit" class="btn btn-primary btn-sm">
            <i class="fas fa fa-fw fa-filter"></i>
            @lang('howknow::reasons.actions.filter')
        </button>
    @endslot
@endcomponent
{{ BsForm::close() }}
