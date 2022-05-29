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
{{ BsForm::text('name')->attribute(['data-parsley-maxlength' => '191','data-parsley-minlength' => '3']) }}
@endBsMultilangualFormTabs
@isset($partner)
    {{ BsForm::image('image')->collection('images')->files($partner->getMediaResource('images'))->notes(trans('partners::partners.messages.images_note')) }}
@else
    {{ BsForm::image('image')->collection('images')->notes(trans('partners::partners.messages.images_note')) }}
@endisset

@include('services::seo.inputs')
