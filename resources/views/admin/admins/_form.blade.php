<div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-12">
    <!--begin::General options-->
    <div class="card card-flush py-4">
        <!--begin::Card header-->
        <div class="card-header">
            <div class="card-title">
                <h2>{{ __('dashboard.general') }}</h2>
            </div>
        </div>
        <!--end::Card header-->
        <!--begin::Card body-->
        <div class="card-body pt-0">
            <div class="row mb-2">
                {{-- <!--begin::Col-->
                <div class="col-lg-12">
                    <div class="card-body text-center pt-0">
                        <x-image name="image" title="{{ __('dashboard.add_image') }}" :var="$admin" width="250px"
                            height="250px" />
                    </div>
                </div>
                <!--end::Col--> --}}
            </div>
            <div class="row mb-2">
                <!--begin::Col-->
                <div class="col-lg-12">
                    <div class="row">
                        {{-- Name Arabic English --}}
                        <x-form-input title="{{ __('dashboard.name') }}" name="name" type="text"
                            :var="$admin" />
                        <x-form-input title="{{ __('dashboard.email') }}" name="email" type="email"
                            :var="$admin" />
                        @if (Route::is('admins.create'))
                            <x-form-input title="{{ __('dashboard.password') }}" name="password" type="password"
                                :var="$admin" />
                            <x-form-input title="{{ __('dashboard.password_confirmation') }}"
                                name="password_confirmation" type="password" :var="$admin" />
                        @endif
                        <x-form-input title="{{ __('dashboard.company_id') }}" name="company_id" type="select"
                            :var="$companies" />


                        <!--select roles -->
                        {{-- <div class="col-lg-6">
                            <div class="fv-row mb-7">
                                <label class="required fs-6 fw-bold mb-2">{{ __('dashboard.roles') }}</label>
                                <select name="role_id" aria-label="Select a Role" data-control="select2"
                                    data-placeholder="Select a Role..." class="form-select form-select-solid fw-bolder">
                                    @foreach ($roles as $role)
                                        <option value="{{ $role->id }}" >{{ $role->name }}</option>
                                    @endforeach
                                </select>
                              
                            </div> --}}

                        <x-status :var="$admin" />
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
