    <!--begin::Author-->
    <td class="w-150px w-md-175px">
        <a href="{{route('messages.show' , $model->id)}}"
            class="d-flex align-items-center text-dark">
            <!--begin::Avatar-->
            <div class="symbol symbol-35px me-3">
                <div class="symbol-label bg-light-danger">
                    <span class="text-danger">{{$model->sender->name[0]}}</span>
                </div>
            </div>
            <!--end::Avatar-->
            <!--begin::Name-->
            <span class="fw-semibold">{{$model->sender->name}}</span>
            <!--end::Name-->
        </a>
    </td>
    <!--end::Author-->