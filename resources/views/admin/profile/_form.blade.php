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
                    <!--begin::Row-->
                    <div class="row fv-plugins-icon-container">

                        <label class="col-lg-2 col-form-label required fw-bold fs-6">الاسم
                            بالكامل</label>
                        <div class="col-lg-4">
                            <input autocomplete="off" type="text" name="name"
                                class="form-control form-control-lg  mb-3 mb-lg-0 name" placeholder="الاسم بالكامل"
                                value="{{ old('name', $user->name) }}">
                            <div class="fv-plugins-message-container invalid-feedback"></div>
                            @error('address')
                                <div class="fv-plugins-message-container invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <label class="col-lg-2 col-form-label required fw-bold fs-6">البريد
                            الالكتروني </label>

                        <div class="col-lg-4">
                            <input autocomplete="off" type="text" name="email"
                                class="form-control form-control-lg  mobile" placeholder="البريد الالكتروني"
                                value="{{ old('email', $user->email) }}">
                            <div class="fv-plugins-message-container invalid-feedback"></div>
                         
                            @error('email')
                                <div class="fv-plugins-message-container invalid-feedback">{{ $message }}</div>
                            @enderror

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
    <!--begin::Meta options-->
    <div class="card card-flush py-4">
        <!--begin::Card header-->
        <div class="card-header">
            <div class="card-title">
                <h2>تغيير كلمة المرور</h2>
            </div>
            <div class="card-toolbar">
                <a href="{{ route('profile.edit', $user->id) }}" class="btn btn-dark">تغيير</a>
            </div>
        </div>

    </div>



    <div class="d-flex justify-content-center">
        <!--end::Button-->
        <!--begin::Button-->
        <button type="submit" id="kt_ecommerce_add_category_submit" class="btn btn-dark">
            <span class="indicator-label">تعديل </span>

        </button>
        <!--end::Button-->
    </div>
</div>
<!--end::Main column-->
