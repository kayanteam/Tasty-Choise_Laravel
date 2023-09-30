@extends('layouts.main')
@section('content')
    <!--begin::Content wrapper-->
    <div class="d-flex flex-column flex-column-fluid">
        <!--begin::Toolbar-->
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
            <!--begin::Toolbar container-->
            <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
                <!--begin::Page title-->
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                    <!--begin::Title-->
                    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">الموظفين
                    </h1>
                    <!--end::Title-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">
                            <a href="{{ route('dashboard') }}" class="text-muted text-hover-primary">الرئيسية</a>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-400 w-5px h-2px"></span>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">مشاهدة الموظف</li>
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

                <div class="card card-flush py-4 flex-row-fluid overflow-hidden">
                    <!--begin::Card header-->
                    <div class="card-header">
                        <div class="card-title">
                            <h2>الموظف رقم {{ $data->id }}</h2>
                        </div>
                    </div>

                    <div class="card-body pt-0">
                        <!--end::Card header-->
                        <div class="d-flex flex-root">
                            <div class="d-flex flex-column flex-row-auto w-200px">
                                <div class="d-flex flex-column-fluid">
                                    <!--begin::Image input-->
                                    <div class="image-input image-input-circle" data-kt-image-input="true">
                                        <!--begin::Image preview wrapper-->
                                        <div class="image-input-wrapper w-125px h-125px"
                                            style="background-image: url({{$data->image_path}})">
                                        </div>
                                        <!--end::Image preview wrapper-->
                                    </div>
                                    <!--end::Image input-->
                                </div>
                            </div>
                           
                            <div class="d-flex flex-column flex-row-fluid mt-3">
                                <h5>تفاصيل المستخدم</h5>
                                <div class="d-flex flex-row flex-column-fluid">
                                    <div class="d-flex flex-row-fluid ">
                                        <div class="mt-3">
                                            <!--begin::Details-->
                                            <table class="table fs-6 fw-bold gs-0 gy-2 gx-2">
                                                <tbody>
                                                    <tr class="">
                                                        <td class="text-gray-400">الاسم</td>
                                                        <td class="text-gray-800">{{$data->name}}</td>
                                                    </tr>
                                                    <tr class="">
                                                        <td class="text-gray-400">الايميل</td>
                                                        <td class="text-gray-800">{{$data->email}}</td>
                                                    </tr>
                                                    <tr class="">
                                                        <td class="text-gray-400">رقم الجوال</td>
                                                        <td class="text-gray-800">{{$data->phone}}</td>
                                                    </tr>

                                                    <tr class="">
                                                        <td class="text-gray-400">الرقم الوظيفي</td>
                                                        <td class="text-gray-800">{{$data->emp_no}}</td>
                                                    </tr>

                                                    <tr class="">
                                                        <td class="text-gray-400">عدد النقاط</td>
                                                        <td class="text-gray-800">{{$data->points}}</td>
                                                    </tr>


                                                    <tr class="">
                                                        <td class="text-gray-400">الشركة</td>
                                                        <td class="text-gray-800">{{$data->Category->Company->name}}</td>
                                                    </tr>


                                                    <tr class="">
                                                        <td class="text-gray-400">القسم</td>
                                                        <td class="text-gray-800">{{$data->Category->name}}</td>
                                                    </tr>

                                        


                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>



                           
                           
                        </div>
                      

                     


                        <div class="spearator py-5"></div>
                         <!--end::Card header-->
                        

                     
                        {{-- <div class="d-flex flex-root py-5">
                            <div class="d-flex flex-column flex-row-fluid">
                                <div class="d-flex flex-row flex-column-fluid">
                                    <div class="d-flex flex-row-fluid ">
                                        <div >
                                            <!--begin::Details-->
                                            <h5>الماسح الضوئي</h5>
                                            <img style="height: 90px;" src="{{$order->qr_image}}">    
                                        </div>
                                    </div>
                                    <div class="d-flex flex-row-fluid ">
                                        <div >
                                            <!--begin::Details-->
                                            <h5>تنزيل الفاتورة</h5>
                                            <!--begin::Svg Icon | path: assets/media/icons/duotune/general/gen005.svg-->
                                            <a href="{{$order->pdf_path}}"
                                                target="_blank" class="svg-icon svg-icon-success">
                                                <svg class="h-100px w-100px" xmlns="http://www.w3.org/2000/svg"
                                                    width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                    <path opacity="0.3"
                                                        d="M19 22H5C4.4 22 4 21.6 4 21V3C4 2.4 4.4 2 5 2H14L20 8V21C20 21.6 19.6 22 19 22ZM12.5 18C12.5 17.4 12.6 17.5 12 17.5H8.5C7.9 17.5 8 17.4 8 18C8 18.6 7.9 18.5 8.5 18.5L12 18C12.6 18 12.5 18.6 12.5 18ZM16.5 13C16.5 12.4 16.6 12.5 16 12.5H8.5C7.9 12.5 8 12.4 8 13C8 13.6 7.9 13.5 8.5 13.5H15.5C16.1 13.5 16.5 13.6 16.5 13ZM12.5 8C12.5 7.4 12.6 7.5 12 7.5H8C7.4 7.5 7.5 7.4 7.5 8C7.5 8.6 7.4 8.5 8 8.5H12C12.6 8.5 12.5 8.6 12.5 8Z"
                                                        fill="currentColor"></path>
                                                    <rect x="7" y="17" width="6" height="2"
                                                        rx="1" fill="currentColor"></rect>
                                                    <rect x="7" y="12" width="10" height="2"
                                                        rx="1" fill="currentColor"></rect>
                                                    <rect x="7" y="7" width="6" height="2"
                                                        rx="1" fill="currentColor"></rect>
                                                    <path d="M15 8H20L14 2V7C14 7.6 14.4 8 15 8Z" fill="currentColor">
                                                    </path>
                                                </svg>
                                            </a>
                                            <!--end::Svg Icon-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                    <!--end::Card body-->
                </div>
            </div>
            <!--end::Content container-->
        </div>
        <!--end::Content-->
    </div>
    <!--end::Content wrapper-->
@endsection
@section('scripts')
    <script src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
    {{-- <script src="{{asset('assets/js/custom/apps/user-management/users/list/table.js')}}"></script> --}}
    <script src="{{ asset('assets/js/widgets.bundle.js') }}"></script>
    <script src="{{ asset('assets/js/custom/widgets.js') }}"></script>
@endsection
