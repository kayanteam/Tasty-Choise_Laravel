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
                            المستخدمين</h1>
                        <!--end::Title-->
                        <!--begin::Breadcrumb-->
                        <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                            <!--begin::Item-->
                            <li class="breadcrumb-item text-muted">
                                <a href="" class="text-muted text-hover-primary">الرئيسية</a>
                            </li>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <li class="breadcrumb-item">
                                <span class="bullet bg-gray-400 w-5px h-2px"></span>
                            </li>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <li class="breadcrumb-item text-muted">المستخدمين</li>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <li class="breadcrumb-item">
                                <span class="bullet bg-gray-400 w-5px h-2px"></span>
                            </li>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <li class="breadcrumb-item text-muted">تغيير كلمة المرور للمستخدم</li>
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

                    <div class="card mb-5 mb-xl-10">
                        <!--begin::Card header-->
                        <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_signin_method">
                            <div class="card-title m-0">
                                <h3 class="fw-bold m-0">المستخدم   |  {{$user->name}}</h3>
                            </div>
                        </div>
                        <!--end::Card header-->
                        <!--begin::Content-->
                        <div id="kt_account_settings_signin_method" class="collapse show">
                            <!--begin::Card body-->
                            <div class="card-body border-top p-9">
                                <!--begin::Input group-->
                                <div class="d-flex flex-wrap align-items-center mb-10">
                                  
                                    <!--begin::Edit-->
                                    <div id="kt_signin_password_edit" class="flex-row-fluid">
                                        <!--begin::Form-->
                                        <form id="chage_passwords" action="{{ route('profile.update' , $user->id) }}" method="POST" >
                                            @csrf
                                            @method('PUT')

                                            <div class="row mb-1">
                                                <div class="col-lg-4">
                                                    <div class="fv-row mb-0 fv-plugins-icon-container">
                                                        <label for="newpassword" class="form-label fs-6 fw-bold mb-3">كلمة المرور الحالية</label>
                                                        <input type="password" class="form-control form-control-lg form-control-solid" name="old_password" id="old_password">
                                                    <div class="fv-plugins-message-container invalid-feedback"></div></div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="fv-row mb-0 fv-plugins-icon-container">
                                                        <label for="newpassword" class="form-label fs-6 fw-bold mb-3">كلمة المرور الجديدة</label>
                                                        <input type="password" class="form-control form-control-lg form-control-solid" name="password" id="password">
                                                    <div class="fv-plugins-message-container invalid-feedback"></div></div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="fv-row mb-0 fv-plugins-icon-container">
                                                        <label for="password_confirmation" class="form-label fs-6 fw-bold mb-3">  تأكيد كلمة المرور الجديدة </label>
                                                        <input type="password" class="form-control form-control-lg form-control-solid" name="password_confirmation" id="password_confirmation">
                                                    <div class="fv-plugins-message-container invalid-feedback"></div></div>
                                                </div>
                                            </div>
                                           
                                            <div class="d-flex mt-10">
                                                <button id="kt_password_submit" type="submit" class="btn btn-primary me-2 px-6">تغيير كلمة المرور</button>
                                                <button id="kt_password_cancel" type="reset" class="btn btn-color-gray-400 btn-active-light-primary px-6">افراغ</button>
                                            </div>
                                        </form>
                                        <!--end::Form-->
                                    </div>
                                    <!--end::Edit-->
                                    <!--begin::Action-->
                                    <div id="kt_signin_password_button" class="ms-auto d-none">
                                        <button class="btn btn-light btn-active-light-primary">Reset Password</button>
                                    </div>
                                    <!--end::Action-->
                                </div>
                                <!--end::Password-->
                            
                            </div>
                            <!--end::Card body-->
                        </div>
                        <!--end::Content-->
                    </div>
                    {{-- <form id="kt_ecommerce_add_category_form" class="form d-flex flex-column flex-lg-row"
                        action="{{ route('user.change-password' , $user->id) }}" method="POST" autocomplete="off">
                        @csrf
                        @method('PUT')

                        <div class="row mb-6">
                            <div class="col-lg-6 mb-4 mb-lg-0">
                                <div class="fv-row mb-0">
                                    <label for="emailaddress" class="form-label fs-6 fw-bold mb-3">Enter New Email Address</label>
                                    <input type="email" class="form-control form-control-lg form-control-solid" id="emailaddress" placeholder="Email Address" name="emailaddress" value="support@keenthemes.com" />
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="fv-row mb-0">
                                    <label for="confirmemailpassword" class="form-label fs-6 fw-bold mb-3">Confirm Password</label>
                                    <input type="password" class="form-control form-control-lg form-control-solid" name="confirmemailpassword" id="confirmemailpassword" />
                                </div>
                            </div>
                        </div>
                        <div class="d-flex">
                            <button id="kt_signin_submit" type="button" class="btn btn-primary me-2 px-6">Update Email</button>
                            <button id="kt_signin_cancel" type="button" class="btn btn-color-gray-400 btn-active-light-primary px-6">Cancel</button>
                        </div>

                    </form> --}}
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
    <script>
        $('input[name=account_podcast]').on('click', function() {
            if ($(this).val() == 'limited') {
                $('#limit').show();
            } else {
                $('#limit').hide();
            }
        });
    </script>
    <script src="{{ asset('assets/js/custom/apps/ecommerce/catalog/save-category.js') }}"></script>
    <script src="{{ asset('assets/js/widgets.bundle.js') }}"></script>
    <script src="{{ asset('assets/js/custom/widgets.js') }}"></script>
    <script src="{{ asset('assets/js/custom/utilities/modals/upgrade-plan.js') }}"></script>
    <script src="{{ asset('assets/js/custom/utilities/modals/create-app.js') }}"></script>
    <script src="{{ asset('assets/js/custom/utilities/modals/users-search.js') }}"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function(e) {
            FormValidation.formValidation(
                document.getElementById('chage_passwords'), {
                    fields: {
                 

                        password: {
                            validators: {
                                notEmpty: {
                                    message: 'كلمة المرور مطلوبة',
                                },
                                stringLength: {
                                    min: 6,
                                    max: 30,
                                    message: 'كلمة المرور لا تقل  عن 6 خانات',
                                },

                            },

                        },

                        password_confirmation: {
                            validators: {
                                notEmpty: {
                                    message: 'كلمة المرور مطلوبة',
                                },
                                identical: {
                                    compare: function() {
                                        return document.getElementById('chage_passwords').querySelector('[name="password"]').value;
                                    },
                                    message: 'يجب ان تتطابق كلمة المرور مع تأكيد كلمة المرور',
                                }

                            },

                        },
                    },
                    plugins: {
                        trigger: new FormValidation.plugins.Trigger(),
                        submitButton: new FormValidation.plugins.SubmitButton(),
                        defaultSubmit: new FormValidation.plugins.DefaultSubmit(),
                        bootstrap: new FormValidation.plugins.Bootstrap5(),
                    },
                });
        });
    </script>
@endsection
