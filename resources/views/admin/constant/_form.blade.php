<div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-12">
    <!--begin::General options-->
    <div class="card card-flush py-4">
        <!--begin::Card header-->
        <div class="card-header">
            <div class="card-title">
                <h2>{{ 'الثوابت' }}</h2>
            </div>
        </div>
        <!--end::Card header-->
        <!--begin::Card body-->
        <div class="card-body pt-0">

            <div class="row mb-2">

                <!--begin::Col-->
                <div class="col-lg-12">

                    {{-- Name Arabic English --}}

                    <!--begin::Row-->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group row">
                                @foreach ($constant as $const)
                                <label class="col-lg-4 col-form-label required fw-bold fs-6">
                                    {{$const->key}}
                                </label>
                                <div class="col-lg-8">
                                    @if ($const->key === 'privacy-policy' || $const->key === 'aboutapp')
                                        <textarea autocomplete="off" name="keys[{{$const->key}}]"
                                            class="form-control form-control-lg form-control-solid mb-3 mb-lg-0 name"
                                            placeholder="{{$const->key}}">{{$const->value}}</textarea>
                                    @else
                                        <input autocomplete="off" type="text" name="keys[{{$const->key}}]"
                                            class="form-control form-control-lg form-control-solid mb-3 mb-lg-0 name"
                                            placeholder="{{$const->key}}" value="{{$const->value}}">
                                    @endif
                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                    @error($const->key)
                                        <div class="fv-plugins-message-container invalid-feedback">{{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>



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
