<td class="d-flex align-items-center">
    <div class="d-flex align-items-center">
        <!--begin::Thumbnail-->
        <a href="{{route('transaction.index' , $model->id)}}" class="symbol symbol-60px">
            <span class="symbol-label" style="background-image:url( {{asset('storage/' . $model->icon)}} );"></span>
        </a>
        <!--end::Thumbnail-->
        <div class="ms-5">
            <!--begin::Title-->
            <a href="{{--route('showEpisodes' , $driver->id)--}}"
                class="text-gray-800 text-hover-primary fs-5 fw-bold"
                >{{$model->name}}</a>
            <!--end::Title-->
        </div>
    </div>
</td>
