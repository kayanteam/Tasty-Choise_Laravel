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
                    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">الاشعارات
                    </h1>
                    <!--end::Title-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">
                            <a href="{{route('dashboard')}}" class="text-muted text-hover-primary">الرئيسية</a>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-400 w-5px h-2px"></span>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">ارسال اشعار</li>
                        <!--end::Item-->
                    </ul>
                    <!--end::Breadcrumb-->
                </div>
                <!--end::Page title-->

            </div>
            <!--end::Toolbar container-->
        </div>
        <div id="kt_app_content" class="app-content flex-column-fluid">
            <!--begin::Content container-->
            <div id="kt_app_content_container" class="app-container container-xxl">

                <!--begin::Inbox App - Compose -->
                <div class="d-flex flex-column flex-lg-row">
                    <!--begin::Sidebar-->
                    <div class="d-none d-lg-flex flex-column flex-lg-row-auto w-100 w-lg-275px" data-kt-drawer="true"
                        data-kt-drawer-name="inbox-aside" data-kt-drawer-activate="{default: true, lg: false}"
                        data-kt-drawer-overlay="true" data-kt-drawer-width="225px" data-kt-drawer-direction="start"
                        data-kt-drawer-toggle="#kt_inbox_aside_toggle">
                        <!--begin::Sticky aside-->
                        <div class="card card-flush mb-0" data-kt-sticky="true" data-kt-sticky-name="inbox-aside-sticky"
                            data-kt-sticky-offset="{default: false, xl: '100px'}" data-kt-sticky-width="{lg: '275px'}"
                            data-kt-sticky-left="auto" data-kt-sticky-top="100px" data-kt-sticky-animation="false"
                            data-kt-sticky-zindex="95">
                            {{-- <!--begin::Aside content-->
                            <div class="card-body">
                                <!--begin::Button-->
                                <a href="{{route('messages.index')}}"
                                    class="btn btn-primary fw-bold w-100 mb-8">رجوع</a>
                                <!--end::Button-->
                              
                            </div>
                            <!--end::Aside content--> --}}
                        </div>
                        <!--end::Sticky aside-->
                    </div>
                    <!--end::Sidebar-->
                    <!--begin::Content-->
                    <div class="flex-lg-row-fluid ms-lg-7 ms-xl-10">
                        @include('layouts.sessions-messages')

                        <!--begin::Card-->
                        <div class="card">
                            <div class="card-header align-items-center">
                                <div class="card-title">
                                    <h2> ارسال رسالة</h2>
                                </div>
                            </div>
                         
                            <div class="card-body p-0">
                                <!--begin::Form-->
                                <form id="kt_inbox_compose_form" method="POST" action="{{route('messages.store')}}">
                                    @csrf
                                    <!--begin::Body-->
                                    <div class="d-block">
                                        

                                        <!--begin::Subject-->
                                        <div class="border-bottom">
                                            <input class="form-control form-control-transparent border-0 px-8 min-h-45px"
                                                name="title" value="{{old('title')}}" placeholder="الموضوع">
                                        </div>
                                        <!--end::Subject-->
                                        <!--begin::Message-->
                                     
                                        <div id="kt_inbox_form_editor" class="bg-transparent border-0 h-350px px-3 ql-container ql-snow">
                                            <textarea name="body" placeholder="رسالتك هنا" class="h-300px w-100 form-control">{{old('body')}}</textarea>
                                        </div>
                                        <!--end::Message-->
                                       
                                    </div>

                                    <!--end::Body-->
                                    <!--begin::Footer-->
                                    <div class="d-flex flex-stack flex-wrap gap-2 py-5 ps-8 pe-5 border-top">
                                        <!--begin::Actions-->
                                        <div class="d-flex align-items-center me-3">
                                            <!--begin::Send-->
                                            <div class="btn-group me-4">
                                                <button type="submit" class="btn btn-primary">ارسال</button>
                    
                                            </div>
                                            <!--end::Send-->
                                          
                                          
                                        </div>
                                        <!--end::Actions-->
                                      
                                    </div>
                                    <!--end::Footer-->
                                </form>
                                <!--end::Form-->
                            </div>
                        </div>
                        <!--end::Card-->
                    </div>
                    <!--end::Content-->
                </div>
                <!--end::Inbox App - Compose -->
            </div>
            <!--end::Content container-->
        </div>
    </div>
    <!--end::Content wrapper-->
@endsection
@section('scripts')
    <script src="{{ asset('assets/js/custom/apps/inbox/compose.js') }}"></script>

    <script src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
    {{-- <script src="{{ asset('assets/js/custom/apps/user-management/users/list/table.js') }}"></script> --}}
    <script src="{{ asset('assets/js/widgets.bundle.js') }}"></script>
    <script src="{{ asset('assets/js/custom/widgets.js') }}"></script>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready(function() {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $("#kt_ecommerce_category_table").DataTable({
                processing: true,
                serverSide: true,
                order: true,
                stateSave: true,
                ajax: "{{-- route('langs.index') --}}",
                columns: [{
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'status',
                        name: 'status'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },
                ]
            });
        });
    </script>
    <script>

        // $('.js-example-basic-multiple').select2({
        //     placeholder: "اختر المستخدمين",
        //     allowClear: false ,
        //     ajax: {
        //     url: "{{--route('api-get-users-select2')--}}",
        //     data : function(params){
        //         return {
        //             name : params.term
        //         }
        //     },
        //     dataType: 'json',
        //     delay: 250,
        //     processResults: function (data, params) {
        //         console.log(data);
        //         return {
        //             results: data
        //         };
        //     },
        //     cache: true
        //     },
        //     minimumInputLength: 1,
        //     maximumSelectionLength: 1,
        //     templateResult : function(data){
        //         if(data.loading){
        //             return data.text;
        //         }
        //         return data.name;
        //     },
        // });

    </script>
@endsection
