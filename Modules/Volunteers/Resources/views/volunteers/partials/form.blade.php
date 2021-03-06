@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="row">
    <div class="col-6">
        {{ BsForm::text('name')->attribute(['data-parsley-maxlength' => '191', 'data-parsley-minlength' => '3'])->label(trans('volunteers::volunteers.attributes.name')) }}
    </div>
    <div class="col-6">
        {{ BsForm::email('email')->attribute(['data-parsley-maxlength' => '191', 'data-parsley-minlength' => '3'])->label(trans('volunteers::volunteers.attributes.email')) }}
    </div>

    <div class="col-6">
        {{ BsForm::text('phone')->attribute(['data-parsley-maxlength' => '191', 'data-parsley-minlength' => '3'])->label(trans('volunteers::volunteers.attributes.phone')) }}
    </div>

    <div class="col-6">
        {{ BsForm::text('nationality')->attribute(['data-parsley-maxlength' => '191', 'data-parsley-minlength' => '3'])->label(trans('volunteers::volunteers.attributes.nationality')) }}
    </div>
</div>

@if (isset($volunteer))
    @include('countries::address.form', ['item' => $volunteer])
@else
    @include('countries::address.form')
@endif
<div class="row">
    <div class="col-6">
        {{ BsForm::date('dob')->label(trans('volunteers::volunteers.attributes.dob')) }}
    </div>

    <div class="col-6">
        {{ BsForm::text('educational_qualification')->attribute(['data-parsley-maxlength' => '191', 'data-parsley-minlength' => '3'])->label(trans('volunteers::volunteers.attributes.educational_qualification')) }}
    </div>

    <div class="col-6">
        {{ BsForm::text('job')->attribute(['data-parsley-maxlength' => '191', 'data-parsley-minlength' => '3'])->label(trans('volunteers::volunteers.attributes.job')) }}
    </div>

    <div class="col-6">
        <select2 name="how_know_id" id="how_know" label="{{ __('volunteers::volunteers.attributes.how_know_id') }}"
            remote-url="{{ route('reasons.select') }}"
            @isset($volunteer) value="{{ $volunteer->how_know_id ?? old('how_know_id') }}" @endisset
            :required="true">
        </select2>
    </div>

    <div class="col-12">
        <select2 name="field_id" label="{{ __('volunteers::volunteers.attributes.field_id') }}"
            remote-url="{{ route('fields.select') }}"
            @isset($volunteer) value="{{ $volunteer->field_id ?? old('field_id') }}" @endisset
            :required="true">
        </select2>
    </div>
</div>

<hr>

{{ BsForm::textarea('skills')->rows(3)->attribute('class', 'form-control textarea')->attribute(['data-parsley-minlength' => '3'])->label(__('volunteers::volunteers.attributes.skills')) }}

{{ BsForm::textarea('experiences')->rows(3)->attribute('class', 'form-control textarea')->attribute(['data-parsley-minlength' => '3'])->label(__('volunteers::volunteers.attributes.experiences')) }}

{{ BsForm::textarea('motives')->rows(3)->attribute('class', 'form-control textarea')->attribute(['data-parsley-minlength' => '3'])->label(__('volunteers::volunteers.attributes.motives')) }}

{{ BsForm::textarea('favorite_time')->rows(3)->attribute('class', 'form-control textarea')->attribute(['data-parsley-minlength' => '3'])->label(__('volunteers::volunteers.attributes.favorite_time')) }}

<div class="row">
    <div class="col-6">
        {{ BsForm::checkbox('has_car')->label(__('volunteers::volunteers.attributes.has_car'))->value(1)->checked(isset($volunteer) ? $volunteer->has_car : old('has_car')) }}
    </div>
</div>

<div class="row">
    <div class="col-12">
        {{ BsForm::select('volunteer_category')
        ->attribute('class', 'custom-select')
        ->placeholder(__('volunteers::volunteers.select_volunteer_category'))
        ->options([
                'children' => __('volunteers::volunteers.attributes.children'),
                'adults' => __('volunteers::volunteers.attributes.adults'),
                'more_exp' => __('volunteers::volunteers.attributes.more_exp'),
            ])->attribute('id', 'v_category')->label(__('volunteers::volunteers.attributes.volunteer_category')) }}
    </div>

    <div class="col-6 category_exp"
    @isset($volunteer)
        @if ($volunteer->volunteer_category == 'more_exp')
            style="display: block;"
        @else
            style="display: none;"
        @endif
    @else
        style="display: none"
    @endisset>
        {{ BsForm::textarea('category_exp')->rows(3)->attribute('class', 'form-control')->attribute(['data-parsley-minlength' => '3'])->label(__('volunteers::volunteers.attributes.category_exp')) }}
    </div>
</div>


@push('js')
    <script>
        $(document).ready(function() {
            $('#v_category').on('change', function() {
                if ($(this).val() == 'more_exp') {
                    $('.category_exp').show();
                } else {
                    $('.category_exp').hide();
                }
            });
        });
    </script>
@endpush
