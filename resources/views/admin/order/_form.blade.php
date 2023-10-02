<div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-12">
    <!--begin::General options-->
    <div class="card card-flush py-4">
        <!--begin::Card header-->
        <div class="card-header">
            <div class="card-title">
                <h2>{{ __('dashboard.order') }}</h2>
            </div>
        </div>
        <!--end::Card header-->
        <!--begin::Card body-->
        <div class="card-body pt-0">

            <div class="row mb-2">

                {{-- <div class="col-lg-12">
                    <div class="card-body text-center pt-0">
                        <!--begin::Image input-->
                        <!--begin::Image input placeholder-->
                        <style>
                            .image-input-placeholder {
                                background-image: url('{{ 'storage/' . $order->image ? asset('storage/' . $order->image) : asset('assets/media/svg/files/pic.jpg') }}');
                            }

                            [data-theme="dark"] .image-input-placeholder {
                                background-image: url('{{ 'storage/' . $order->image ? asset('storage/' . $order->image) : asset('assets/media/svg/files/blank-image-dark.svg') }}');
                            }
                        </style>
                        <!--end::Image input placeholder-->
                        <div class="image-input image-input-empty image-input-outline image-input-placeholder mb-3"
                            data-kt-image-input="true">
                            <!--begin::Preview existing avatar-->
                            <div class="image-input-wrapper w-100px h-100px"></div>
                            <!--end::Preview existing avatar-->
                            <!--begin::Label-->
                            <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                data-kt-image-input-action="change" data-bs-toggle="tooltip" aria-label="Change avatar"
                                data-kt-initialized="1">
                                <i class="bi bi-pencil-fill fs-7"></i>
                                <!--begin::Inputs-->
                                <input type="file" name="image" accept=".png, .jpg, .jpeg">

                                <!--end::Inputs-->
                            </label>
                            <!--end::Label-->
                            <!--begin::Cancel-->
                            <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                data-kt-image-input-action="cancel" data-bs-toggle="tooltip" aria-label="Cancel avatar"
                                data-kt-initialized="1">
                                <i class="bi bi-x fs-2"></i>
                            </span>
                            <!--end::Cancel-->
                            <!--begin::Remove-->
                            <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                data-kt-image-input-action="remove" data-bs-toggle="tooltip" aria-label="Remove avatar"
                                data-kt-initialized="1">
                                <i class="bi bi-x fs-2"></i>
                            </span>
                            <!--end::Remove-->
                        </div>
                        <!--end::Image input-->
                        <!--begin::Description-->
                        <div class="text-muted fs-7">{{ __('dashboard.order_image') }}
                        </div>
                        <div class="fv-plugins-message-container invalid-feedback"></div>
                        @error('image')
                            <div class="fv-plugins-message-container invalid-feedback">{{ $message }}
                            </div>
                        @enderror
                        <!--end::Description-->
                    </div>
                </div> --}}

                <!--begin::Col-->
                <div class="col-lg-12">

                    {{-- Name Arabic English --}}

                    <!--begin::Row-->
                    <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label required fw-bold fs-6">
                                        {{ __('dashboard.order') }}
                                    </label>
                                    <div class="col-lg-8">
                                        <input autocomplete="off" type="text" name="name"
                                            class="form-control form-control-lg form-control-solid mb-3 mb-lg-0 name"
                                            placeholder="name"
                                            value="{{ old('name', $order->name) }}">
                                        <div class="fv-plugins-message-container invalid-feedback"></div>
                                        @error('name')
                                            <div class="fv-plugins-message-container invalid-feedback">{{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                    </div>
                    <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label required fw-bold fs-6">
                                        {{ __('dashboard.order') }}
                                    </label>
                                    <div class="col-lg-8">
                                        <input autocomplete="off" type="number" name="price"
                                            class="form-control form-control-lg form-control-solid mb-3 mb-lg-0 price"
                                            placeholder="price"
                                            value="{{ old('price' , $order->price) }}">
                                        <div class="fv-plugins-message-container invalid-feedback"></div>
                                        @error('price')
                                            <div class="fv-plugins-message-container invalid-feedback">{{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label required fw-bold fs-6">
                                    {{ __('dashboard.order') }}
                                </label>
                                <div class="col-lg-8">
                                    <input autocomplete="off" type="text" name="description"
                                        class="form-control form-control-lg form-control-solid mb-3 mb-lg-0 description"
                                        placeholder="description"
                                        value="{{ old('description' , $order->description) }}">
                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                    @error('description')
                                        <div class="fv-plugins-message-container invalid-feedback">{{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                </div>

                <div class="row fv-plugins-icon-container">
                    <label class="col-lg-2 col-form-label required fw-bold fs-6">{{ __('dashboard.has_order') }}
                    </label>
                    <div class="col-lg-4 d-flex align-items-center">
                        <div class="form-check form-check-solid form-check-custom form-switch">

                            <input type="hidden" name="has_order" value="0">
                            <input data-id="{{ $order->id }}" class="form-check-input w-45px h-30px sts-fld"
                                type="checkbox" id="has_order_{{ $order->id }}" name="has_order" value="1"
                                {{ old('has_order', $order->has_order ?? '') == 1 ? 'checked' : '' }}>

                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label required fw-bold fs-6">
                                {{ __('dashboard.order') }}
                            </label>
                            <div class="col-lg-8">
                                <input autocomplete="off" type="number" name="duration"
                                    class="form-control form-control-lg form-control-solid mb-3 mb-lg-0 duration"
                                    placeholder="duration"
                                    value="{{ old('duration' , $order->duration) }}">
                                <div class="fv-plugins-message-container invalid-feedback"></div>
                                @error('duration')
                                    <div class="fv-plugins-message-container invalid-feedback">{{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
            </div>

                    <!--end::Row-->
                    <!--begin::Row-->
                    <div class="row fv-plugins-icon-container">
                        <label class="col-lg-2 col-form-label required fw-bold fs-6">{{ __('dashboard.status') }}
                        </label>
                        <div class="col-lg-4 d-flex align-items-center">
                            <div class="form-check form-check-solid form-check-custom form-switch">

                                <input type="hidden" name="status" value="0">
                                <input data-id="{{ $order->id }}" class="form-check-input w-45px h-30px sts-fld"
                                    type="checkbox" id="status_{{ $order->id }}" name="status" value="1"
                                    {{ old('status', $order->status ?? '') == 1 ? 'checked' : '' }}>

                            </div>
                        </div>
                    </div>
                    <!--end::Row-->
                </div>
                <!--end::Col-->
            </div>

        </div>
        <!--end::Card header-->
    </div>
    <!--end::General options-->


    <div class="d-flex justify-content-center">
        <!--end::Button-->
        <!--begin::Button-->
        <button type="submit" class="btn btn-dark">
            <span class="indicator-label">{{ __('dashboard.save') }} </span>
            <span class="indicator-progress">Please wait...
                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
        </button>
        <!--end::Button-->
    </div>
</div>
<!--end::Main column-->
