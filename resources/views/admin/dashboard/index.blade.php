@extends('admin.layouts.dashboard-layout')

@section('title', 'Dashboard')

@section('content')

<div class="kt-container  kt-grid__item kt-grid__item--fluid">

    <!--Begin::Dashboard 4-->

    <!--Begin::Row-->
    <div class="row">
        <div class="col-xl-12">

            <!--begin:: Widgets/Quick Stats-->
            <div class="row row-full-height">
                <div class="col-sm-12 col-md-12 col-lg-6">
                    <div class="kt-portlet kt-portlet--height-fluid-half kt-portlet--border-bottom-brand">
                        <div class="kt-portlet__body kt-portlet__body--fluid">
                            <div class="kt-widget26">
                                <div class="kt-widget26__content">
                                    <span class="kt-widget26__number">{{ count($members) }}</span>
                                    <span class="kt-widget26__desc">Members</span>
                                </div>
                                <div class="kt-widget26__chart" style="height:100px; width: 230px;">
                                    <canvas id="kt_chart_quick_stats_1"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="kt-space-20"></div>
                    <div class="kt-portlet kt-portlet--height-fluid-half kt-portlet--border-bottom-danger">
                        <div class="kt-portlet__body kt-portlet__body--fluid">
                            <div class="kt-widget26">
                                <div class="kt-widget26__content">
                                    <span class="kt-widget26__number">{{count($subscribers)}}</span>
                                    <span class="kt-widget26__desc">Subscribers</span>
                                </div>
                                <div class="kt-widget26__chart" style="height:100px; width: 230px;">
                                    <canvas id="kt_chart_quick_stats_2"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-6">
                    <div class="kt-portlet kt-portlet--height-fluid-half kt-portlet--border-bottom-success">
                        <div class="kt-portlet__body kt-portlet__body--fluid">
                            <div class="kt-widget26">
                                <div class="kt-widget26__content">
                                    <span class="kt-widget26__number">{{count($prayer_requests)}}</span>
                                    <span class="kt-widget26__desc">Prayer Requests</span>
                                </div>
                                <div class="kt-widget26__chart" style="height:100px; width: 230px;">
                                    <canvas id="kt_chart_quick_stats_3"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="kt-space-20"></div>
                    <div class="kt-portlet kt-portlet--height-fluid-half kt-portlet--border-bottom-warning">
                        <div class="kt-portlet__body kt-portlet__body--fluid">
                            <div class="kt-widget26">
                                <div class="kt-widget26__content">
                                    <span class="kt-widget26__number">{{ $donations }}</span>
                                    <span class="kt-widget26__desc">Donations</span>
                                </div>
                                <div class="kt-widget26__chart" style="height:100px; width: 230px;">
                                    <canvas id="kt_chart_quick_stats_4"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!--end:: Widgets/Quick Stats-->
        </div>
    </div>

    <!--End::Row-->


    <!--Begin::Row-->
    <div class="row">
        <div class="col-xl-6">

            <!--begin:: Widgets/Application Sales-->
            <div class="kt-portlet kt-portlet--height-fluid">
                <div class="kt-portlet__head">
                    <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title">
                            Recent Testimonies
                        </h3>
                    </div>
                </div>
                <div class="kt-portlet__body">
                    <div class="tab-content">
                        <div class="tab-pane active" id="kt_widget11_tab1_content">

                            <!--begin::Widget 11-->
                            <div class="kt-widget11">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <td></td>
                                                <td>Name</td>
                                                <td>Title</td>
                                                <td>Phone Number</td>
                                                <td class="kt-align-right">Status</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($recent_testimonies as $item)
                                            <tr>
                                                <td>
                                                    <label class="kt-checkbox kt-checkbox--single"><input type="checkbox"><span></span></label>
                                                </td>
                                                <td>
                                                    <span class="kt-widget11__title">{{ $item->name }}</span>
                                                </td>
                                                <td>{{ $item->title }}</td>
                                                <td>
                                                   {{ $item->phone_number }}</span>
                                                </td>
                                                <td>
                                                    <span class="kt-badge kt-badge--warning kt-badge--inline">{{ $item->status }}</span>
                                                </td>
                                            </tr>
                                            @empty
                                                <div class="container" style="text-align:center">
                                                        No Recent Testimonies
                                                </div>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                                <div class="kt-widget11__action kt-align-right">
                                    <a href="{{ route('admin.testimonies') }}" class="btn btn-label-success btn-sm btn-bold">View All Testimonies</a>
                                </div>
                            </div>

                            <!--end::Widget 11-->
                        </div>
                        <div class="tab-pane" id="kt_widget11_tab2_content">

                            <!--begin::Widget 11-->
                            <div class="kt-widget11">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <td style=" width: 1%;"></td>
                                                <td style=" width: 20%;">Application</td>
                                                <td style=" width: 10%;">Sales</td>
                                                <td style=" width: 20%;">Change</td>
                                                <td style=" width: 10%;">Status</td>
                                                <td style=" width: 10%;" class="kt-align-right">Total</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <label class="kt-checkbox kt-checkbox--single">
                                                        <input type="checkbox"><span></span>
                                                    </label>
                                                </td>
                                                <td>
                                                    <span class="kt-widget11__title">Loop</span>
                                                    <span class="kt-widget11__sub">CRM System</span>
                                                </td>
                                                <td>19,200</td>
                                                <td>
                                                    <div class="kt-widget11__chart" style="height:50px; width: 100px">
                                                        <canvas id="kt_chart_sales_by_apps_2_1" style="display: block; width: 0px; height: 0px;" height="0" width="0"></canvas>
                                                    </div>
                                                </td>
                                                <td><span class="kt-badge kt-badge--danger kt-badge--inline">in process</span></td>
                                                <td class="kt-align-right kt-font-brand">$34,740</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label class="kt-checkbox kt-checkbox--single"><input type="checkbox"><span></span></label>
                                                </td>
                                                <td>
                                                    <span class="kt-widget11__title">Selto</span>
                                                    <span class="kt-widget11__sub">Powerful Website Builder</span>
                                                </td>
                                                <td>24,310</td>
                                                <td>
                                                    <div class="kt-widget11__chart" style="height:50px; width: 100px">
                                                        <canvas id="kt_chart_sales_by_apps_2_2" style="display: block; width: 0px; height: 0px;" height="0" width="0"></canvas>
                                                    </div>
                                                </td>
                                                <td><span class="kt-badge kt-badge--success kt-badge--inline">new</span></td>
                                                <td class="kt-align-right kt-font-brand">$46,010</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label class="kt-checkbox kt-checkbox--single"><input type="checkbox"><span></span></label>
                                                </td>
                                                <td>
                                                    <span class="kt-widget11__title">Jippo</span>
                                                    <span class="kt-widget11__sub">The Best Selling App</span>
                                                </td>
                                                <td>9,076</td>
                                                <td>
                                                    <div class="kt-widget11__chart" style="height:50px; width: 100px">
                                                        <canvas id="kt_chart_sales_by_apps_2_3" style="display: block; width: 0px; height: 0px;" height="0" width="0"></canvas>
                                                    </div>
                                                </td>
                                                <td><span class="kt-badge kt-badge--brand kt-badge--inline">approved</span></td>
                                                <td class="kt-align-right kt-font-brand">$67,800</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label class="kt-checkbox kt-checkbox--single"><input type="checkbox"><span></span></label>
                                                </td>
                                                <td>
                                                    <span class="kt-widget11__title">Verto</span>
                                                    <span class="kt-widget11__sub">Web Development Tool</span>
                                                </td>
                                                <td>11,094</td>
                                                <td>
                                                    <div class="kt-widget11__chart" style="height:50px; width: 100px">
                                                        <canvas id="kt_chart_sales_by_apps_2_4" style="display: block; width: 0px; height: 0px;" height="0" width="0"></canvas>
                                                    </div>
                                                </td>
                                                <td><span class="kt-badge kt-badge--danger kt-badge--inline">pending</span></td>
                                                <td class="kt-align-right kt-font-brand">$18,520</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="kt-widget11__action kt-align-right">
                                    <button type="button" class="btn btn-outline-brand btn-bold">View All Records</button>
                                </div>
                            </div>

                            <!--end::Widget 11-->
                        </div>
                    </div>
                </div>
            </div>

            <!--end:: Widgets/Application Sales-->
        </div>
    </div>

    <!--End::Row-->

    <!--End::Dashboard 4-->
</div>

@endsection

@section('scripts')

    <script>
        $(document).ready(function () {

                @if(Session::has('success'))
                        Swal.fire(
                                    'Yaay!',
                                    '{{ Session::get('success') }}',
                                    'success'
                                    )

                @endif
        });

    </script>


@endsection
