@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

{{ BsForm::select('service_id')->required()->options($services)->attribute('class', 'form-control')->label(__("services::services.plural")) }}

@isset($gallery)
    {{ BsForm::image('image')->collection('images')->files($gallery->getMediaResource('images'))->notes(trans('services::galleries.messages.images_note')) }}
@else
    {{ BsForm::image('image')->collection('images')->notes(trans('services::galleries.messages.images_note')) }}
@endisset

@include("services::seo.inputs")
