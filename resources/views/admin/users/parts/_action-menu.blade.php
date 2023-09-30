  <!--begin::Action=-->
  <td class="text-end m-3">


    <div class="d-flex my-3 ms-9">
        {{-- <a href="{{route('users.show', $model->id)}}" class="btn btn-icon btn-active-light-primary w-30px h-30px me-3" data-bs-toggle="tooltip" data-kt-customer-payment-method="show" aria-label="Show" data-bs-original-title="Show" data-kt-initialized="1">
            <!--begin::Svg Icon | path: icons/duotone/Design/Eye.svg-->
            <span class="svg-icon svg-icon-3">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                    <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M10 2c-4.968 0-8.8 3.25-9.797 8C1.2 12.75 5.032 16 10 16s8.8-3.25 9.797-8c-.997-4.75-4.83-8-9.797-8zm0 14c-3.866 0-7-2.523-7-6s3.134-6 7-6 7 2.523 7 6-3.134 6-7 6z" />
                </svg>
            </span>
            <!--end::Svg Icon-->
        </a> --}}

        <!--begin::Delete-->
        <a href="{{route('users.destroy', $model->id)}}" class="btn btn-icon btn-active-light-primary w-30px h-30px me-3 del_rec_btn" data-bs-toggle="tooltip" data-kt-customer-payment-method="delete" aria-label="Delete" data-bs-original-title="Delete" data-kt-initialized="1" data-id="{{ $model->id }}">
            <!--begin::Svg Icon | path: icons/duotune/general/gen027.svg-->
            <span class="svg-icon svg-icon-3">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z" fill="currentColor"></path>
                    <path opacity="0.5" d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z" fill="currentColor"></path>
                    <path opacity="0.5" d="M9 4C9 3.44772 ئ9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z" fill="currentColor"></path>
                </svg>
            </span>
            <!--end::Svg Icon-->
        </a>
        <!--end::Delete-->

        <!--begin::Edit Services-->
        <a href="{{ route('users.edit', $model->id)}}" title="Edit" class="btn btn-icon btn-active-light-primary w-30px h-30px me-3">
            <!--begin::Svg Icon | path: icons/duotune/general/gen027.svg-->
            <span class="svg-icon svg-icon-3">
                <!--begin::Svg Icon | path: assets/media/icons/duotune/coding/cod001.svg-->
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <path opacity="0.3" d="M22.1 11.5V12.6C22.1 13.2 21.7 13.6 21.2 13.7L19.9 13.9C19.7 14.7 19.4 15.5 18.9 16.2L19.7 17.2999C20 17.6999 20 18.3999 19.6 18.7999L18.8 19.6C18.4 20 17.8 20 17.3 19.7L16.2 18.9C15.5 19.3 14.7 19.7 13.9 19.9L13.7 21.2C13.6 21.7 13.1 22.1 12.6 22.1H11.5C10.9 22.1 10.5 21.7 10.4 21.2L10.2 19.9C9.4 19.7 8.6 19.4 7.9 18.9L6.8 19.7C6.4 20 5.7 20 5.3 19.6L4.5 18.7999C4.1 18.3999 4.1 17.7999 4.4 17.2999L5.2 16.2C4.8 15.5 4.4 14.7 4.2 13.9L2.9 13.7C2.4 13.6 2 13.1 2 12.6V11.5C2 10.9 2.4 10.5 2.9 10.4L4.2 10.2C4.4 9.39995 4.7 8.60002 5.2 7.90002L4.4 6.79993C4.1 6.39993 4.1 5.69993 4.5 5.29993L5.3 4.5C5.7 4.1 6.3 4.10002 6.8 4.40002L7.9 5.19995C8.6 4.79995 9.4 4.39995 10.2 4.19995L10.4 2.90002C10.5 2.40002 11 2 11.5 2H12.6C13.2 2 13.6 2.40002 13.7 2.90002L13.9 4.19995C14.7 4.39995 15.5 4.69995 16.2 5.19995L17.3 4.40002C17.7 4.10002 18.4 4.1 18.8 4.5L19.6 5.29993C20 5.69993 20 6.29993 19.7 6.79993L18.9 7.90002C19.3 8.60002 19.7 9.39995 19.9 10.2L21.2 10.4C21.7 10.5 22.1 11 22.1 11.5ZM12.1 8.59998C10.2 8.59998 8.6 10.2 8.6 12.1C8.6 14 10.2 15.6 12.1 15.6C14 15.6 15.6 14 15.6 12.1C15.6 10.2 14 8.59998 12.1 8.59998Z" fill="black"/>
                    <path d="M17.1 12.1C17.1 14.9 14.9 17.1 12.1 17.1C9.30001 17.1 7.10001 14.9 7.10001 12.1C7.10001 9.29998 9.30001 7.09998 12.1 7.09998C14.9 7.09998 17.1 9.29998 17.1 12.1ZM12.1 10.1C11 10.1 10.1 11 10.1 12.1C10.1 13.2 11 14.1 12.1 14.1C13.2 14.1 14.1 13.2 14.1 12.1C14.1 11 13.2 10.1 12.1 10.1Z" fill="black"/>
                </svg>
                <!--end::Svg Icon-->
            </span>
            <!--end::Svg Icon-->
        </a>
        <!--end::Edit Services-->

        <!--end::More-->
    </div>
</td>
<!--end::Action=-->
