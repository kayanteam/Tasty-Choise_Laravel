<div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-12">
    <!--begin::General options-->
    <div class="card card-flush py-4">
        <!--begin::Card header-->
        <div class="card-header">
            <div class="card-title">
                <h2>عام</h2>
            </div>
        </div>
        <!--end::Card header-->
        <!--begin::Card body-->
        <div class="card-body pt-0">

            <div class="row mb-2">
                <!--begin::Col-->
                <div class="col-lg-12">
                    <div class="card-body text-center pt-0">
                        <!--begin::Image input-->
                        <!--begin::Image input placeholder-->
                        <style>
                            .image-input-placeholder {
                                background-image: url({{ asset('assets/media/svg/files/pic.jpg') }});
                            }

                            [data-theme="dark"] .image-input-placeholder {
                                background-image: url('assets/media/svg/files/blank-image-dark.svg');
                            }
                        </style>
                        <!--end::Image input placeholder-->
                        {{-- <div class="image-input image-input-empty image-input-outline image-input-placeholder mb-3"
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
                                <input type="file" name="icon" accept=".png, .jpg, .jpeg">
                                <input type="hidden" name="image_remove">
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
                        </div> --}}
                        <!--end::Image input-->
                        <!--begin::Description-->
                        {{-- <div class="text-muted fs-7">قم بتعيين صورة. تقبل فقط ملفات الصور * .png و *
                            .jpg و * .jpeg
                        </div>
                        <div class="fv-plugins-message-container invalid-feedback"></div>
                        @error('image')
                            <div class="fv-plugins-message-container invalid-feedback">{{ $message }}</div>
                        @enderror --}}
                        <!--end::Description-->
                    </div>
                </div>
                <!--end::Col-->

            </div>
            <div class="row mb-2">
                <!--begin::Col-->
                <div class="col-lg-12">

                    {{-- Name Arabic English --}}

                    <!--begin::Row-->
                    <div class="row">
                        {{-- @foreach (config('lang') as $key => $lang) --}}
                            <div class="col-lg-6">
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label required fw-bold fs-6">
                                        {{'الاسم' }}
                                    </label>
                                    <div class="col-lg-8">
                                        <input autocomplete="off" type="text" name="name"
                                            class="form-control form-control-lg form-control-solid mb-3 mb-lg-0 name"
                                            placeholder="الاسم"
                                            value="{{ old(name ,$User->name) }}">
                                        <div class="fv-plugins-message-container invalid-feedback"></div>
                                        @error('name')
                                            <div class="fv-plugins-message-container invalid-feedback">{{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        {{-- @endforeach --}}

                    <!--end::Row-->
                    <!--begin::Row-->


                    <!--end::Row-->



                        <div class="col-lg-6">
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label required fw-bold fs-6">
                                    {{'البريدالالكتروني'}}
                                </label>
                                <div class="col-lg-8">
                                    <input autocomplete="off" type="email" name="email"
                                        class="form-control form-control-lg form-control-solid mb-3 mb-lg-0 email"
                                        placeholder="البريد الالكتروني"
                                        value="{{ old(name ,$User->email) }}">
                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                    @error('email')
                                        <div class="fv-plugins-message-container invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label required fw-bold fs-6">
                                 {{'رقم الهاتف'}}
                                </label>
                                <div class="col-lg-8">
                                    <input autocomplete="off" type="phone" name="phone"
                                        class="form-control form-control-lg form-control-solid mb-3 mb-lg-0 phone"
                                        placeholder="رقم الهاتف"
                                        value="{{ old(name ,$User->phone) }}">
                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                    @error('phone')
                                        <div class="fv-plugins-message-container invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                    </div>

                    <!--begin::Row-->
                    <div class="row fv-plugins-icon-container">
                        <label class="col-lg-2 col-form-label required fw-bold fs-6">{{ __('dashboard.status') }}
                        </label>
                        <div class="col-lg-4 d-flex align-items-center">
                            <div class="form-check form-check-solid form-switch fv-row">
                                <input type="hidden" name="status" value="{{ $User->status }}">
                                <input class="form-check-input w-45px h-30px" type="checkbox" id="status"
                                    name="status" value="1" checked="">
                                <label class="form-check-label" for="allowmarketing"></label>
                            </div>
                        </div>
                        {{-- <label class="col-lg-2 col-form-label required fw-bold fs-6">{{
__('dashboard.paymentmethods') }} </label>
                        <div class="col-lg-4">
                            @foreach ($paymentMethods as $method)
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="payments[]" value="{{ $method->id }}">
                                    <label class="form-check-label" for="{{ 'payment_method_'.$method->id }}">
                                        {{ $method->name }}
                                    </label>
                                </div>
                            @endforeach
                        </div> --}}
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
