@extends('dashboard::layouts.default')

@section('title')
    @lang('donations::donors.data')
@endsection

@section('content')
    @component('dashboard::layouts.components.page')
        @slot('title', trans('donations::donors.data'))
        @slot('breadcrumbs', ['dashboard.home'])

        {{ BsForm::putModel($data ,route('dashboard.donation.data.save'), ['data-parsley-validate']) }}
        @component('dashboard::layouts.components.box')
            @slot('title', trans('donations::donors.data'))

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
                {{ BsForm::text('title')->required()->attribute(['data-parsley-maxlength' => '191', 'data-parsley-minlength' => '3'])->label(__('donations::donors.attributes.title')) }}

                {{ BsForm::textarea('description')->required()->rows(3)->attribute(['data-parsley-maxlength' => '191', 'data-parsley-minlength' => '3'])->label(__('donations::donors.attributes.description')) }}

                {{ BsForm::textarea('thanks_msg')->required()->rows(3)->attribute(['data-parsley-maxlength' => '191', 'data-parsley-minlength' => '3'])->label(__('donations::donors.attributes.thanks_message')) }}
            @endBsMultilangualFormTabs

            @slot('footer')
                {{ BsForm::submit()->label(trans('donations::donors.actions.save')) }}
            @endslot
        @endcomponent
        {{ BsForm::close() }}
    @endcomponent
@endsection
