<div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-12">
    <!--begin::General options-->
    <div class="card card-flush py-4">
        <!--begin::Card header-->
        <div class="card-header">
            <div class="card-title">
                <h2>{{ __('dashboard.ad') }}</h2>
            </div>
        </div>
        <!--end::Card header-->
        <!--begin::Card body-->
        <div class="card-body pt-0">
            <div class="d-flex justify-content-center">
                <div class="row mb-2">
                    <!--begin::Col-->
                    <div class="col-lg-12">
                        <div class="card-body text-center pt-0">
                            <!--begin::Image input-->
                            <!--begin::Image input placeholder-->
                            <style>
                                .image-input-placeholder {
                                    background-image: url({{ isset($Ads) && $Ads->image ? asset('storage/' . $Ads->image) : asset('assets/media/svg/files/pic.jpg') }});
                                }

                                [data-theme="dark"] .image-input-placeholder {
                                    background-image: url({{ isset($Ads) && $Ads->image ? asset('storage/' . $Ads->image) : asset('assets/media/svg/files/blank-image-dark.svg') }});
                                }
                            </style>
                            <!--end::Image input placeholder-->
                            <div class="image-input image-input-empty image-input-outline image-input-placeholder mb-3"
                                data-kt-image-input="true">
                                <!--begin::Preview existing avatar-->
                                <div class="image-input-wrapper w-400px h-250px" style="background-position: center"></div>
                                <!--end::Preview existing avatar-->
                                <!--begin::Label-->
                                <label
                                    class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                    data-kt-image-input-action="change" data-bs-toggle="tooltip"
                                    aria-label="Change avatar" data-kt-initialized="1">
                                    <i class="bi bi-pencil-fill fs-7"></i>
                                    <!--begin::Inputs-->
                                    <input type="file" name="image" accept=".png, .jpg, .jpeg">
                                    <input type="hidden" name="image_remove">
                                    <!--end::Inputs-->
                                </label>
                                <!--end::Label-->
                                <!--begin::Cancel-->
                                <span
                                    class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                    data-kt-image-input-action="cancel" data-bs-toggle="tooltip"
                                    aria-label="Cancel avatar" data-kt-initialized="1">
                                    <i class="bi bi-x fs-2"></i>
                                </span>
                                <!--end::Cancel-->
                                <!--begin::Remove-->
                                <span
                                    class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                    data-kt-image-input-action="remove" data-bs-toggle="tooltip"
                                    aria-label="Remove avatar" data-kt-initialized="1">
                                    <i class="bi bi-x fs-2"></i>
                                </span>
                                <!--end::Remove-->
                            </div>
                            <!--end::Image input-->
                            <!--begin::Description-->
                            <div class="text-muted fs-7">
                                {{ __('dashboard.ad_icon') }}
                            </div>
                            <div class="fv-plugins-message-container invalid-feedback"></div>
                            @error('image')
                                <div class="fv-plugins-message-container invalid-feedback">{{ $message }}</div>
                            @enderror
                            <!--end::Description-->
                        </div>
                    </div>
                    <!--end::Col-->

                </div>
            </div>
            <div class="row mb-2">
                <!--begin::Col-->
                <div class="col-lg-12">

                    {{-- Name Arabic English --}}

                    <!--begin::Row-->
                    <div class="row">


                        {{-- <div class="col-lg-6">
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label required fw-bold fs-6">
                                    {{ __('dashboard.type') }}
                                </label>
                                <div class="col-lg-8">
                                    <select name="type" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" id="typeAds">
                                        <option value="">
                                            {{ __('dashboard.select_type_category') . ' ... ' }}
                                        </option>
                                        <option value="user" @if( $Ads->type == 'user' ) selected @endif>
                                            {{ __('dashboard.user') }}
                                        </option>
                                        <option value="provider" @if( $Ads->type == 'provider' ) selected @endif>
                                            {{ __('dashboard.provider') }}
                                        </option>
                                    </select>

                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                    @error('category_id')
                                    <div class="fv-plugins-message-container invalid-feedback">{{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div> --}}


                        {{-- <div class="col-lg-6 categoryInput @if( $Ads->type == 'driver' ) d-none @endif">
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label required fw-bold fs-6">
                                    {{ __('dashboard.category') }}
                                </label>
                                <div class="col-lg-8">
                                    <select name="category_id" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0 categoryads">
                                        <option value="">{{ __('dashboard.select_ad_category') . ' ... ' }}
                                        </option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}"
                                                {{ old('category_id', $Ads->category_id) == $category->id ? 'selected' : '' }}>
                                                {{ $category->name }}
                                            </option>
                                        @endforeach
                                    </select>

                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                    @error('category_id')
                                        <div class="fv-plugins-message-container invalid-feedback">{{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div> --}}
                    </div>

                    {{--
                    <div class="row">
                        @foreach (config('lang') as $key => $lang)
                            <div class="col-lg-6">
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label required fw-bold fs-6">
                                        {{ __('dashboard.ad_title') }} ({{ $lang }})
                                    </label>
                                    <div class="col-lg-8">
                                        <input autocomplete="off" type="text" name="title[{{ $key }}]"
                                            class="form-control form-control-lg form-control-solid mb-3 mb-lg-0 name"
                                            placeholder="{{ $lang }}"
                                            value="{{ old('title.' . $key, $ads->getTranslation('title', $key)) }}">
                                        <div class="fv-plugins-message-container invalid-feedback"></div>
                                        @error('title')
                                            <div class="fv-plugins-message-container invalid-feedback">{{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label required fw-bold fs-6">
                                        {{ __('dashboard.ads_desc') }} ({{ $lang }})
                                    </label>
                                    <div class="col-lg-8">
                                        <input autocomplete="off" type="text" name="desc[{{ $key }}]"
                                            class="form-control form-control-lg form-control-solid mb-3 mb-lg-0 name"
                                            placeholder="{{ $lang }}"
                                            value="{{ old('desc.' . $key, $ads->getTranslation('desc', $key)) }}">
                                        <div class="fv-plugins-message-container invalid-feedback"></div>
                                        @error('desc')
                                            <div class="fv-plugins-message-container invalid-feedback">{{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div> --}}

                    <!--end::Row-->

                    <!--begin::Row-->


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
