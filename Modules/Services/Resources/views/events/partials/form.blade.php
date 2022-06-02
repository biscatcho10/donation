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
    {{ BsForm::text('name')->required()->attribute(['data-parsley-maxlength' => '191', 'data-parsley-minlength' => '3']) }}
    {{ BsForm::textarea('description')->rows('3') }}
@endBsMultilangualFormTabs

@isset($event)
    <div class="form-group col-6">
        <label for="category-image"> @lang('services::events.plural') </label>
        {{ BsForm::image('events')->unlimited(false)->collection('events')->files($event->getMediaResource('events'))->notes(trans('services::galleries.messages.images_note')) }}
    </div>
@else
    <div class="form-group col-6">
        <label for="category-image"> @lang('services::events.plural') </label>
        {{ BsForm::image('events')->unlimited(false)->collection('events')->notes('Supported types: jpeg, png,jpg,gif,svg | max: 10 Mb') }}
    </div>
@endisset

@include('dashboard::seo.inputs')
