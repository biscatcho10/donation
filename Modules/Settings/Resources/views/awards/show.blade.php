@extends('dashboard::layouts.default')

@section('title')
    {{ $award->name }}
@endsection
@section('content')
    @component('dashboard::layouts.components.page')
        @slot('title', $award->name)
        @slot('breadcrumbs', ['dashboard.awards.show', $award])

        <div class="row">
            <div class="col-md-6">
                @component('dashboard::layouts.components.box')
                    @slot('bodyClass', 'p-0')

                    <table class="table table-middle">
                        <tbody>
                        <tr>
                            <th width="200">@lang('settings::awards.attributes.name')</th>
                            <td>{{ $award->name }}</td>
                        </tr>
                        <tr>
                            <th width="200">@lang('settings::awards.attributes.date')</th>
                            <td>{{ $award->date }}</td>
                        </tr>
                        <tr>
                            <th width="200">@lang('settings::awards.attributes.image')</th>
                            <td>
                                <img src="{{ $award->getImage() }}"
                                     class="img img-size-"
                                     alt="{{ $award->name }}">
                            </td>
                        </tr>
                        </tbody>
                    </table>

                    @slot('footer')
                        @include('settings::awards.partials.actions.edit')
                        @include('settings::awards.partials.actions.delete')
                    @endslot
                @endcomponent
            </div>
        </div>

    @endcomponent
@endsection
