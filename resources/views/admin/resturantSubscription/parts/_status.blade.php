<td class="text-center">

    <!-- bedge -->
    @if ($model->status == 'active')
        <span class="badge badge-light-success badge-inline">فعال</span>
    @elseif($model->status == 'expired')
        <span class="badge badge-light-danger badge-inline">غير فعال</span>
   @endif

    

</td>
