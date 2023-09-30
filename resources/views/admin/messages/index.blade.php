@extends('layouts.main')
@section('styles')
    <style>
        .select2-container--bootstrap5 .select2-selection--multiple:not(.form-select-sm):not(.form-select-lg) {
            border: 1px solid #ddd;
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
                    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">البريد
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
                        <li class="breadcrumb-item text-muted">البريد</li>
                        <!--end::Item-->
                    </ul>
                    <!--end::Breadcrumb-->
                </div>
                <!--end::Page title-->

            </div>
            <!--end::Toolbar container-->
        </div>
        <!--end::Toolbar-->
        <div id="kt_app_content" class="app-content flex-column-fluid">
            <!--begin::Content container-->
            <div id="kt_app_content_container" class="app-container container-xxl">
                <!--begin::Inbox App - Messages -->
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
                            data-kt-sticky-zindex="95" style="">
                            <!--begin::Aside content-->
                            <div class="card-body">
                                <!--begin::Button-->
                                <a href="{{ route('messages.create') }}" class="btn btn-primary fw-bold w-100 mb-8">رسالة
                                    جديدة</a>

                                <!--begin::Menu-->
                                <div
                                    class="menu menu-column menu-rounded menu-state-bg menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary mb-10">
                                    <!--begin::Menu item-->
                                    <div class="menu-item mb-3">
                                        <!--begin::Inbox-->
                                        <span class="menu-link active">
                                            <span class="menu-icon">
                                                <!--begin::Svg Icon | path: icons/duotune/communication/com010.svg-->
                                                <span class="svg-icon svg-icon-2 me-3">
                                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M6 8.725C6 8.125 6.4 7.725 7 7.725H14L18 11.725V12.925L22 9.725L12.6 2.225C12.2 1.925 11.7 1.925 11.4 2.225L2 9.725L6 12.925V8.725Z"
                                                            fill="currentColor"></path>
                                                        <path opacity="0.3"
                                                            d="M22 9.72498V20.725C22 21.325 21.6 21.725 21 21.725H3C2.4 21.725 2 21.325 2 20.725V9.72498L11.4 17.225C11.8 17.525 12.3 17.525 12.6 17.225L22 9.72498ZM15 11.725H18L14 7.72498V10.725C14 11.325 14.4 11.725 15 11.725Z"
                                                            fill="currentColor"></path>
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->
                                            </span>
                                            <span class="menu-title fw-bold text-dark">البريد الوارد</span>
                                        </span>
                                        <!--end::Inbox-->
                                    </div>
                                    <!--end::Menu item-->
                                 

                                </div>
                                <!--end::Menu-->

                            </div>
                            <!--end::Aside content-->
                        </div>
                        <!--end::Sticky aside-->
                    </div>
                    <!--end::Sidebar-->
                    <!--begin::Content-->
                    <div class="flex-lg-row-fluid ms-lg-7 ms-xl-10">
                        <!--begin::Card-->
                        <div class="card">
                            <div class="card-header align-items-center py-5 gap-2 gap-md-5">
                                <!--begin::Actions-->
                                <div class="d-flex align-items-center flex-wrap gap-2">
                                    <!--begin::Search-->
                                    <div class="d-flex align-items-center position-relative">
                                        <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                                        <span class="svg-icon svg-icon-2 position-absolute ms-4">
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546"
                                                    height="2" rx="1" transform="rotate(45 17.0365 15.1223)"
                                                    fill="currentColor"></rect>
                                                <path
                                                    d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z"
                                                    fill="currentColor"></path>
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->
                                        <input id="search" type="text" data-kt-inbox-listing-filter="search"
                                            class="form-control form-control-sm form-control-solid mw-100 min-w-125px min-w-lg-150px min-w-xxl-200px ps-12"
                                            placeholder="البحث">
                                    </div>
                                    <!--end::Search-->

                                </div>
                                <!--end::Actions-->

                            </div>
                            <div class="card-body p-0">
                                <!--begin::Table-->
                                <div id="kt_inbox_listing_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                                    <div class="table-responsive">
                                        <table
                                            class="table table-hover table-row-dashed fs-6 gy-5 my-0 dataTable no-footer"
                                            id="kt_inbox_listing">
                                            <!--begin::Table head-->
                                            <thead class="d-none">
                                                <tr>
                                                    <th class="sorting" tabindex="0" aria-controls="kt_inbox_listing"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Checkbox: activate to sort column ascending"
                                                        style="width: 0px;">#</th>
                                                    <th class="sorting" tabindex="0" aria-controls="kt_inbox_listing"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Author: activate to sort column ascending"
                                                        style="width: 0px;">Author</th>
                                                    <th class="sorting" tabindex="0" aria-controls="kt_inbox_listing"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Title: activate to sort column ascending"
                                                        style="width: 0px;">Title</th>
                                                    <th class="sorting" tabindex="0" aria-controls="kt_inbox_listing"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Date: activate to sort column ascending"
                                                        style="width: 0px;">Date</th>
                                                        <th class="sorting" tabindex="0" aria-controls="kt_inbox_listing"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Date: activate to sort column ascending"
                                                        style="width: 0px;">Read</th>
                                                </tr>
                                            </thead>
                                            <!--end::Table head-->
                                            <!--begin::Table body-->
                                            <tbody>



                                            </tbody>
                                            <!--end::Table body-->
                                        </table>
                                    </div>

                                </div>
                                <!--end::Table-->
                            </div>
                        </div>
                        <!--end::Card-->
                    </div>
                    <!--end::Content-->

                </div>
                <!--end::Inbox App - Messages -->
            </div>
            <!--end::Content container-->
        </div>
    </div>
    <!--end::Content wrapper-->
@endsection
@section('scripts')
    <script src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
    {{-- <script src="{{ asset('assets/js/custom/apps/user-management/users/list/table.js') }}"></script> --}}
    <script src="{{ asset('assets/js/widgets.bundle.js') }}"></script>
    <script src="{{ asset('assets/js/custom/widgets.js') }}"></script>
    <!-- JavaScript Bundle with Popper -->
    <script>
        $(document).ready(function() {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $("#kt_inbox_listing").DataTable({
                processing: true,
                serverSide: true,
                order: true,
                stateSave: true,
                ajax: "{{ route('messages.index') }}",
                columns: [{
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'sender_id',
                        name: 'sender_id'
                    },
                    {
                        data: 'title',
                        name: 'title'
                    },
                    
                    {
                        data: 'created_at',
                        name: 'created_at'
                    },
                    {
                        data: 'is_read',
                        name: 'is_read'
                    },

                ],

                "language": 
                        {
                            "sProcessing": "جارٍ التحميل...",
                            "sLengthMenu": "أظهر _MENU_ مدخلات",
                            "sZeroRecords": "لم يعثر على أية سجلات",
                            "sInfo": "إظهار _START_ إلى _END_ من أصل _TOTAL_ مدخل",
                            "sInfoEmpty": "يعرض 0 إلى 0 من أصل 0 سجل",
                            "sInfoFiltered": "(منتقاة من مجموع _MAX_ مُدخل)",
                            "sInfoPostFix": "",
                            "sSearch": "ابحث:",
                            "sUrl": "",
                            "oPaginate": {
                                "sFirst": "الأول",
                                "sPrevious": "السابق",
                                "sNext": "التالي",
                                "sLast": "الأخير"
                            }
                        }
                // createdRow: function(row, data, index) {
                //     //
                //     // if the second column cell is blank apply special formatting
                //     //
                //     if (data[2] == 1) {
                //         $(row).addClass("label-warning");
                //     }
                // }
            });
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            const oTable = $('#kt_inbox_listing').DataTable();
            $(document).on('click', ".del_rec_btn", function(e) {
                e.preventDefault();
                const id = $(this).data('id');
                let url = "{{ route('langs.destroy', ':id') }}";
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
                                toastr.options.positionClass = 'toast-bottom-left';
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
            let oTable = $('#kt_inbox_listing').DataTable();
            oTable.on('order.dt search.dt', function() {
                oTable.column(0, {
                    search: 'applied',
                    order: 'applied'
                }).nodes().each(function(cell, i) {
                    cell.innerHTML = ' ';
                });
            }).draw();
            $('#search').keyup(function() {
                oTable.search($(this).val()).draw();
            });
            oTable.draw();
        });
    </script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('#sub').on('click', function(e) {
            e.preventDefault();
            let oTable = $('#kt_inbox_listing').DataTable();


            $.ajax({
                method: "POST",
                url: "{{ route('langs.store') }}",
                data: {
                    "name": $('#name').val(),
                    "status": $('#status').val(),
                },
                dataType: "JSON",
                success: function(data) {
                    oTable.draw();
                    toastr.options.positionClass = 'toast-top-left';
                    toastr[data.status](data.message);

                    $('#kt_modal_add_customer').modal('toggle');
                    $('.modal-backdrop').attr('hidden', true);
                    $('#name').val('');

                }
            });

        });

        $('#showmodal').on('click', function(e) {
            $('.modal-backdrop').removeAttr('hidden');
        });
    </script>

    <script>
        $('.js-example-basic-multiple').select2();
    </script>
@endsection
