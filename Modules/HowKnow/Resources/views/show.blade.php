@extends('dashboard::layouts.default')

@section('title')
    {{ $reason->reason }}
@endsection

@section('content')
    @component('dashboard::layouts.components.page')
        @slot('title', $reason->reason)
        @slot('breadcrumbs', ['dashboard.reasons.show', $reason])

        <div class="row">
            <div class="col-md-6">
                @component('dashboard::layouts.components.box')
                    @slot('bodyClass', 'p-0')

                    <table class="table table-middle">
                        <tbody>
                        <tr>
                            <th width="200">@lang('howknow::reasons.attributes.reason')</th>
                            <td>{{ $reason->reason }}</td>
                        </tr>
                        </tbody>
                    </table>

                    @slot('footer')
                        @include('howknow::partials.actions.edit')
                        @include('howknow::partials.actions.delete')
                    @endslot
                @endcomponent

            </div>
        </div>

    @endcomponent
@endsection
