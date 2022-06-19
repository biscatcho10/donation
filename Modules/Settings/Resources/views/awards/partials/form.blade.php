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
{{ BsForm::text('name')->required()->attribute(['data-parsley-maxlength' => '191','data-parsley-minlength' => '3'])->label(trans('settings::awards.attributes.name')) }}
@endBsMultilangualFormTabs

{{ BsForm::text('url')->required()->attribute(['data-parsley-maxlength' => '191','data-parsley-minlength' => '3'])->label(trans('settings::awards.attributes.url')) }}

<div class="row">
    <div class="col-6">
        {{ BsForm::date('date')->required()->label(trans('settings::awards.attributes.date')) }}
    </div>
</div>

@isset($award)
    {{ BsForm::image('image')->collection('images')->files($award->getMediaResource('images'))->notes(trans('settings::awards.messages.images_note')) }}
@else
    {{ BsForm::image('image')->collection('images')->notes(trans('settings::awards.messages.images_note')) }}
@endisset

@include('dashboard::seo.inputs')
