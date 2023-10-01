<td class="d-flex align-items-center">
    <div class="d-flex align-items-center">
        <!--begin::Thumbnail-->
        {{-- <a href="{{route('drivers.index' , $modal->id)}}" class="symbol symbol-60px">
            <span class="symbol-label" style="background-image:url( {{asset('storage/' . $modal->image)}} );"></span>
        </a> --}}
        <!--end::Thumbnail-->
        <div class="ms-5">
            <!--begin::Title-->
            <a href="{{--route('showEpisodes' , $driver->id)--}}" 
                class="text-gray-800 text-hover-primary fs-5 fw-bold" 
                >{{$modal->name}}</a>
            <!--end::Title-->
        </div>
    </div>
</td>