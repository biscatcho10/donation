@include('dashboard::errors')
@bsMultilangualFormTabs

{{ BsForm::text('reason')->required()->attribute(['data-parsley-maxlength' => '191','data-parsley-minlength' => '3'])->label(trans('howknow::reasons.attributes.reason')) }}

@endBsMultilangualFormTabs
