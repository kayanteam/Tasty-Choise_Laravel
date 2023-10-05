  <!--begin::Action=-->
  <td class="text-end m-3">


    <div class="d-flex my-3 ms-9">
        <a href="{{route('resturant.show', $model->id)}}" class="btn btn-icon btn-active-light-primary w-30px h-30px me-3" data-bs-toggle="tooltip" data-kt-customer-payment-method="show" aria-label="Show" data-bs-original-title="Show" data-kt-initialized="1">
            <!--begin::Svg Icon | path: icons/duotone/Design/Eye.svg-->
            <span class="svg-icon svg-icon-3">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                    <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M10 2c-4.968 0-8.8 3.25-9.797 8C1.2 12.75 5.032 16 10 16s8.8-3.25 9.797-8c-.997-4.75-4.83-8-9.797-8zm0 14c-3.866 0-7-2.523-7-6s3.134-6 7-6 7 2.523 7 6-3.134 6-7 6z" />
                </svg>
            </span>
            <!--end::Svg Icon-->
        </a>

        <!--begin::Delete-->
        <a href="{{route('resturant.destroy', $model->id)}}" class="btn btn-icon btn-active-light-primary w-30px h-30px me-3 del_rec_btn" data-bs-toggle="tooltip" data-kt-customer-payment-method="delete" aria-label="Delete" data-bs-original-title="Delete" data-kt-initialized="1" data-id="{{ $model->id }}">
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

       
        <!--end::Edit Services-->

        <!--end::More-->
    </div>
</td>
<!--end::Action=-->
