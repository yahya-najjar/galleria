<x-master title="Dashboard">
    @section('style')
        <meta name="csrf-token" id="csrf-token" content="{{ csrf_token() }}">
    @endsection
    <div class="container">
        <div class="row col-xs-12">
            <div class="col-xl-8">
                <!--begin::Forms Widget 1-->
                <div class="card card-custom card-shadowless gutter-b card-stretch card-shadowless p-0">
                    <!--begin::Nav Tabs-->
                    <ul class="dashboard-tabs nav nav-pills nav-danger row row-paddingless m-0 p-0" role="tablist">
                        <!--begin::Item-->
                        <li class="nav-item d-flex col flex-grow-1 flex-shrink-0 mr-3 mb-3 mb-lg-0">
                            <a class="nav-link active border py-10 d-flex flex-grow-1 rounded flex-column align-items-center" data-toggle="pill" href="#forms_widget_tab_1">
                                <span class="nav-icon py-2 w-auto">
                                    {{ getSVG('assets/media/svg/icons/Home/Library.svg', 'svg-icon-3x') }}
                                </span>
                                <span class="nav-text font-size-lg py-2 font-weight-bold text-center">{{ __('admin.sales_dashboard') }}</span>
                            </a>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="nav-item d-flex col flex-grow-1 flex-shrink-0 mr-3 mb-3 mb-lg-0">
                            <a class="nav-link border py-10 d-flex flex-grow-1 rounded flex-column align-items-center" data-toggle="pill" href="#forms_widget_tab_2">
                                <span class="nav-icon py-2 w-auto">
                                    {{ getSVG('assets/media/svg/icons/Media/Equalizer.svg', 'svg-icon-3x') }}
                                </span>
                                <span class="nav-text font-size-lg py-2 font-weight-bolder text-center">{{ __('admin.business_chars') }}</span>
                            </a>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="nav-item d-flex col flex-grow-1 flex-shrink-0 mr-3 mb-3 mb-lg-0">
                            <a class="nav-link border py-10 d-flex flex-grow-1 rounded flex-column align-items-center" data-toggle="pill" href="#forms_widget_tab_3">
                                <span class="nav-icon py-2 w-auto">
                                    {{ getSVG('assets/media/svg/icons/Clothes/T-Shirt.svg', 'svg-icon-3x') }}
                                </span>
                                <span class="nav-text font-size-lg py-2 font-weight-bolder text-center">{{ __('admin.most_sell_products') }}</span>
                            </a>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="nav-item d-flex col flex-grow-1 flex-shrink-0 mr-3 mb-3 mb-lg-0">
                            <a class="nav-link border py-10 d-flex flex-grow-1 rounded flex-column align-items-center" data-toggle="pill" href="#forms_widget_tab_4">
                                <span class="nav-icon py-2 w-auto">
                                    {{ getSVG('assets/media/svg/icons/Communication/Group.svg', 'svg-icon-3x') }}
                                </span>
                                <span class="nav-text font-size-lg py-2 font-weight-bolder text-center">{{ __('admin.best_customers') }}</span>
                            </a>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="nav-item d-flex col flex-grow-1 flex-shrink-0 mr-3">
                            <a class="nav-link border py-10 d-flex flex-grow-1 rounded flex-column align-items-center" data-toggle="pill" href="#forms_widget_tab_5">
                                <span class="nav-icon py-2 w-auto">
                                    {{ getSVG('assets/media/svg/icons/General/Shield-check.svg', 'svg-icon-3x') }}
                                </span>
                                <span class="nav-text font-size-lg py-2 font-weight-bolder text-center">System Security</span>
                            </a>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="nav-item d-flex col flex-grow-1 flex-shrink-0 mr-0 mb-3 mb-lg-0">
                            <a class="nav-link border py-10 d-flex flex-grow-1 rounded flex-column align-items-center" data-toggle="pill" href="#forms_widget_tab_6">
                                <span class="nav-icon py-2 w-auto">
                                    {{ getSVG('assets/media/svg/icons/Media/Equalizer.svg', 'svg-icon-3x') }}
                                </span>
                                <span class="nav-text font-size-lg py-2 font-weight-bolder text-center">Important Reports</span>
                            </a>
                        </li>
                        <!--end::Item-->
                    </ul>
                    <!--end::Nav Tabs-->
                </div>
                <!--end::Forms Widget 1-->
            </div>
            <div class="col-xl-4">
                <!--begin::Engage Widget 8-->
                <div class="card card-custom gutter-b card-stretch card-shadowless">
                    <div class="card-body p-0 d-flex pt-9">
                        <div class="d-flex align-items-start justify-content-start flex-grow-1 bg-light-warning p-8 card-rounded flex-grow-1 position-relative">
                            <div class="d-flex flex-column align-items-start flex-grow-1 h-100">
                                <div class="p-1 flex-grow-1">
                                    <h4 class="text-warning font-weight-bolder">Get more features now</h4>
                                    <p class="text-dark-50 font-weight-bold mt-3">Pay 0$ for the First Month</p>
                                </div>
                                <a href='#' class="btn btn-link btn-link-warning font-weight-bold">Call Octopus
                                    <span class="svg-icon svg-icon-lg svg-icon-warning">
                                        {{ getSVG('assets/media/svg/icons/Navigation/Arrow-right.svg') }}
                                    </span>
                                </a>
                            </div>
                            <div class="position-absolute right-0 bottom-0 mr-5 overflow-hidden">
                                <img src="{{ asset('assets/media/svg/humans/custom-13.svg') }}" class="max-h-200px max-h-xl-275px mb-n20" alt="" />
                            </div>
                        </div>
                    </div>
                </div>
                <!--end::Engage Widget 8-->
            </div>
        </div>
        <!--begin::Nav Content-->
        <div class="tab-content m-0 p-0 mb-20 mt-10">
            <div class=" row col-12 tab-pane active" id="forms_widget_tab_1" role="tabpanel">

            </div>
            <div class="tab-pane" id="forms_widget_tab_2" role="tabpanel">

            </div>
            <div class="tab-pane" id="forms_widget_tab_3" role="tabpanel">

            </div>
            <div class="tab-pane" id="forms_widget_tab_4" role="tabpanel">

            </div>
            <div class="tab-pane" id="forms_widget_tab_5" role="tabpanel">
                System Security
            </div>
            <div class="tab-pane" id="forms_widget_tab_6" role="tabpanel">
                Important Reports
            </div>
        </div>
    </div>
    @section('scripts')
        <script src="{{ asset('/js/dashboard.js') }}"></script>
    @endsection
</x-master>
