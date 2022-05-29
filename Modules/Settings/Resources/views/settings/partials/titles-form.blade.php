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
        {{ BsForm::text('welocme_text_en')->value(Settings::get('welocme_text_en'))->label(__("Welcomw Text (en)")) }}
    </div>
    <div class="col-6">
        {{ BsForm::text('welocme_text_ar')->value(Settings::get('welocme_text_ar'))->label(__("Welcomw Text (ar)")) }}
    </div>
</div>
