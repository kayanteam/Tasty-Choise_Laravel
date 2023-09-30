    <!--begin::Author-->
    <td class="w-150px w-md-175px">

       <strong class=" @if($model->is_read) badge badge-success @else badge badge-secondary @endif">{{$model->is_read ? 'مقروء' : 'غير مقروء'}}</strong>

    </td>
    <!--end::Author-->