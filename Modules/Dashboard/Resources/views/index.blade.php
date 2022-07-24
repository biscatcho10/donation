{{-- Extends layout --}}
@extends('dashboard::layouts.default')

@section('title')
    @lang('dashboard::dashboard.home')
@endsection

{{-- Content --}}
@section('content')
    {{-- Dashboard 1 --}}

    @component('dashboard::layouts.components.page')
        @slot('title', trans('dashboard::dashboard.home'))

        @slot('breadcrumbs', ['dashboard.home'])

        <div class="row">
            <div class="col-lg-12">
                <div class="card no-card-border gutter-b">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <h3 class="m-b-0">@lang('dashboard::dashboard.welcome')</h3>
                                @php
                                    \Date::setLocale(app()->getLocale());
                                    $of = trans('dashboard::dashboard.of');
                                    $date = \Date::now()->format('l jS ' . $of . ' F Y');
                                @endphp
                                <span>{{ $date }}</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Visitors Map -->
                @include("dashboard::layouts.apps.vectoe-map")

                <div class="row">
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title mb-4">Inbox</h4>

                                <ul class="inbox-wid list-unstyled">
                                    <li class="inbox-list-item">
                                        <a href="#">
                                            <div class="media">
                                                <div class="media-body overflow-hidden">
                                                    <h5 class="font-size-16 mb-1">Paul</h5>
                                                    <p class="text-truncate mb-0">Hey! there I'm available</p>
                                                </div>
                                                <div class="font-size-12 ml-2">
                                                    05 min
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="inbox-list-item">
                                        <a href="#">
                                            <div class="media">
                                                <div class="media-body overflow-hidden">
                                                    <h5 class="font-size-16 mb-1">Mary</h5>
                                                    <p class="text-truncate mb-0">This theme is awesome!</p>
                                                </div>
                                                <div class="font-size-12 ml-2">
                                                    12 min
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="inbox-list-item">
                                        <a href="#">
                                            <div class="media">
                                                <div class="media-body overflow-hidden">
                                                    <h5 class="font-size-16 mb-1">Cynthia</h5>
                                                    <p class="text-truncate mb-0">Nice to meet you</p>
                                                </div>
                                                <div class="font-size-12 ml-2">
                                                    18 min
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="inbox-list-item">
                                        <a href="#">
                                            <div class="media">
                                                <div class="media-body overflow-hidden">
                                                    <h5 class="font-size-16 mb-1">Darren</h5>
                                                    <p class="text-truncate mb-0">I've finished it! See you so</p>
                                                </div>
                                                <div class="font-size-12 ml-2">
                                                    2hr ago
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                </ul>

                                <div class="text-center">
                                    <a href="#" class="btn btn-primary btn-sm">Load more</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title mb-4">Latest Transactions</h4>

                                <div class="table-responsive">
                                    <table class="table table-centered">
                                        <thead>
                                            <tr>
                                                <th scope="col">Date</th>
                                                <th scope="col">Id no.</th>
                                                <th scope="col">Billing Name</th>
                                                <th scope="col">Amount</th>
                                                <th scope="col" colspan="2">Payment Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>15/01/2020</td>
                                                <td>
                                                    <a href="#" class="text-body font-weight-medium">#SK1235</a>
                                                </td>
                                                <td>Werner Berlin</td>
                                                <td>$ 125</td>
                                                <td><span class="badge badge-soft-success font-size-12">Paid</span></td>
                                                <td><a href="#" class="btn btn-primary btn-sm">View</a></td>
                                            </tr>
                                            <tr>
                                                <td>16/01/2020</td>
                                                <td>
                                                    <a href="#" class="text-body font-weight-medium">#SK1236</a>
                                                </td>
                                                <td>Robert Jordan</td>
                                                <td>$ 118</td>
                                                <td><span class="badge badge-soft-danger font-size-12">Chargeback</span></td>
                                                <td><a href="#" class="btn btn-primary btn-sm">View</a></td>
                                            </tr>
                                            <tr>
                                                <td>17/01/2020</td>
                                                <td>
                                                    <a href="#" class="text-body font-weight-medium">#SK1237</a>
                                                </td>
                                                <td>Daniel Finch</td>
                                                <td>$ 115</td>
                                                <td><span class="badge badge-soft-success font-size-12">Paid</span></td>
                                                <td><a href="#" class="btn btn-primary btn-sm">View</a></td>
                                            </tr>
                                            <tr>
                                                <td>18/01/2020</td>
                                                <td>
                                                    <a href="#" class="text-body font-weight-medium">#SK1238</a>
                                                </td>
                                                <td>James Hawkins</td>
                                                <td>$ 121</td>
                                                <td><span class="badge badge-soft-warning font-size-12">Refund</span></td>
                                                <td><a href="#" class="btn btn-primary btn-sm">View</a></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <div class="mt-3">
                                    <ul class="pagination pagination-rounded justify-content-center mb-0">
                                        <li class="page-item">
                                            <a class="page-link" href="#">Previous</a>
                                        </li>
                                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                                        <li class="page-item active"><a class="page-link" href="#">2</a></li>
                                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                                        <li class="page-item"><a class="page-link" href="#">Next</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endcomponent
@endsection
