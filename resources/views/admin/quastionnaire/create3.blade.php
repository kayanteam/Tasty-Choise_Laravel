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
                        <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">اضافة
                            استبيان سلبي </h1>
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
                            <li class="breadcrumb-item text-muted">اضافة استبيان سلبي</li>
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

                    {{-- @include('layouts.sessions-messages') --}}
                    <form id="kt_ecommerce_add_category_form" class="form d-flex flex-column flex-lg-row"
                        action="{{ route('quastionnaire.storeNegativeQuastions') }}" method="POST" autocomplete="off" enctype="multipart/form-data">
                        @csrf

                        @include('admin.quastionnaire._form3')

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
        
       
           $(document).ready(function(){
             //get all quastion for this employee category 
            
             $.ajax({
                url: "{{ route('quastionnaire.getAllQuastions') }}",
                type: "GET",
                success: function(data) {
                    $('#quastions').empty();
                    //for each quastion append it to the form
                    $.each(data.data, function(key, value) {
                        //add input to add points for this quastions

                        var quastion = `
                        <div class="col-lg-6 d-flex align-items-center">
                            <input type="checkbox" class="form-check-input" name="quastion[]" value="${value.id}" />
                            <label class="col-lg-6 col-form-label ms-2  fw-bold fs-6">${value.quastion.ar}</label>
                        </div>
                        <div class="col-lg-6 d-flex align-items-center">
                            <input type="number" class="" name="points[]" value="1" />
                        </div>
                        `
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

                        joined_at: {
                            validators: {
                                notEmpty: {
                                    message: 'تاريخ الانضمام مطلوب',
                                },
                            },
                        },

                        bth_date: {
                            validators: {
                                notEmpty: {
                                    message: 'تاريخ الميلاد مطلوب',
                                },
                            },
                        },

                        phone: {
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
                        work_time: {
                            validators: {
                                regexp: {
                                    message: ' عدد الساعات فقط أرقام',
                                },
                            },
                        },
                        specialization: {
                            validators: {
                                notEmpty: {
                                    message: ' التخصص  مطلوب',
                                },
                               
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
                                        return document.getElementById('kt_ecommerce_add_category_form').querySelector('[name="password"]').value;
                                    },
                                    message: 'يجب ان تتطابق كلمة المرور مع تأكيد كلمة المرور',
                                }

                            },

                        },
                        // podcast_count: {
                        //     validators: {
                                
                        //         notEmpty: {
                        //             compare: function() {
                        //                 return document.getElementById('kt_ecommerce_add_category_form').querySelector('[name="account_podcast"]').value == 'limited';
                        //             },
                        //             message: 'عدد البرامج مطلوب',
                        //         },

                              


                        //     },
                        // },






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
