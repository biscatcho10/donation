@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="row mt-2">
    <div class="col-12">
        <div class="form-group">
            <label for="">@lang('settings::settings.attributes.facebook_pixel')</label>
            <textarea type="text" name="facebook_pixel" class="form-control" rows="3"> {{ Settings::get('facebook_pixel') }} </textarea>
        </div>
    </div>
</div>
<div class="row my-2">
    <div class="col-6">
        <div class="form-group">
            <label for="">@lang('settings::settings.attributes.google_id_header')</label>
            <textarea type="text" name="google_id_head" class="form-control" rows="3"> {{ Settings::get('google_id_head') }} </textarea>
        </div>
    </div>
    <div class="col-6">
        <div class="form-group">
            <label for="">@lang('settings::settings.attributes.google_id_footer')</label>
            <textarea type="text" name="google_id_footer" class="form-control" rows="3"> {{ Settings::get('google_id_footer') }} </textarea>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-6">
        <div class="form-group">
            <label for="">@lang('settings::settings.attributes.track_code')</label>
            <textarea type="text" name="track_code" class="form-control" rows="3"> {{ Settings::get('track_code') }} </textarea>
        </div>
    </div>
    <div class="col-6">
        <div class="form-group">
            <label for="">@lang('settings::settings.attributes.google_analects')</label>
            <textarea type="text" name="google_analects" class="form-control" rows="3"> {{ Settings::get('google_analects') }} </textarea>
        </div>
    </div>
</div>
<div class="row my-2">
    <div class="col-6">
        <div class="form-group">
            <label for="">@lang('settings::settings.attributes.btn_track_code')</label>
            <textarea type="text" name="btn_track_code" class="form-control" rows="3"> {{ Settings::get('btn_track_code') }} </textarea>
        </div>
    </div>
    <div class="col-6">
        <div class="form-group">
            <label for="">@lang('settings::settings.attributes.btn_google_id_footer')</label>
            <textarea type="text" name="btn_google_id_footer" class="form-control" rows="3"> {{ Settings::get('btn_google_id_footer') }} </textarea>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="form-group">
            <label for="">@lang('settings::settings.attributes.transfer_line')</label>
            <textarea type="text" name="transfer_line" class="form-control" rows="3"> {{ Settings::get('transfer_line') }} </textarea>
        </div>
    </div>
</div>
