@extends('dashboard::layouts.default')

@section('title')
    {{ $method->name }}
@endsection
@section('content')
    @component('dashboard::layouts.components.page')
        @slot('title', $method->name)
        @slot('breadcrumbs', ['dashboard.methods.show', $method])

        <div class="row">
            <div class="col-md-6">
                @component('dashboard::layouts.components.box')
                    @slot('bodyClass', 'p-0')

                    <table class="table table-middle">
                        <tbody>
                        <tr>
                            <th width="200">@lang('donations::methods.attributes.name')</th>
                            <td>{{ $method->name }}</td>
                        </tr>
                        <tr>
                            <th width="200">@lang('donations::methods.attributes.image')</th>
                            <td>
                                <img src="{{ $method->getImage() }}"
                                     class="img img-size-"
                                     alt="{{ $method->name }}">
                            </td>
                        </tr>
                        </tbody>
                    </table>

                    @slot('footer')
                        @include('donations::methods.partials.actions.edit')
                        @include('donations::methods.partials.actions.delete')
                    @endslot
                @endcomponent
            </div>
        </div>

    @endcomponent
@endsection
