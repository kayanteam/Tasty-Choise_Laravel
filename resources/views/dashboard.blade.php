@extends('layouts.main')

@section('content')
    

    <div id="kt_app_content" class="app-content flex-column-fluid">

        <div id="kt_app_content_container" class="app-container container-xxl">
            <div class="row g-5 g-xl-8">

                <div class="col-xl-3">

                    <!--begin::Statistics Widget 5-->

                    <a href="javascript::void(0)" class="card bg-primary hoverable card-xl-stretch mb-xl-8">

                        <!--begin::Body-->

                        <div class="card-body">

                            <!--begin::Svg Icon | path: icons/duotune/general/gen032.svg-->

                            <span class="svg-icon svg-icon-gray-100 svg-icon-3x ms-n1">

                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">

                                    <rect x="8" y="9" width="3" height="10" rx="1.5"
                                        fill="currentColor"></rect>

                                    <rect opacity="0.5" x="13" y="5" width="3" height="14"
                                        rx="1.5" fill="currentColor"></rect>

                                    <rect x="18" y="11" width="3" height="8" rx="1.5"
                                        fill="currentColor"></rect>

                                    <rect x="3" y="13" width="3" height="6" rx="1.5"
                                        fill="currentColor"></rect>

                                </svg>

                            </span>

                            <!--end::Svg Icon-->

                            <div class="text-gray-100 fw-bold fs-2 mb-2 mt-5">{{ 0 }}</div>

                            <div class="fw-semibold text-gray-100">الشركات</div>

                        </div>

                        <!--end::Body-->

                    </a>

                    <!--end::Statistics Widget 5-->

                </div>

                <div class="col-xl-3">

                    <!--begin::Statistics Widget 5-->

                    <a href="" class="card bg-primary hoverable card-xl-stretch mb-xl-8">

                        <!--begin::Body-->

                        <div class="card-body">

                            <!--begin::Svg Icon | path: icons/duotune/ecommerce/ecm008.svg-->

                            <span class="svg-icon svg-icon-gray-100 svg-icon-3x ms-n1">

                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">

                                    <path opacity="0.3"
                                        d="M18 21.6C16.3 21.6 15 20.3 15 18.6V2.50001C15 2.20001 14.6 1.99996 14.3 2.19996L13 3.59999L11.7 2.3C11.3 1.9 10.7 1.9 10.3 2.3L9 3.59999L7.70001 2.3C7.30001 1.9 6.69999 1.9 6.29999 2.3L5 3.59999L3.70001 2.3C3.50001 2.1 3 2.20001 3 3.50001V18.6C3 20.3 4.3 21.6 6 21.6H18Z"
                                        fill="currentColor"></path>

                                    <path
                                        d="M12 12.6H11C10.4 12.6 10 12.2 10 11.6C10 11 10.4 10.6 11 10.6H12C12.6 10.6 13 11 13 11.6C13 12.2 12.6 12.6 12 12.6ZM9 11.6C9 11 8.6 10.6 8 10.6H6C5.4 10.6 5 11 5 11.6C5 12.2 5.4 12.6 6 12.6H8C8.6 12.6 9 12.2 9 11.6ZM9 7.59998C9 6.99998 8.6 6.59998 8 6.59998H6C5.4 6.59998 5 6.99998 5 7.59998C5 8.19998 5.4 8.59998 6 8.59998H8C8.6 8.59998 9 8.19998 9 7.59998ZM13 7.59998C13 6.99998 12.6 6.59998 12 6.59998H11C10.4 6.59998 10 6.99998 10 7.59998C10 8.19998 10.4 8.59998 11 8.59998H12C12.6 8.59998 13 8.19998 13 7.59998ZM13 15.6C13 15 12.6 14.6 12 14.6H10C9.4 14.6 9 15 9 15.6C9 16.2 9.4 16.6 10 16.6H12C12.6 16.6 13 16.2 13 15.6Z"
                                        fill="currentColor"></path>

                                    <path
                                        d="M15 18.6C15 20.3 16.3 21.6 18 21.6C19.7 21.6 21 20.3 21 18.6V12.5C21 12.2 20.6 12 20.3 12.2L19 13.6L17.7 12.3C17.3 11.9 16.7 11.9 16.3 12.3L15 13.6V18.6Z"
                                        fill="currentColor"></path>

                                </svg>

                            </span>

                            <!--end::Svg Icon-->

                            <div class="text-white fw-bold fs-2 mb-2 mt-5">{{0 }}</div>

                            <div class="fw-semibold text-white">الأقسام</div>

                        </div>

                        <!--end::Body-->

                    </a>

                    <!--end::Statistics Widget 5-->

                </div>



                <div class="col-xl-3">

                    <!--begin::Statistics Widget 5-->

                    <a href="" class="card bg-primary hoverable card-xl-stretch mb-xl-8">

                        <!--begin::Body-->

                        <div class="card-body">

                            <!--begin::Svg Icon | path: icons/duotune/finance/fin006.svg-->

                            <span class="svg-icon svg-icon-white svg-icon-3x ms-n1">

                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">

                                    <path opacity="0.3"
                                        d="M20 15H4C2.9 15 2 14.1 2 13V7C2 6.4 2.4 6 3 6H21C21.6 6 22 6.4 22 7V13C22 14.1 21.1 15 20 15ZM13 12H11C10.5 12 10 12.4 10 13V16C10 16.5 10.4 17 11 17H13C13.6 17 14 16.6 14 16V13C14 12.4 13.6 12 13 12Z"
                                        fill="currentColor"></path>

                                    <!-- Replace the existing path with the new path for the user icon -->

                                    <path
                                        d="M12 12C14.21 12 16 10.21 16 8C16 5.79 14.21 4 12 4C9.79 4 8 5.79 8 8C8 10.21 9.79 12 12 12ZM12 14C8.69 14 4 15.16 4 18V20H20V18C20 15.16 15.31 14 12 14Z"
                                        fill="currentColor"></path>

                                </svg>

                            </span>

                            <!--end::Svg Icon-->

                            <div class="text-white fw-bold fs-2 mb-2 mt-5">{{ 0 }}</div>

                            <div class="fw-semibold text-white">الموظفين</div>

                        </div>

                        <!--end::Body-->

                    </a>

                    <!--end::Statistics Widget 5-->

                </div>



                <div class="col-xl-3">

                    <!--begin::Statistics Widget 5-->

                    <a href="javascript::void(0)" class="card bg-primary hoverable card-xl-stretch mb-xl-8">

                        <!--begin::Body-->

                        <div class="card-body">

                            <!--begin::Svg Icon | path: icons/duotune/finance/fin006.svg-->

                            <span class="svg-icon svg-icon-primary svg-icon-3x ms-n1">

                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">

                                    <path opacity="0.3"
                                        d="M20 15H4C2.9 15 2 14.1 2 13V7C2 6.4 2.4 6 3 6H21C21.6 6 22 6.4 22 7V13C22 14.1 21.1 15 20 15ZM13 12H11C10.5 12 10 12.4 10 13V16C10 16.5 10.4 17 11 17H13C13.6 17 14 16.6 14 16V13C14 12.4 13.6 12 13 12Z"
                                        fill="currentColor"></path>

                                    <path
                                        d="M14 6V5H10V6H8V5C8 3.9 8.9 3 10 3H14C15.1 3 16 3.9 16 5V6H14ZM20 15H14V16C14 16.6 13.5 17 13 17H11C10.5 17 10 16.6 10 16V15H4C3.6 15 3.3 14.9 3 14.7V18C3 19.1 3.9 20 5 20H19C20.1 20 21 19.1 21 18V14.7C20.7 14.9 20.4 15 20 15Z"
                                        fill="currentColor"></path>

                                </svg>

                            </span>

                            <!--end::Svg Icon-->

                            <div class="text-gray-100 fw-bold fs-2 mb-2 mt-5">
                                {{ 0 }}
                            </div>

                            <div class="fw-semibold text-white">الاستبيانات
                            </div>

                        </div>

                        <!--end::Body-->

                    </a>

                    <!--end::Statistics Widget 5-->

                </div>







            </div>

          
            <div class="row g-5 g-xl-8 py-5">
                @if (session()->has('success'))
                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div>
                @endif
                <h2> ارسال اشعار عام</h2>
                <!--begin::Card-->
                <div class="card">

                    <div class="card-body p-0">
                        <!--begin::Form-->
                        <form id="kt_inbox_compose_form" method="POST" action="{{route('messages.store')}}">
                            @csrf
                            <!--begin::Body-->
                            <div class="d-block">


                                <!--begin::Subject-->
                                <div class="border-bottom">
                                    <input class="form-control form-control-transparent border-0 px-8 min-h-45px"
                                        name="title" value="{{ old('title') }}" placeholder="الموضوع">
                                </div>
                                <!--end::Subject-->
                                <!--begin::Message-->

                                <div id="kt_inbox_form_editor"
                                    class="bg-transparent border-0 h-350px px-3 ql-container ql-snow">
                                    <textarea name="body" placeholder="رسالتك هنا" class="h-300px w-100 form-control">{{ old('body') }}</textarea>
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


        </div>
    </div>

    <!--begin::Content-->


    <!--begin::Content container-->












    </div>
