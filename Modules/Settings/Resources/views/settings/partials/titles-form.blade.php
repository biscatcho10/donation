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
        <div class="card-header" id="heading1">
            <h2 class="mb-0">
                <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                    data-target="#collapse1" aria-expanded="true" aria-controls="collapse1">
                    # {{__("Home Page")}}
                </button>
            </h2>
        </div>

        <div id="collapse1" class="collapse" aria-labelledby="heading1" data-parent="#accordionExample">
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        {{ BsForm::text('welcome_text_en')->value(Settings::get('welcome_text_en'))->label(__('Welcome Text (en)')) }}
                    </div>
                    <div class="col-6">
                        {{ BsForm::text('welcome_text_ar')->value(Settings::get('welcome_text_ar'))->label(__('Welcome Text (ar)')) }}
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        {{ BsForm::text('welcome_text_en')->value(Settings::get('welcome_text_en'))->label(__('Welcome Text (en)')) }}
                    </div>
                    <div class="col-6">
                        {{ BsForm::text('welcome_text_ar')->value(Settings::get('welcome_text_ar'))->label(__('Welcome Text (ar)')) }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header" id="heading2">
            <h2 class="mb-0">
                <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                    data-target="#collapse2" aria-expanded="true" aria-controls="collapse2">
                    # {{ __('Menu Items') }}
                </button>
            </h2>
        </div>

        <div id="collapse2" class="collapse" aria-labelledby="heading2" data-parent="#accordionExample">
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        {{ BsForm::text('menu_home_en')->value(Settings::get('menu_home_en'))->label(__('Home (en)')) }}
                    </div>
                    <div class="col-6">
                        {{ BsForm::text('menu_home_ar')->value(Settings::get('menu_home_ar'))->label(__('Home (ar)')) }}
                    </div>
                </div>

                <div class="row">
                    <div class="col-6">
                        {{ BsForm::text('menu_home_en')->value(Settings::get('menu_home_en'))->label(__('Home (en)')) }}
                    </div>
                    <div class="col-6">
                        {{ BsForm::text('menu_home_ar')->value(Settings::get('menu_home_ar'))->label(__('Home (ar)')) }}
                    </div>
                </div>

                <div class="row">
                    <div class="col-6">
                        {{ BsForm::text('menu_services_en')->value(Settings::get('menu_services_en'))->label(__('Services (en)')) }}
                    </div>
                    <div class="col-6">
                        {{ BsForm::text('menu_services_ar')->value(Settings::get('menu_services_ar'))->label(__('Services (ar)')) }}
                    </div>
                </div>

                <div class="row">
                    <div class="col-6">
                        {{ BsForm::text('menu_gallery_en')->value(Settings::get('menu_gallery_en'))->label(__('Gallery (en)')) }}
                    </div>
                    <div class="col-6">
                        {{ BsForm::text('menu_gallery_ar')->value(Settings::get('menu_gallery_ar'))->label(__('Gallery (ar)')) }}
                    </div>
                </div>

                <div class="row">
                    <div class="col-6">
                        {{ BsForm::text('menu_donation_en')->value(Settings::get('menu_donation_en'))->label(__('Donation (en)')) }}
                    </div>
                    <div class="col-6">
                        {{ BsForm::text('menu_donation_ar')->value(Settings::get('menu_donation_ar'))->label(__('Donation (ar)')) }}
                    </div>
                </div>

                <div class="row">
                    <div class="col-6">
                        {{ BsForm::text('menu_contact_en')->value(Settings::get('menu_contact_en'))->label(__('Contact Us (en)')) }}
                    </div>
                    <div class="col-6">
                        {{ BsForm::text('menu_contact_ar')->value(Settings::get('menu_contact_ar'))->label(__('Contact Us (ar)')) }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header" id="heading3">
            <h2 class="mb-0">
                <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                    data-target="#collapse3" aria-expanded="true" aria-controls="collapse3">
                    # {{ __('Footer Items') }}
                </button>
            </h2>
        </div>

        <div id="collapse3" class="collapse" aria-labelledby="heading3" data-parent="#accordionExample">
            <div class="card-body">

                <div class="row">
                    <div class="col-6">
                        {{ BsForm::text('footer_contactinfo_en')->value(Settings::get('footer_contactinfo_en'))->label(__('Contact Information (en)')) }}
                    </div>
                    <div class="col-6">
                        {{ BsForm::text('footer_contactinfo_ar')->value(Settings::get('footer_contactinfo_ar'))->label(__('Contact Information (ar)')) }}
                    </div>
                </div>

                <div class="row">
                    <div class="col-6">
                        {{ BsForm::text('footer_addresses_en')->value(Settings::get('footer_addresses_en'))->label(__('Addresses (en)')) }}
                    </div>
                    <div class="col-6">
                        {{ BsForm::text('footer_addresses_ar')->value(Settings::get('footer_addresses_ar'))->label(__('Addresses (ar)')) }}
                    </div>
                </div>

                <div class="row">
                    <div class="col-6">
                        {{ BsForm::text('footer_email_en')->value(Settings::get('footer_email_en'))->label(__('Email (en)')) }}
                    </div>
                    <div class="col-6">
                        {{ BsForm::text('footer_email_ar')->value(Settings::get('footer_email_ar'))->label(__('Email (ar)')) }}
                    </div>
                </div>

                <div class="row">
                    <div class="col-6">
                        {{ BsForm::text('footer_phone_en')->value(Settings::get('footer_phone_en'))->label(__('Phone (en)')) }}
                    </div>
                    <div class="col-6">
                        {{ BsForm::text('footer_phone_ar')->value(Settings::get('footer_phone_ar'))->label(__('Phone (ar)')) }}
                    </div>
                </div>

                <div class="row">
                    <div class="col-6">
                        {{ BsForm::text('footer_copyright_en')->value(Settings::get('footer_copyright_en'))->label(__('Copyright (en)')) }}
                    </div>
                    <div class="col-6">
                        {{ BsForm::text('footer_copyright_ar')->value(Settings::get('footer_copyright_ar'))->label(__('Copyright (ar)')) }}
                    </div>
                </div>

            </div>
        </div>
    </div>

</div>
