@extends('layouts.main')
@section('styles')
<style>
    .select2-container--bootstrap5 .select2-selection__clear{
                top: 46%!important;
              right: 3% !important;
            }
    
        </style>
@endsection
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
                    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">الشركات
                    </h1>
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
                        <li class="breadcrumb-item text-muted">الشركات</li>
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
                <div class="card card-custom mb-3">

                    <div class="card-body">
                        <!--begin: Search Form-->
                        <form class="mb-5 fv-plugins-bootstrap5 fv-plugins-framework" id="details_form"
                            novalidate="novalidate">

                            <div class="row mb-6">
                                
                                <div class="col-lg-3 mb-lg-0 mb-6">
                                    <label> اسم الشركة  </label>
                                 
                                    <input id="name_ar" class="form-control ps-12 datatable-input flatpickr-input active"
                                        placeholder="ادخل اسم الشركة عربيا" name="name_ar" type="text" value=""
                                       >
                                </div>

                                <div class="col-lg-6 mb-lg-0 mb-6">
                                    <label> وصف الشركة  </label>
                                    <textarea id="description" name="description" placeholder="الوصف هنا" class=" w-100 form-control"></textarea>
                                </div>


                               

                                <div class="col-lg-3 mb-lg-0 mb-6">
                                  
                                   <!--begin::Add user-->
                                <a id="add"  class="btn btn-primary mt-5 w-100">
                                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr075.svg-->
                                    <span class="svg-icon svg-icon-2">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <rect opacity="0.5" x="11.364" y="20.364" width="16"
                                                height="2" rx="1" transform="rotate(-90 11.364 20.364)"
                                                fill="currentColor" />
                                            <rect x="4.36396" y="11.364" width="16" height="2"
                                                rx="1" fill="currentColor" />
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->اضافة شركة جديدة
                                </a>
                                <!--end::Add user-->

                                </div>
                            </div>

                            <input type="hidden">
                            <div></div>
                        </form>
                        <!--begin: Datatable-->
                        <!--begin: Datatable-->

                        <!--end: Datatable-->
                    </div>
                </div>


                <!--begin::Card-->
                <div class="card">
                    <!--begin::Card header-->
                    <div class="card-header border-0 pt-6">
                        <!--begin::Card title-->
                        <div class="card-title">
                            <!--begin::Search-->
                            <div class="d-flex align-items-center position-relative my-1">
                                <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                                <span class="svg-icon svg-icon-1 position-absolute ms-6">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2"
                                            rx="1" transform="rotate(45 17.0365 15.1223)" fill="currentColor" />
                                        <path
                                            d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z"
                                            fill="currentColor" />
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->
                                <input id="search" type="text" data-kt-user-table-filter="search"
                                    class="form-control form-control-solid w-250px ps-14" placeholder="ابحث عن قسم ما" />
                            </div>
                            <!--end::Search-->
                        </div>
                        <!--begin::Card title-->
                        <!--begin::Card toolbar-->
                        <div class="card-toolbar">
                            <!--begin::Toolbar-->
                            <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">




                               
                            </div>
                            <!--end::Toolbar-->
                            <!--begin::Group actions-->
                            <div class="d-flex justify-content-end align-items-center d-none"
                                data-kt-user-table-toolbar="selected">
                                <div class="fw-bold me-5">
                                    <span class="me-2" data-kt-user-table-select="selected_count"></span>Selected
                                </div>
                                <button type="button" class="btn btn-danger"
                                    data-kt-user-table-select="delete_selected">Delete Selected</button>
                            </div>
                            <!--end::Group actions-->
                            <!--begin::Modal - Adjust Balance-->
                            <div class="modal fade" id="kt_modal_export_users" tabindex="-1" aria-hidden="true">
                                <!--begin::Modal dialog-->
                                <div class="modal-dialog modal-dialog-centered mw-650px">
                                    <!--begin::Modal content-->
                                    <div class="modal-content">
                                        <!--begin::Modal header-->
                                        <div class="modal-header">
                                            <!--begin::Modal title-->
                                            <h2 class="fw-bold">Export Users</h2>
                                            <!--end::Modal title-->
                                            <!--begin::Close-->
                                            <div class="btn btn-icon btn-sm btn-active-icon-primary"
                                                data-kt-users-modal-action="close">
                                                <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                                                <span class="svg-icon svg-icon-1">
                                                    <svg width="24" height="24" viewBox="0 0 24 24"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <rect opacity="0.5" x="6" y="17.3137"
                                                            width="16" height="2" rx="1"
                                                            transform="rotate(-45 6 17.3137)" fill="currentColor" />
                                                        <rect x="7.41422" y="6" width="16"
                                                            height="2" rx="1"
                                                            transform="rotate(45 7.41422 6)" fill="currentColor" />
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->
                                            </div>
                                            <!--end::Close-->
                                        </div>
                                        <!--end::Modal header-->

                                    </div>
                                    <!--end::Modal content-->
                                </div>
                                <!--end::Modal dialog-->
                            </div>
                            <!--end::Modal - New Card-->

                        </div>
                        <!--end::Card toolbar-->
                    </div>
                    <!--end::Card header-->
                    <!--begin::Card body-->
                    <div class="card-body py-4">
                        <!--begin::Table-->
                        {{ $dataTable->table() }}
                        <!--end::Table-->
                    </div>
                    <!--end::Card body-->
                </div>
                <!--end::Card-->

            </div>
            <!--end::Content container-->
        </div>
        <!--end::Content-->
    </div>
    <!--end::Content wrapper-->
