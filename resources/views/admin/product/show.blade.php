@extends('layouts.main')
@section('content')
    <!--begin::Main-->
    <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
        <!--begin::Content wrapper-->
        <div class="d-flex flex-column flex-column-fluid">
            <!--begin::Toolbar-->
            <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
                <!--begin::Toolbar container-->
                <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
                    <!--begin::Page title-->
                    <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                        <!--begin::Title-->
                        <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                            {{ ('عرض بيانات المنتج') }}</h1>
                        <!--end::Title-->
                        <!--begin::Breadcrumb-->
                        <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                            <!--begin::Item-->
                            <li class="breadcrumb-item text-muted">
                                <a href="" class="text-muted text-hover-primary">{{ __('dashboard.mainPage') }}</a>
                            </li>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <li class="breadcrumb-item">
                                <span class="bullet bg-gray-400 w-5px h-2px"></span>
                            </li>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <li class="breadcrumb-item text-muted">{{ ('المنتج') }}</li>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <li class="breadcrumb-item">
                                <span class="bullet bg-gray-400 w-5px h-2px"></span>
                            </li>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <li class="breadcrumb-item text-muted">{{'عرض المنتج' }}</li>
                            <!--end::Item-->
                        </ul>
                        <!--end::Breadcrumb-->
                    </div>
                    <!--end::Page title-->

                </div>
                <!--end::Toolbar container-->
            </div>
            <!--end::Toolbar-->
            <!--begin::Content-->


            <div id="kt_app_content" class="app-content flex-column-fluid">




                <!--begin::Content container-->
                <div id="kt_app_content_container" class="app-container container-xxl">

                    @include('layouts.sessions-messages')
                    {{-- show driver --}}
                    <div class="form d-flex flex-column flex-lg-row">
                        <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-12">
                            <!--begin::General options-->
                            <div class="card card-flush py-4">
                                <!--begin::Card header-->
                                <div class="card-header">
                                    <div class="card-title">
                                        <h2>{{ __('dashboard.general') }}</h2>
                                    </div>
                                </div>
                                <!--end::Card header-->
                                <!--begin::Card body-->
                                <div class="card-body pt-0">


                                    <div class="row mb-2">
                                        <!--begin::Col-->
                                        <div class="col-lg-6">
                                            <!--begin::Row-->
                                            <div class="d-flex flex-column flex-row-fluid mt-3">
                                                <h5>{{ 'بيانات المنتج'}} </h5>
                                                <div class="d-flex flex-row flex-column-fluid">
                                                    <div class="d-flex flex-row-fluid ">
                                                        <div class="mt-3">
                                                            <!--begin::Details-->
                                                            <table class="col-lg-6 table fs-6 fw-bold gs-0 gy-2 gx-2">
                                                                <tbody>

                                                                     <tr class="">
                                                                        <td class="text-gray-400">
                                                                            {{ ' صورة المنتج' }}</td>

                                                                        <td>
                                                                            <td>
                                                                                <img src="{{ asset('storage/'.$product->image) }}"
                                                                                    height="30" width="30" />
                                                                            </td>
                                                                        </td>

                                                                    </tr>
                                                                    <tr class="">
                                                                        <td class="text-gray-400">
                                                                            {{'اسم المنتج'}}</td>
                                                                        <td class="text-gray-800">
                                                                            {{ $product->name }}
                                                                        </td>
                                                                    </tr>
                                                                    <tr class="">
                                                                        <td class="text-gray-400">
                                                                            {{ 'سعر المنتج ' }}</td>
                                                                        <td class="text-gray-800">
                                                                            {{ $product->price }}
                                                                        </td>
                                                                    </tr>

                                                                    <tr class="">
                                                                        <td class="text-gray-400">
                                                                            {{'اسم المطعم'}}</td>
                                                                        <td class="text-gray-800">
                                                                            {{ $product->resturant->name }}
                                                                        </td>
                                                                    </tr>
                                                                    <tr class="">
                                                                        <td class="text-gray-400">
                                                                            {{' نوع الوجبة'}}</td>
                                                                        <td class="text-gray-800">
                                                                            {{ $product->productType->name }}
                                                                        </td>
                                                                    </tr>

                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--end::Row-->
                                        </div>
                                        <!--begin::Row-->
                                        <!--end::Row-->
                                    </div>
                                    <!--end::Col-->

                                    <div class="row mb-2">
                                        <!--begin::Col-->
                                        <div class="col-lg-6">
                                            <!--begin::Row-->
                                            <div class="d-flex flex-column flex-row-fluid mt-3">
                                                <h5>{{ 'بيانات المطعم'}} </h5>
                                                <div class="d-flex flex-row flex-column-fluid">
                                                    <div class="d-flex flex-row-fluid ">
                                                        <div class="mt-3">
                                                            <!--begin::Details-->
                                                            <table class="col-lg-6 table fs-6 fw-bold gs-0 gy-2 gx-2">
                                                                <tbody>

                                                                    <tr class="">
                                                                        <td class="text-gray-400">
                                                                            {{'الاسم '}}</td>
                                                                        <td class="text-gray-800">
                                                                            {{ $product->resturant->name }}
                                                                        </td>
                                                                    </tr>
                                                                    <tr class="">
                                                                        <td class="text-gray-400">
                                                                            {{ 'المدير ' }}</td>
                                                                        <td class="text-gray-800">
                                                                            {{ $product->resturant->manager_name }}
                                                                        </td>
                                                                    </tr>

                                                                    <tr class="">
                                                                        <td class="text-gray-400">
                                                                            {{'الهاتف '}}</td>
                                                                        <td class="text-gray-800">
                                                                            {{ $product->resturant->phone }}
                                                                        </td>
                                                                    </tr>
                                                                    <tr class="">
                                                                        <td class="text-gray-400">
                                                                            {{' الايميل '}}</td>
                                                                        <td class="text-gray-800">
                                                                            {{ $product->resturant->email }}
                                                                        </td>
                                                                    </tr>

                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--end::Row-->
                                        </div>
                                        <!--begin::Row-->
                                        <!--end::Row-->
                                    </div>
                                    <!--end::Col-->

                                    <div class="d-flex flex-column flex-row-fluid mt-3">
                                        <h5>{{ ('الطلبات') }}</h5>
                                        <div class="d-flex flex-row flex-column-fluid">
                                            <div class="d-flex flex-row-fluid justify-content-center ">

                                                <table class="table w-100">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">#</th>
                                                            <th scope="col">'رقم الطلب' </th>
                                                            <th scope="col">' المنتج' </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($orders as $key => $order)
                                                            <tr>
                                                                <th scope="row">{{ $key + 1 }}</th>
                                                                <td>{{ $order->id }}</td>
                                                                <td><a href="{{ url('admin/order/' . $order->id) }}">{{ $order->product->name }}</a></td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                               </div>
                                            </div>
                                        </div>
                                    </div>





                            </div>
                            <!--end::Card header-->
                        </div>
                        <!--end::General options-->
                    </div>
                    <!--end::Main column-->
                </div>
                {{--  Show Driver --}}
            </div>
            <!--end::Content container-->
        </div>
        <!--end::Content-->
    </div>
    <!--end::Content wrapper-->

    </div>
    <!--end:::Main-->
@endsection
@section('scripts')
    {{-- {{ $dataTable->scripts() }}
    <script>
        $('input[name=account_podcast]').on('click', function() {
            if ($(this).val() == 'limited') {
                $('#limit').show();
            } else {
                $('#limit').hide();
            }
        });
    </script>
    <script src="{{ asset('assets/js/custom/apps/ecommerce/catalog/save-driver.js') }}"></script>
    <script src="{{ asset('assets/js/widgets.bundle.js') }}"></script>
    <script src="{{ asset('assets/js/custom/widgets.js') }}"></script>
    <script src="{{ asset('assets/js/custom/utilities/modals/upgrade-plan.js') }}"></script>
    <script src="{{ asset('assets/js/custom/utilities/modals/create-app.js') }}"></script>
    <script src="{{ asset('assets/js/custom/utilities/modals/users-search.js') }}"></script> --}}
@endsection
