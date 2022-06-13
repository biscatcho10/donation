@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

{{ BsForm::text('name')->required()->attribute(['data-parsley-maxlength' => '191', 'data-parsley-minlength' => '3']) }}


{{ BsForm::text('email')->required()->attribute(['data-parsley-maxlength' => '191', 'data-parsley-minlength' => '3']) }}


{{ BsForm::text('phone')->attribute(['data-parsley-maxlength' => '191', 'data-parsley-minlength' => '3']) }}
