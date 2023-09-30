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
                        <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">تعديل
                            الاستبيان</h1>
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
                            <li class="breadcrumb-item text-muted">الاستبيانات</li>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <li class="breadcrumb-item">
                                <span class="bullet bg-gray-400 w-5px h-2px"></span>
                            </li>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <li class="breadcrumb-item text-muted">تعديل الاستبيان </li>
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

                    @if (session()->has('success'))
                        <div class="alert alert-dismissible alert-success d-flex align-items-center p-5 mb-10">
                            <!--begin::Svg Icon | path: icons/duotune/general/gen048.svg-->
                            <span class="svg-icon svg-icon-2hx svg-icon-success me-4">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none">
                                    <path opacity="0.3"
                                        d="M20.5543 4.37824L12.1798 2.02473C12.0626 1.99176 11.9376 1.99176 11.8203 2.02473L3.44572 4.37824C3.18118 4.45258 3 4.6807 3 4.93945V13.569C3 14.6914 3.48509 15.8404 4.4417 16.984C5.17231 17.8575 6.18314 18.7345 7.446 19.5909C9.56752 21.0295 11.6566 21.912 11.7445 21.9488C11.8258 21.9829 11.9129 22 12.0001 22C12.0872 22 12.1744 21.983 12.2557 21.9488C12.3435 21.912 14.4326 21.0295 16.5541 19.5909C17.8169 18.7345 18.8277 17.8575 19.5584 16.984C20.515 15.8404 21 14.6914 21 13.569V4.93945C21 4.6807 20.8189 4.45258 20.5543 4.37824Z"
                                        fill="currentColor"></path>
                                    <path
                                        d="M10.5606 11.3042L9.57283 10.3018C9.28174 10.0065 8.80522 10.0065 8.51412 10.3018C8.22897 10.5912 8.22897 11.0559 8.51412 11.3452L10.4182 13.2773C10.8099 13.6747 11.451 13.6747 11.8427 13.2773L15.4859 9.58051C15.771 9.29117 15.771 8.82648 15.4859 8.53714C15.1948 8.24176 14.7183 8.24176 14.4272 8.53714L11.7002 11.3042C11.3869 11.6221 10.874 11.6221 10.5606 11.3042Z"
                                        fill="currentColor"></path>
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                            <div class="d-flex flex-column pe-0 pe-sm-10">
                                <h4 class="mb-1 text-success">نجاح</h4>
                                <span>{{ Session::get('message') }}</span>
                            </div>

                            <button type="button"
                                class="position-absolute position-sm-relative m-2 m-sm-0 top-0 end-0 btn btn-icon ms-sm-auto"
                                data-bs-dismiss="alert">
                                <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                                <span class="svg-icon svg-icon-2x svg-icon-primary">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none">
                                        <rect opacity="0.5" x="6" y="17.3137" width="16" height="2"
                                            rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor"></rect>
                                        <rect x="7.41422" y="6" width="16" height="2" rx="1"
                                            transform="rotate(45 7.41422 6)" fill="currentColor"></rect>
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->
                            </button>
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="alert alert-dismissible alert-danger d-flex align-items-center p-5 mb-10">
                            <!--begin::Svg Icon | path: icons/duotune/general/gen048.svg-->
                            <span class="svg-icon svg-icon-2hx svg-icon-danger me-4">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none">
                                    <path opacity="0.3"
                                        d="M4,4 L11.6314229,2.5691082 C11.8750185,2.52343403 12.1249815,2.52343403 12.3685771,2.5691082 L20,4 L20,13.2830094 C20,16.2173861 18.4883464,18.9447835 16,20.5 L12.5299989,22.6687507 C12.2057287,22.8714196 11.7942713,22.8714196 11.4700011,22.6687507 L8,20.5 C5.51165358,18.9447835 4,16.2173861 4,13.2830094 L4,4 Z"
                                        fill="currentColor"></path>
                                    <path
                                        d="M10.5857864,12 L9.17157288,10.5857864 C8.78104858,10.1952621 8.78104858,9.56209717 9.17157288,9.17157288 C9.56209717,8.78104858 10.1952621,8.78104858 10.5857864,9.17157288 L12,10.5857864 L13.4142136,9.17157288 C13.8047379,8.78104858 14.4379028,8.78104858 14.8284271,9.17157288 C15.2189514,9.56209717 15.2189514,10.1952621 14.8284271,10.5857864 L13.4142136,12 L14.8284271,13.4142136 C15.2189514,13.8047379 15.2189514,14.4379028 14.8284271,14.8284271 C14.4379028,15.2189514 13.8047379,15.2189514 13.4142136,14.8284271 L12,13.4142136 L10.5857864,14.8284271 C10.1952621,15.2189514 9.56209717,15.2189514 9.17157288,14.8284271 C8.78104858,14.4379028 8.78104858,13.8047379 9.17157288,13.4142136 L10.5857864,12 Z"
                                        fill="currentColor"></path>
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                            <div class="d-flex flex-column pe-0 pe-sm-10">
                                <h4 class="mb-1 text-danger">خطأ</h4>


                                @foreach ($errors->all() as $error)
                                    <div>{{ $error }}</div>
                                @endforeach


                            </div>

                            <button type="button"
                                class="position-absolute position-sm-relative m-2 m-sm-0 top-0 end-0 btn btn-icon ms-sm-auto"
                                data-bs-dismiss="alert">
                                <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                                <span class="svg-icon svg-icon-2x svg-icon-danger">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none">
                                        <rect opacity="0.5" x="6" y="17.3137" width="16" height="2"
                                            rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor"></rect>
                                        <rect x="7.41422" y="6" width="16" height="2" rx="1"
                                            transform="rotate(45 7.41422 6)" fill="currentColor"></rect>
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->
                            </button>
                        </div>
                    @endif
                    <form id="kt_ecommerce_add_category_form" class="form d-flex flex-column flex-lg-row"
                        action="{{ route('quastionnaires.update', $data->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        @include('admin.quastionnaire._form')

                    </form>
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
        //get all quastion for this employee category 
        var employee_id = "{{ $data->employee_id }}";
        $.ajax({
            url: "{{ route('quastionnaire.getQuastion') }}",
            type: "GET",
            data: {
                employee_id: employee_id,
                quastionnaire_id: "{{ $data->id }}"
            },
            success: function(data) {

                //for each quastion append it to the form
                $.each(data.data, function(key, value) {
                    // console.log(key + ": " + value);
                    if (value.checked) {
                        var quastion = `
                    <div class="col-lg-12 d-flex align-items-center">
                        <input type="checkbox" class="form-check-input" checked name="quastion[]" value="${value.id}" />
                        <label class="col-lg-6 col-form-label ms-2  fw-bold fs-6">${value.quastion.ar}</label>
                    </div>
                    `
                    } else {
                        var quastion = `
                    <div class="col-lg-12 d-flex align-items-center">
                        <input type="checkbox" class="form-check-input"  name="quastion[]" value="${value.id}" />
                        <label class="col-lg-6 col-form-label ms-2  fw-bold fs-6">${value.quastion.ar}</label>
                    </div>
                    `
                    }

                    $('#quastions').append(quastion);
                });


            }
        });


        $('select[name=employee_id]').on('change', function() {
            $('#quastions').empty();
            //get all quastion for this employee category 
            var employee_id = $(this).val();
            $.ajax({
                url: "{{ route('quastionnaire.getQuastion') }}",
                type: "GET",
                data: {
                    employee_id: employee_id
                },
                success: function(data) {

                    //for each quastion append it to the form
                    $.each(data.data, function(key, value) {
                        // console.log(key + ": " + value);
                        if (value.checked) {
                            var quastion = `
                    <div class="col-lg-12 d-flex align-items-center">
                        <input type="checkbox" class="form-check-input" checked name="quastion[]" value="${value.id}" />
                        <label class="col-lg-6 col-form-label ms-2  fw-bold fs-6">${value.quastion.ar}</label>
                    </div>
                    `
                        } else {
                            var quastion = `
                    <div class="col-lg-12 d-flex align-items-center">
                        <input type="checkbox" class="form-check-input"  name="quastion[]" value="${value.id}" />
                        <label class="col-lg-6 col-form-label ms-2  fw-bold fs-6">${value.quastion.ar}</label>
                    </div>
                    `
                        }

                        $('#quastions').append(quastion);
                    });

                }
            });
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
                document.getElementById('kt_ecommerce_add_category_form'), {
                    fields: {
                        name: {
                            validators: {
                                notEmpty: {
                                    message: 'اسم المستخدم مطلوب',
                                },
                            },
                        },
                        mobile: {
                            validators: {
                                notEmpty: {
                                    message: 'رقم الجوال مطلوب',
                                },
                                stringLength: {
                                    min: 10,
                                    max: 10,
                                    message: 'رقم الجوال يتكون من 10 خانات',
                                },

                                regexp: {
                                    regexp: /^[0-9]+$/,
                                    message: 'رقم الجوال فقط أرقام',
                                },
                            },
                        },
                        phone: {
                            validators: {

                                stringLength: {
                                    min: 10,
                                    max: 10,
                                    message: 'رقم الهاتف يتكون من 10 خانات',
                                },
                                regexp: {
                                    regexp: /^[0-9]+$/,
                                    message: 'رقم الهاتف فقط أرقام',
                                },
                            },
                        },
                        email: {
                            validators: {
                                notEmpty: {
                                    message: 'البريد الالكتروني مطلوب',
                                },
                                emailAddress: {
                                    message: 'البريد الالكتروني غير صالح',
                                }

                            },

                        },

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
                                        return document.getElementById('kt_ecommerce_add_category_form')
                                            .querySelector('[name="password"]').value;
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
