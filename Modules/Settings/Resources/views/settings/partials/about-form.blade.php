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
    {{ BsForm::textarea('foundation')->required()->rows(3)->attribute('class', 'form-control textarea')->value(Settings::locale($locale->code)->get('foundation'))->attribute(['data-parsley-minlength' => '3'])->label(__('settings::settings.attributes.association_foundation')) }}

    {{ BsForm::textarea('our_vision')->required()->rows(3)->attribute('class', 'form-control textarea')->value(Settings::locale($locale->code)->get('our_vision'))->attribute(['data-parsley-minlength' => '3'])->label(__('settings::settings.attributes.our_vision')) }}

    {{ BsForm::textarea('our_message')->required()->rows(3)->attribute('class', 'form-control textarea')->value(Settings::locale($locale->code)->get('our_message'))->attribute(['data-parsley-minlength' => '3'])->label(__('settings::settings.attributes.our_message')) }}

    {{ BsForm::textarea('our_goals')->required()->rows(3)->attribute('class', 'form-control textarea')->value(Settings::locale($locale->code)->get('our_goals'))->attribute(['data-parsley-minlength' => '3'])->label(__('settings::settings.attributes.our_goals')) }}
@endBsMultilangualFormTabs

@include('dashboard::seo.inputs')

<hr>

<!-- video input -->
<div class="col-12 form-group">
    <label for="">{{ __('settings::settings.attributes.video_type') }}</label>
    <select class="form-control video_type" name="video_type" id="video_type">
        <option>{{ __('Select one') }}</option>
        <option value="upload" @isset($about) {{ $about->video_type === 'upload' ? 'selected' : '' }} @endisset>{{ __('Upload') }}</option>
        <option value="link" @isset($about) {{ $about->video_type === 'link' ? 'selected' : '' }} @endisset>{{ __('Link') }}</option>
    </select>
</div>

@isset($about)
    <div style="display: none" class="link-wrapper hide_div">
        {{ BsForm::text('video_link')->attribute('class', 'form-control')->label(__("settings::settings.attributes.video_link"))->attribute('id', 'url-link')->attribute('placeholder', 'www.example.com')->attribute('data-parsley-type', 'url')->attribute('data-parsley-type-message', __('input data must be url'))->attribute('data-parsley-trigger', 'keyup')->attribute('data-parsley-required-message', __('link is required'))->value($about->video_link)->note(__('link must be embed')) }}
    </div>

    <div style="display: none" class="upload-wrapper hide_div">
        <div class="form-group">
            <label for="category-image">{{ __('settings::settings.attributes.video') }}</label>
            <file-uploader :unlimited="false" collection="video" :media="{{ $about->getMediaResource('video') }}"
                :tokens="{{ json_encode(old('media', [])) }}"
                notes="Supported types: flv, mp4,wmv,avi | Max File Size:25MB"
                accept="video/x-flv,video/mp4,video/x-ms-wmv,video/avi"></file-uploader>
        </div>
    </div>
@else
    <div style="display: none" class="link-wrapper hide_div">
        {{ BsForm::text('video_link')->attribute('class', 'form-control')->label(__("settings::settings.attributes.video_link"))->attribute('id', 'url-link')->attribute('placeholder', "https://www.example.com")->attribute('data-parsley-type', 'url')->attribute('data-parsley-type-message', __('input data must be url'))->attribute('data-parsley-trigger', 'keyup')->attribute('data-parsley-required-message', __('link is required'))->note(__('link must be embed')) }}
    </div>

    <div style="display: none" class="upload-wrapper hide_div">
        <div class="form-group">
            <label for="category-image">{{ __("settings::settings.attributes.video") }}</label>
            <file-uploader
                :unlimited="false"
                collection="video"
                :tokens="{{ json_encode(old('media', [])) }}"
                notes="Supported types: flv, mp4,wmv,avi | Max File Size:25MB"
                accept="video/x-flv,video/mp4,video/x-ms-wmv,video/avi"></file-uploader>
        </div>
    </div>
@endisset
