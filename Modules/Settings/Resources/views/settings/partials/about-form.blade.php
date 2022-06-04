@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@bsMultilangualFormTabs
    {{ BsForm::textarea('foundation')->rows(3)->attribute('class', 'form-control textarea')->value(Settings::locale($locale->code)->get('foundation'))->attribute(['data-parsley-minlength' => '3'])->label(__('settings::settings.attributes.association_foundation')) }}

    {{ BsForm::textarea('our_vision')->rows(3)->attribute('class', 'form-control textarea')->value(Settings::locale($locale->code)->get('our_vision'))->attribute(['data-parsley-minlength' => '3'])->label(__('settings::settings.attributes.our_vision')) }}

    {{ BsForm::textarea('our_message')->rows(3)->attribute('class', 'form-control textarea')->value(Settings::locale($locale->code)->get('our_message'))->attribute(['data-parsley-minlength' => '3'])->label(__('settings::settings.attributes.our_message')) }}

    {{ BsForm::textarea('our_goals')->rows(3)->attribute('class', 'form-control textarea')->value(Settings::locale($locale->code)->get('our_goals'))->attribute(['data-parsley-minlength' => '3'])->label(__('settings::settings.attributes.our_goals')) }}
@endBsMultilangualFormTabs


<!-- video input -->
@isset($about)
    
@endisset

@include('dashboard::seo.inputs')
