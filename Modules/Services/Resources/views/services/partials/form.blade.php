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
{{ BsForm::text('name')->required()->attribute(['data-parsley-maxlength' => '191','data-parsley-minlength' => '3']) }}
{{ BsForm::textarea('description')->rows('3') }}
@endBsMultilangualFormTabs
@isset($service)
    {{ BsForm::image('image')->collection('images')->unlimited(false)->files($service->getMediaResource('images'))->notes(trans('services::services.messages.images_note')) }}
@else
    {{ BsForm::image('image')->collection('images')->unlimited(false)->notes(trans('services::services.messages.images_note')) }}
@endisset

@include("dashboard::seo.inputs")
