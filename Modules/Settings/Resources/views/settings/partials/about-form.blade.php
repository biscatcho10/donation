@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


<div class="accordion" id="accordionExample">
    <div class="card">
        <div class="card-header" id="headingOne">
            <h2 class="mb-0">
                <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                    data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    {{ __('About Us') }}
                </button>
            </h2>
        </div>

        <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
            <div class="card-body">
                @bsMultilangualFormTabs
                    {{ BsForm::textarea('foundation')->required()->rows(3)->attribute('class', 'form-control textarea')->value(Settings::locale($locale->code)->get('foundation'))->attribute(['data-parsley-minlength' => '3'])->label(__('settings::settings.attributes.association_foundation')) }}

                    {{ BsForm::textarea('our_vision')->required()->rows(3)->attribute('class', 'form-control textarea')->value(Settings::locale($locale->code)->get('our_vision'))->attribute(['data-parsley-minlength' => '3'])->label(__('settings::settings.attributes.our_vision')) }}

                    {{ BsForm::textarea('our_message')->required()->rows(3)->attribute('class', 'form-control textarea')->value(Settings::locale($locale->code)->get('our_message'))->attribute(['data-parsley-minlength' => '3'])->label(__('settings::settings.attributes.our_message')) }}

                    {{ BsForm::textarea('our_goals')->required()->rows(3)->attribute('class', 'form-control textarea')->value(Settings::locale($locale->code)->get('our_goals'))->attribute(['data-parsley-minlength' => '3'])->label(__('settings::settings.attributes.our_goals')) }}
                @endBsMultilangualFormTabs
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header" id="headingTwo">
            <h2 class="mb-0">
                <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse"
                    data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    {{ __('Video') }}
                </button>
            </h2>
        </div>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
            <div class="card-body">
                <!-- video input -->
                <div class="form-group">
                    <label for="">{{ __('settings::settings.attributes.video_type') }}</label>
                    <select class="form-control video_type" name="video_type" id="video_type">
                        <option>{{ __('Select one') }}</option>
                        <option value="upload"
                            @isset($about) {{ $about->video_type === 'upload' ? 'selected' : '' }} @endisset>
                            {{ __('Upload') }}</option>
                        <option value="link"
                            @isset($about) {{ $about->video_type === 'link' ? 'selected' : '' }} @endisset>
                            {{ __('Link') }}</option>
                    </select>
                </div>

                @isset($about)
                    <div style="display: none" class="link-wrapper hide_div">
                        {{ BsForm::text('video_link')->attribute('class', 'form-control')->label(__('settings::settings.attributes.video_link'))->attribute('id', 'url-link')->attribute('placeholder', 'www.example.com')->attribute('data-parsley-type', 'url')->attribute('data-parsley-type-message', __('input data must be url'))->attribute('data-parsley-trigger', 'keyup')->attribute('data-parsley-required-message', __('link is required'))->value($about->video_link)->note(__('link must be embed')) }}
                    </div>

                    <div style="display: none" class="upload-wrapper hide_div">
                        <div class="form-group">
                            <label for="category-image">{{ __('settings::settings.attributes.video') }}</label>
                            <file-uploader :unlimited="false" collection="video"
                                :media="{{ $about->getMediaResource('video') }}"
                                :tokens="{{ json_encode(old('media', [])) }}"
                                notes="Supported types: flv, mp4,wmv,avi | Max File Size:25MB"
                                accept="video/x-flv,video/mp4,video/x-ms-wmv,video/avi"></file-uploader>
                        </div>
                    </div>
                @else
                    <div style="display: none" class="link-wrapper hide_div">
                        {{ BsForm::text('video_link')->attribute('class', 'form-control')->label(__('settings::settings.attributes.video_link'))->attribute('id', 'url-link')->attribute('placeholder', 'https://www.example.com')->attribute('data-parsley-type', 'url')->attribute('data-parsley-type-message', __('input data must be url'))->attribute('data-parsley-trigger', 'keyup')->attribute('data-parsley-required-message', __('link is required'))->note(__('link must be embed')) }}
                    </div>

                    <div style="display: none" class="upload-wrapper hide_div">
                        <div class="form-group">
                            <label for="category-image">{{ __('settings::settings.attributes.video') }}</label>
                            <file-uploader :unlimited="false" collection="video"
                                :tokens="{{ json_encode(old('media', [])) }}"
                                notes="Supported types: flv, mp4,wmv,avi | Max File Size:25MB"
                                accept="video/x-flv,video/mp4,video/x-ms-wmv,video/avi"></file-uploader>
                        </div>
                    </div>
                @endisset

                <hr>

                @include('dashboard::seo.inputs')

            </div>
        </div>
    </div>
    {{-- <div class="card">
        <div class="card-header" id="headingThree">
            <h2 class="mb-0">
                <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse"
                    data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                    {{ __('Awards') }}
                </button>
            </h2>
        </div>
        <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
            <div class="card-body">
                @isset($about)
                    <div class="form-group">
                        <label for="category-image">{{ __('settings::settings.attributes.awards') }}</label>
                        <div data-repeater-list="awards">
                            @if ($about->awards != null)
                                @foreach ($about->awards as $award)
                                    <div class="row" data-repeater-item>
                                        <div class="form-group col-10">
                                            {{ BsForm::text('link')->attribute('pattern', 'https://.*')->attribute(['data-parsley-type' => 'url', 'data-parsley-minlength' => '3'])->placeholder('https://award.com')->value($award) }}
                                        </div>
                                        <div class="form-group col-2">
                                            <input data-repeater-delete type="button" class="btn btn-danger btn-sm"
                                                value="{{ __('Delete') }}" />
                                        </div>
                                    </div>
                                @endforeach
                            @else
                            <div class="row" data-repeater-item>
                                <div class="form-group col-10">
                                    {{ BsForm::text('link')->attribute('pattern', 'https://.*')->attribute(['data-parsley-type' => 'url', 'data-parsley-minlength' => '3'])->placeholder('https://award.com') }}
                                </div>
                                <div class="form-group col-2">
                                    <input data-repeater-delete type="button" class="btn btn-danger btn-sm"
                                        value="{{ __('Delete') }}" />
                                </div>
                            </div>
                            @endif
                        </div>
                        <input data-repeater-create type="button" value="{{ __('Add') }}" class="btn btn-primary" />
                    </div>
                @else
                    <div class="form-group">
                        <label for="category-image">{{ __('settings::settings.attributes.awards') }}</label>
                        <div data-repeater-list="awards">
                            <div class="row" data-repeater-item>
                                <div class="form-group col-10">
                                    {{ BsForm::text('link')->attribute('pattern', 'https://.*')->attribute(['data-parsley-type' => 'url', 'data-parsley-minlength' => '3'])->placeholder('https://award.com') }}
                                </div>
                                <div class="form-group col-2">
                                    <input data-repeater-delete type="button" class="btn btn-danger btn-sm"
                                        value="{{ __('Delete') }}" />
                                </div>
                            </div>
                        </div>
                        <input data-repeater-create type="button" value="{{ __('Add') }}" class="btn btn-primary" />
                    </div>
                @endisset
            </div>
        </div>
    </div> --}}
</div>