@endsection
@section('scripts')
    {{ $dataTable->scripts() }}
    <script src="{{ asset('assets/js/widgets.bundle.js') }}"></script>
    <script src="{{ asset('assets/js/custom/widgets.js') }}"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            const oTable = $('#userdatatables-table').DataTable();
            $(document).on('click', ".del_rec_btn", function(e) {
                e.preventDefault();
                const id = $(this).data('id');
                let url = "{{ route('company.destroy', ':id') }}";
                url = url.replace(':id', id);

                Swal.fire({
                    title: 'تحذبر!',
                    text: 'هل أنت متأكد من حذف البيانات؟',
                    icon: 'warning',
                    confirmButtonText: 'نعم، حذف',
                    confirmButtonColor: '#d33',
                    cancelButtonText: 'لا، إلغاء',
                    showCancelButton: true,
                }).then((result) => {
                    if (result.value) {
                        $.ajax({
                            type: "DELETE",
                            url: url,
                            success: function(data) {
                                oTable.draw();
                                toastr.options.positionClass = 'toast-bottom-right';
                                toastr[data.status](data.message);
                            }
                        });
                    }
                })
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            let oTable = $('#userdatatables-table').DataTable();
            oTable.on('order.dt search.dt', function() {
                oTable.column(0, {
                    search: 'applied',
                    order: 'applied'
                }).nodes().each(function(cell, i) {
                    cell.innerHTML = i + 1;
                });
            }).draw();
            $('#search').keyup(function() {
                oTable.search($(this).val()).draw();
            });
            oTable.draw();
        });
    </script>

    <script>
        $(document).on('click', '.sts-fld', function(e) {
            //e.preventDefault();
            const id = $(this).data('id');
            const checkedValue = $(this).is(":checked");
            $.ajax({
                type: "POST",
                url: "{{ route('company.status') }}",
                data: {
                    'id': id
                },
                success: function(data) {
                    if (data.type === 'yes') {
                        $(this).prop("checked", checkedValue);
                    } else if (data.type === 'no') {
                        $(this).prop("checked", !checkedValue);
                    }
                    toastr.options.positionClass = 'toast-top-left';
                    toastr[data.status](data.message);
                }
            });
        });
    </script>
    <script>

        $('#add').on('click', function() {
           $.ajax({
                type: "POST",
                url: "{{ route('company.store') }}",
                data: {
                    'name[ar]' : $('#name_ar').val(),
                    'description[ar]' : $('#description').val(),
                },
                success: function(data) {
                    let x = Table.DataTable().ajax.reload();
                    toastr.options.positionClass = 'toast-top-left';
                    toastr[data.status](data.message);
                    $('#name_ar').val('');
                    $('#name_en').val('');
                    $('#description').val('');
                    
                    
                }
            });
        });
    </script>

// Filter Secript 
    <script>
         const Table = $('#userdatatables-table');
        Table.on('preXhr.dt', function(e, settings, data) {
            data.salon_id = $('#salon_id').val();
            // data.year = $('#year').val();
            // data.kindergarten= $('#kindergarten_id').val();
        });

        $('#salon_id').change(function() {
           

        // console.log(this.value);
           let x = Table.DataTable().ajax.reload();

        


       });


    </script>

<script>
    document.addEventListener('DOMContentLoaded', function(e) {
        FormValidation.formValidation(
            document.getElementById('details_form'), {
                fields: {
                    'name_ar': {
                        validators: {
                            notEmpty: {
                                message: 'اسم الشركة مطلوب',
                            },
                        },
                    },
                    'description': {
                        validators: {
                            notEmpty: {
                                message: 'وصف الشركة  مطلوب',
                            },
                          
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