@endsection

@section('scripts')
    <script src="{{ asset('assets/js/widgets.bundle.js') }}"></script>

    <script src="{{ asset('assets/js/custom/widgets.js') }}"></script>

    <script src="{{ asset('assets/js/custom/apps/chat/chat.js') }}"></script>

    <script src="{{ asset('assets/js/custom/utilities/modals/upgrade-plan.js') }}"></script>

    <script src="{{ asset('assets/js/custom/utilities/modals/create-project/type.js') }}"></script>

    <script src="{{ asset('assets/js/custom/utilities/modals/create-project/budget.js') }}"></script>

    <script src="{{ asset('assets/js/custom/utilities/modals/create-project/settings.js') }}"></script>

    <script src="{{ asset('assets/js/custom/utilities/modals/create-project/team.js') }}"></script>

    <script src="{{ asset('assets/js/custom/utilities/modals/create-project/targets.js') }}"></script>

    <script src="{{ asset('assets/js/custom/utilities/modals/create-project/files.js') }}"></script>

    <script src="{{ asset('assets/js/custom/utilities/modals/create-project/complete.js') }}"></script>

    <script src="{{ asset('assets/js/custom/utilities/modals/create-project/main.js') }}"></script>

    <script src="{{ asset('assets/js/custom/utilities/modals/new-target.js') }}"></script>

    <script src="{{ asset('assets/js/custom/utilities/modals/offer-a-deal/type.js') }}"></script>

    <script src="{{ asset('assets/js/custom/utilities/modals/offer-a-deal/details.js') }}"></script>

    <script src="{{ asset('assets/js/custom/utilities/modals/offer-a-deal/finance.js') }}"></script>

    <script src="{{ asset('assets/js/custom/utilities/modals/offer-a-deal/complete.js') }}"></script>

    <script src="{{ asset('assets/js/custom/utilities/modals/offer-a-deal/main.js') }}"></script>

    <script src="{{ asset('assets/js/custom/utilities/modals/users-search.js') }}"></script>

    <!--end::Custom Javascript-->

    <!--end::Javascript-->
@endsection
