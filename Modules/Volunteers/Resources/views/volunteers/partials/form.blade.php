@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="row">
    <div class="col-6">
        {{ BsForm::text('name')->attribute(['data-parsley-maxlength' => '191', 'data-parsley-minlength' => '3'])->label(trans("volunteers::volunteers.attributes.name")) }}
    </div>
    <div class="col-6">
        {{ BsForm::email('email')->attribute(['data-parsley-maxlength' => '191', 'data-parsley-minlength' => '3'])->label(trans("volunteers::volunteers.attributes.email")) }}
    </div>

    <div class="col-6">
        {{ BsForm::text('phone')->attribute(['data-parsley-maxlength' => '191', 'data-parsley-minlength' => '3'])->label(trans("volunteers::volunteers.attributes.phone")) }}
    </div>
    <div class="col-6">
        {{ BsForm::textarea('address')->rows(3)->label(trans("volunteers::volunteers.attributes.address")) }}
    </div>

    <div class="col-6">
        {{ BsForm::date('dob')->label(trans("volunteers::volunteers.attributes.dob")) }}
    </div>
    <div class="col-6">
        {{ BsForm::text('nationality')->attribute(['data-parsley-maxlength' => '191', 'data-parsley-minlength' => '3'])->label(trans("volunteers::volunteers.attributes.nationality")) }}
    </div>
</div>

<div class="col-6">
    {{ BsForm::text('educational_qualification')->attribute(['data-parsley-maxlength' => '191', 'data-parsley-minlength' => '3'])->label(trans("volunteers::volunteers.attributes.educational_qualification")) }}
</div>

