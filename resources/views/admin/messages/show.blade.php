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
                        <li class="breadcrumb-item text-muted">ارسال رسالة</li>
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

                <div class="flex-lg-row-fluid ms-lg-7 ms-xl-10">
                    <!--begin::Card-->
                    <div class="card">
                        <div class="card-header align-items-center py-5 gap-5">
                            <!--begin::Actions-->
                            <div class="d-flex">
                                <!--begin::Back-->
                                <a href="{{route('messages.index')}}" class="btn btn-sm btn-icon btn-clear btn-active-light-primary me-3" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Back" data-kt-initialized="1">
                                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr063.svg-->
                                    <span class="svg-icon svg-icon-1 m-0">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <rect opacity="0.5" x="6" y="11" width="13" height="2" rx="1" fill="currentColor"></rect>
                                            <path d="M8.56569 11.4343L12.75 7.25C13.1642 6.83579 13.1642 6.16421 12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75L5.70711 11.2929C5.31658 11.6834 5.31658 12.3166 5.70711 12.7071L11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25C13.1642 17.8358 13.1642 17.1642 12.75 16.75L8.56569 12.5657C8.25327 12.2533 8.25327 11.7467 8.56569 11.4343Z" fill="currentColor"></path>
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                </a>
                                <!--end::Back-->
                               
                               
                            </div>
                            <!--end::Actions-->
                          
                        </div>
                        <div class="card-body">
                            @include('layouts.sessions-messages')

                            <!--begin::Title-->
                            <div class="d-flex flex-wrap gap-2 justify-content-between mb-8">
                                <div class="d-flex align-items-center flex-wrap gap-2">
                                    <!--begin::Heading-->
                                    <h2 class="fw-semibold me-3 my-1">{{$message->title}}</h2>
                                    <!--begin::Heading-->
                                    <!--begin::Badges-->
                                    @if($message->is_read)
                                    <span class="badge badge-light-success">مقروء</span>
                                    @else
                                    <span class="badge badge-light-danger">غير مقروء</span>
                                    @endif
                                </div>
                                <div class="d-flex">
                                    <!--begin::Sort-->
                                    <a href="#" class="btn btn-sm btn-icon btn-light btn-active-light-primary me-2" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Sort" data-kt-initialized="1">
                                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr032.svg-->
                                        <span class="svg-icon svg-icon-2 m-0">
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M7 6.59998V20C7 20.6 7.4 21 8 21C8.6 21 9 20.6 9 20V6.59998H7ZM15 17.4V4C15 3.4 15.4 3 16 3C16.6 3 17 3.4 17 4V17.4H15Z" fill="currentColor"></path>
                                                <path opacity="0.3" d="M3 6.59999H13L8.7 2.3C8.3 1.9 7.7 1.9 7.3 2.3L3 6.59999ZM11 17.4H21L16.7 21.7C16.3 22.1 15.7 22.1 15.3 21.7L11 17.4Z" fill="currentColor"></path>
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->
                                    </a>
                                  
                                </div>
                            </div>
                            <!--end::Title-->
                            <!--begin::Message accordion-->
                            <div data-kt-inbox-message="message_wrapper">
                                <!--begin::Message header-->
                                <div class="d-flex flex-wrap gap-2 flex-stack cursor-pointer" data-kt-inbox-message="header">
                                    <!--begin::Author-->
                                    <div class="d-flex align-items-center">
                                        <!--begin::Avatar-->
                                        <div class="symbol symbol-50 me-4">
                                            <span class="symbol-label" style="background-image:url(assets/media/avatars/300-6.jpg);"></span>
                                        </div>
                                        <!--end::Avatar-->
                                        <div class="pe-5">
                                            <!--begin::Author details-->
                                            <div class="d-flex align-items-center flex-wrap gap-1">
                                                <a href="#" class="fw-bold text-dark text-hover-primary">{{$message->sender->name}}</a>
                                                <!--begin::Svg Icon | path: icons/duotune/abstract/abs050.svg-->
                                                <span class="svg-icon svg-icon-7 svg-icon-success mx-3">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                        <circle fill="currentColor" cx="12" cy="12" r="8"></circle>
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->
                                                <span class="text-muted fw-bold">{{$message->created_at->diffForHumans()}}</span>
                                            </div>
                                            <!--end::Author details-->
                                            <!--begin::Message details-->
                                            <div data-kt-inbox-message="details">
                                                <span class="text-muted fw-semibold">to me</span>
                                                <!--begin::Menu toggle-->
                                                <a href="#" class="me-1" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-start">
                                                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
                                                    <span class="svg-icon svg-icon-5 m-0">
                                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="currentColor"></path>
                                                        </svg>
                                                    </span>
                                                    <!--end::Svg Icon-->
                                                </a>
                                                <!--end::Menu toggle-->
                                              
                                            </div>
                                            <!--end::Message details-->
                                            <!--begin::Preview message-->
                                            <div class="text-muted fw-semibold mw-450px d-none" data-kt-inbox-message="preview">With resrpect, i must disagree with Mr.Zinsser. We all know the most part of important part....</div>
                                            <!--end::Preview message-->
                                        </div>
                                    </div>
                                    <!--end::Author-->
                                    <!--begin::Actions-->
                                    <div class="d-flex align-items-center flex-wrap gap-2">
                                        <!--begin::Date-->
                                        <span class="fw-semibold text-muted text-end me-3">{{$message->created_at->format('y-m-d')}}</span>
                                      
                                    </div>
                                    <!--end::Actions-->
                                </div>
                                <!--end::Message header-->
                                <!--begin::Message content-->
                                <div class="collapse fade show" data-kt-inbox-message="message">
                                    <div class="py-5">
                                        <p>{{$message->body}}</p>
                                    </div>
                                </div>
                                <!--end::Message content-->
                            </div>
                            <div class="separator separator-dashed my-6"></div>
                            @foreach ($message->Reply as $reply)
                            <div data-kt-inbox-message="message_wrapper">
                                <!--begin::Message header-->
                                <div class="d-flex flex-wrap gap-2 flex-stack cursor-pointer" data-kt-inbox-message="header">
                                    <!--begin::Author-->
                                    <div class="d-flex align-items-center">
                                        <div class="symbol symbol-50px me-3">
                                            <div class="symbol-label bg-light-danger">
                                                <span class="text-danger">{{$reply->sender->name[0]}}</span>
                                            </div>
                                        </div>
                                        <div class="pe-5">
                                            <!--begin::Author details-->
                                            <div class="d-flex align-items-center flex-wrap gap-1">
                                                <a href="#" class="fw-bold text-dark text-hover-primary">{{$reply->sender->name}}</a>
                                                <!--begin::Svg Icon | path: icons/duotune/abstract/abs050.svg-->
                                                <span class="svg-icon svg-icon-7 svg-icon-success mx-3">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                        <circle fill="currentColor" cx="12" cy="12" r="8"></circle>
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->
                                                <span class="text-muted fw-bold">{{$reply->created_at->diffForHumans()}}</span>
                                            </div>
                                            <!--end::Author details-->
                                            <!--begin::Message details-->
                                            <div class="d-none" data-kt-inbox-message="details">
                                                <span class="text-muted fw-semibold">to me</span>
                                                <!--begin::Menu toggle-->
                                                <a href="#" class="me-1" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-start">
                                                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
                                                    <span class="svg-icon svg-icon-5 m-0">
                                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="currentColor"></path>
                                                        </svg>
                                                    </span>
                                                    <!--end::Svg Icon-->
                                                </a>
                                                <!--end::Menu toggle-->
                                             
                                            </div>
                                            <!--end::Message details-->
                                            <!--begin::Preview message-->
                                            <div class="text-muted fw-semibold mw-450px" data-kt-inbox-message="preview">
                                               {{$reply->body}}
                                            </div>
                                            <!--end::Preview message-->
                                        </div>
                                    </div>
                                    <!--end::Author-->
                                    <!--begin::Actions-->
                                    <div class="d-flex align-items-center flex-wrap gap-2">
                                        <!--begin::Date-->
                                        <span class="fw-semibold text-muted text-end me-3">{{$reply->created_at->format('y-m-d')}}</span>
                                      
                                    </div>
                                    <!--end::Actions-->
                                </div>
                                <!--end::Message header-->
                                <!--begin::Message content-->
                                <div class="collapse fade" data-kt-inbox-message="message">
                                    <div class="py-5">
                                        <p>Hi Bob,</p>
                                        <p>With resrpect, i must disagree with Mr.Zinsser. We all know the most part of important part of any article is the title.Without a compelleing title, your reader won't even get to the first sentence.After the title, however, the first few sentences of your article are certainly the most important part.</p>
                                        <p>Jornalists call this critical, introductory section the "Lede," and when bridge properly executed, it's the that carries your reader from an headine try at attention-grabbing to the body of your blog post, if you want to get it right on of these 10 clever ways to omen your next blog posr with a bang</p>
                                        <p>Best regards,</p>
                                        <p class="mb-0">Jason Muller</p>
                                    </div>
                                </div>
                                <!--end::Message content-->
                            </div>
                            <div class="separator separator-dashed my-6"></div>
                            @endforeach
                            <div class="text-dark fw-bold w-75px">يرجى ادخال رد</div>
                            <!--end::Message accordion-->
                            <div class="separator my-6"></div>
                               <!--begin::Form-->
                               <form id="kt_inbox_compose_form" method="POST" action="{{route('messages.store')}}">
                                @csrf
                                <!--begin::Body-->
                                <div class="d-block">
                                    <!--begin::To-->
                                    <div class="d-flex align-items-center border-bottom px-8 min-h-50px">
                                        <!--begin::Label-->
                                        <div class="text-dark fw-bold w-75px">الى:</div>
                                        <!--end::Label-->
                                        <input type="hidden" name="is_reply" value="1">
                                        <input type="hidden" name="reply_id" value="{{$message->id}}">

                                        <input type="hidden" name="users[]" value="{{$message->sender_id}}">

                                        <select disabled class="js-example-basic-multiple" name="users[]" multiple="multiple">
                                           @foreach ($users as $user)
                                                <option value="{{$user->id}}" @selected($user->id == $message->sender_id)>{{$user->name}}</option>
                                           @endforeach
                                          </select>

                                    </div>
                                    <!--end::To-->

                                    <!--begin::Subject-->
                                    <div class="border-bottom">
                                        <input class="form-control form-control-transparent border-0 px-8 min-h-45px"
                                            name="title" placeholder="الموضوع">
                                    </div>
                                    <!--end::Subject-->
                                    <!--begin::Message-->
                                 
                                    <div id="kt_inbox_form_editor" class="bg-transparent border-0 h-350px px-3 ql-container ql-snow">
                                        <textarea name="body" placeholder="رسالتك هنا" class="h-300px w-100 form-control"></textarea>
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
                             
                            <!--end::Form-->
                        </div>
                    </div>
                    <!--end::Card-->
                </div>
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
                ajax: "{{ route('langs.index') }}",
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

$('.js-example-basic-multiple').select2();

    </script>
@endsection
