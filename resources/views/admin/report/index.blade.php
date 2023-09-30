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
                    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">الاستبيانات
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
                        <li class="breadcrumb-item text-muted">الاستبيانات</li>
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
                                
                                <div class="col-lg-4 mb-lg-0 mb-6">
                                    <label>الشركة:</label>
                                    <!--begin::Select2-->
                                    <select id="company_id" name="company_id" class="form-select mb-2" data-control="select2"
                                        data-placeholder="قم بتحديد الشركة" data-allow-clear="true">
                                        <option></option>
                                        @foreach ($compaines as $company)
                                            <option value="{{ $company->id }}">{{ $company->name }}</option>
                                        @endforeach

                                    </select>
                                    <!--end::Select2-->
                                </div>



                                <div class="col-lg-4 mb-lg-0 mb-6">
                                    <label>الموظفين:</label>
                                    <!--begin::Select2-->
                                    <select id="employee_id" name="employee_id" class="form-select mb-2" data-control="select2"
                                        data-placeholder="قم بتحديد الموظفين" data-allow-clear="true">
                                        <option></option>
                                        @foreach ($employees as $employee)
                                            <option value="{{ $employee->id }}">{{ $employee->name }}</option>
                                        @endforeach

                                    </select>
                                    <!--end::Select2-->
                                </div>


                                <div class="col-lg-4 mb-lg-0 mb-6">
                                    <label>الاستبيانات:</label>
                                    <!--begin::Select2-->
                                    <select id="quastionnaires" name="quastionnaires" class="form-select mb-2" data-control="select2"
                                        data-placeholder="قم بتحديد الاستبيان" data-allow-clear="true">
                                        <option></option>
                                        {{-- @foreach ($quastionnaires as $quastionnaire)
                                            <option value="{{ $quastionnaire->id }}">{{ $quastionnaire->start_date . ' - ' . $quastionnaire->end_date }}</option>
                                        @endforeach --}}

                                    </select>
                                    <!--end::Select2-->
                                </div>


                                <a href="#" class="btn btn-primary" id="download_file">تحميل المرفق</a>

                               
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
    {{-- <script src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js') }}"></script> --}}
    {{ $dataTable->scripts() }}

    {{-- <script src="{{asset('assets/js/custom/apps/user-management/users/list/table.js')}}"></script> --}}
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
                let url = "{{ route('employees.destroy', ':id') }}";
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
                url: "{{-- route('salons.status') --}}",
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


    // Filter Secript
    <script>
        const Table = $('#userdatatables-table');
        Table.on('preXhr.dt', function(e, settings, data) {
            data.quastionnaire_id = $('#quastionnaires').val();
            // data.start_date = $('#start_date').val();
            // data.end_date = $('#end_date').val();
        });

        $('#employee_id').change(function() {
            let id = $(this).val();
            url = "{{ route('report.getQuastionnaireByEmployee' , ':id') }}";
            url = url.replace(':id', id);
           $.ajax({
               type: "GET",
               url: url,
               success: function(data) {
                   $('#quastionnaires').html(data.html);
               }
           });

           // #quastionnaires select option:first-child
           $('#quastionnaires').val($('#quastionnaires option:first-child').val());

           let x = Table.DataTable().ajax.reload();
        });
        $('#download_file').hide();
        $('#quastionnaires').change(function() {
            let x = Table.DataTable().ajax.reload();

            //if this quastionnaire for employee has file show button download
            let id = $(this).val();
            let employee_id = $('#employee_id').val();
            url = "{{ route('report.getQuastionnaireFile') }}";
            
            //ajax to check if this quastionnaire for employee has file
            $.ajax({
                type: "GET",
                url: url,
                data: {
                    'id': id,
                    'employee_id': employee_id
                },
                success: function(data) {
                    if(data.status == 'success'){
                        $('#download_file').attr('href', data.file);
                        $('#download_file').show();
                    }else{
                        $('#download_file').hide();
                    }
                }
            });

        });


        $('#end_date').change(function() {


            // console.log(this.value);
            let x = Table.DataTable().ajax.reload();




        });
    </script>

    <script>
        $('#company_id').on('change' ,function(){
            id = $(this).val();
            url = "{{ route('company.getEmployees' , ':id') }}";
            url = url.replace(':id', id);

            $.ajax({
                type: "GET",
                url: url,
                success: function(data) {
                    
                  
                    //EACH DATA IN SELECT 
                    $('#employee_id').empty();
                    
                    $.each(data.data, function(key, value) {
                       
                        $('#employee_id').append('<option value="' + value.id + '">' + value.name + '</option>');
                    });
                   
                }
            });
        });

       
        
    </script>
@endsection
