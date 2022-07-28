@isset($item)
@php
    $countries = Modules\Countries\Entities\Country::listsTranslations('name')->pluck('name', 'id')->toArray();
    $cities = Modules\Countries\Entities\City::where('country_id', $item->address()->orderBy('id', 'desc')->first()->country_id ?? old('country_id'))->listsTranslations('name')->pluck('name', 'id')->toArray();
    $country = $item->address()->orderBy('id', 'desc')->first()->country_id;
    $city = $item->address()->orderBy('id', 'desc')->first()->city_id;
@endphp

@else
@php
    $countries = Modules\Countries\Entities\Country::listsTranslations('name')->pluck('name', 'id')->toArray();
    $cities = [];
    $country = old('country_id');
    $city = old('city_id');
@endphp
@endisset

<div class="row">
    <div class="col-12">
        {{ BsForm::text('address_details')->required()->attribute(['data-parsley-maxlength' => '255', 'data-parsley-minlength' => '3'])->value($item->address->address_details ?? "")->label(trans('countries::cities.address')) }}
    </div>
</div>
<div class="row">
    <div class="col-6">
        {{-- <select2
            name="country_id"
            label="{{ __('countries::countries.singular') }}"
            remote-url="{{ route('countries.select') }}"
            @isset($item)
            value="{{ $item->address()->orderBy('id', 'desc')->first()->country_id ?? old('country_id') }}" @endisset
            :required="true">
        </select2> --}}

        {{ BsForm::select('country_id', $countries, $country)->label(trans("countries::countries.singular"))->attribute(["class" => "custom-select country"])->placeholder(__("countries::countries.select")) }}
    </div>

    <div class="col-6">
        {{-- <select2 name="city_id" label="{{ __('countries::cities.singular') }}" remote-url="{{ route('cities.select') }}"
            @isset($item)
            value="{{ $item->address()->orderBy('id', 'desc')->first()->city_id ?? old('city_id') }}" @endisset
            :required="true">
        </select2> --}}

        {{ BsForm::select('city_id', $cities , $city)->label(trans("countries::cities.singular"))->attribute(["class" => "custom-select city"])->placeholder(__("countries::cities.select")) }}
    </div>
</div>


@push('js')
    <script>
        // check if the country is selected
        $(".country").on("change", function () {
            let country = $(this).val();
            let url = "{{ route('cities.index' , 'country_id') }}".replace('country_id', country);
            if (country) {
                $.ajax({
                    url: url,
                    type: "GET",
                    success: function (data) {
                        let cities = data.data.data;
                        console.log(cities);
                        let options = '<option value="">{{ __("countries::cities.select") }}</option>';
                        $.each(cities, function (key, value) {
                            options += '<option value="' + value.id + '">' + value.name + '</option>';
                        });
                        $(".city").html(options);
                    }
                });
            }
        });
    </script>
@endpush
