<td class="text-center">

    <!-- bedge -->
    @if ($model->status == 'open')
        <span class="badge badge-light-primary badge-inline">مفتوح</span>
    @elseif($model->status == 'accepted')
        <span class="badge badge-light-warning badge-inline">مقبول</span>
    @elseif($model->status == 'completed')
        <span class="badge badge-light-success badge-inline">مكتمل</span>
    @elseif($model->status == 'done')
        <span class="badge badge-light-success badge-inline">منتهي</span>
    @elseif($model->status == 'canceled')
        <span class="badge badge-light-danger badge-inline">ملغي</span>
    @elseif($model->status == 'rejected')
        <span class="badge badge-light-danger badge-inline">مرفوض</span>
     @elseif($model->status == 'finished')
        <span class="badge badge-light-success badge-inline">منتهي</span>
    @endif

    

</td>
