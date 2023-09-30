<td class="d-flex align-items-center">
    @if($model->type == 1)
        <span class="badge badge-light-success">{{ __('dashboard.deposit') }}</span>
    @else
        <span class="badge badge-light-secondary">{{ __('dashboard.withdraw') }}</span>
    @endif
</td>