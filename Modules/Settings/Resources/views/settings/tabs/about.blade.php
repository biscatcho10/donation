@extends('dashboard::layouts.default')

@section('title')
    @lang('settings::settings.tabs.about')
@endsection

@section('content')
    @component('dashboard::layouts.components.page')
        @slot('title', trans('settings::settings.actions.update'))
        @slot('breadcrumbs', ['dashboard.settings.update'])

        {{ BsForm::putModel($about, route('dashboard.about-us.update'), ['files' => true]) }}
        @component('dashboard::layouts.components.box')
            @slot('title', trans('settings::settings.tabs.about'))

            @include('settings::settings.partials.about-form')

            {{ BsForm::submit()->label(trans('settings::settings.actions.save'))->attribute('class', 'btn btn-danger mb-2') }}
        @endcomponent
        {{ BsForm::close() }}
    @endcomponent
@endsection

@push('js')
    <script>
        $(".video_type").on('change', function() {
            if ($(this).val() === 'link') {
                $(".link-wrapper").show();
                $(".upload-wrapper").hide();
                $("#url-link").attr("data-parsley-required", true);
            } else if ($(this).val() === 'upload') {
                $(".link-wrapper").hide();
                $(".upload-wrapper").show();
                $("#url-link").attr("data-parsley-required", false);
            } else {
                $(".link-wrapper").hide();
                $(".upload-wrapper").hide();
                $("#url-link").attr("data-parsley-required", false);
            }
        });

        if ($('.video_type').val() == "link" || $('.video_type').val() == "upload") {
            let $selected = $('.video_type').val();
            $('.' + $selected + '-wrapper').show().siblings("div.hide_div").hide();
        }
    </script>
@endpush
