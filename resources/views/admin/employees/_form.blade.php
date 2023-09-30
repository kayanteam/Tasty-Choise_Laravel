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
                                background-image: url({{ $data->image ? $data->image_path : 'assets/media/svg/files/blank-image.svg' }});
                            }

                            [data-theme="dark"] .image-input-placeholder {
                                background-image: url('assets/media/svg/files/blank-image-dark.svg');
                            }
                        </style>
                        <!--end::Image input placeholder-->
                        <div class="image-input image-input-empty image-input-outline image-input-placeholder mb-3"
                            data-kt-image-input="true">
                            <!--begin::Preview existing avatar-->
                            <div class="image-input-wrapper w-150px h-150px"></div>
                            <!--end::Preview existing avatar-->
                            <!--begin::Label-->
                            <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                data-kt-image-input-action="change" data-bs-toggle="tooltip" aria-label="Change avatar"
                                data-kt-initialized="1">
                                <i class="bi bi-pencil-fill fs-7"></i>
                                <!--begin::Inputs-->
                                <input type="file" name="image" accept=".png, .jpg, .jpeg">
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
                        </div>
                        <!--end::Image input-->
                        <!--begin::Description-->
                        <div class="text-muted fs-7">قم بتعيين الصورة المصغرة للمنتج. تقبل فقط ملفات الصور * .png و *
                            .jpg و * .jpeg
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

            <div class="row mb-2">


                <!--begin::Col-->
                <div class="col-lg-12">
                    <!--begin::Row-->
                    <div class="row fv-plugins-icon-container">

                        <label class="col-lg-2 col-form-label required fw-bold fs-6">لقسم</label>
                        <div class="col-lg-4">
                            <!--begin::Label-->
                            <!--end::Label-->
                            <!--begin::Select2-->
                            <select id="company_id" class="form-select mb-2" data-control="select2"
                                data-placeholder="قم بتحديد الشركة" data-allow-clear="true">
                                <option></option>
                                @php
                                    $CompanyId = $data->Category ? $data->Category->company_id : null ;
                                @endphp
                                @foreach ($companies as $company)
                                    <option value="{{ $company->id }}" @selected($company->id ==  $CompanyId)>
                                        {{  $company->name  }}</option>
                                @endforeach

                            </select>
                            <!--end::Select2-->
                        </div>


                        <div class="col-lg-6">
                            <!--begin::Label-->
                            <!--end::Label-->
                            <!--begin::Select2-->
                            <select id="category_id" name="category_id" class="form-select mb-2" data-control="select2"
                                data-placeholder="قم بتحديد القسم" data-allow-clear="true">
                                <option></option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" @selected($category->id == old('category_id', $data->category_id))>
                                        {{  $category->name  }}</option>
                                @endforeach

                            </select>
                            <!--end::Select2-->
                        </div>



                        <label class="col-lg-2 col-form-label required fw-bold fs-6">الدور</label>
                        <div class="col-lg-4">
                            <!--begin::Label-->
                            <!--end::Label-->
                            <!--begin::Select2-->
                            <select name="role" class="form-select mb-2" data-control="select2"
                                data-placeholder="قم بتحديد الدور" data-allow-clear="true">
                                <option></option>
                                <option value="1" @selected($data->role == old('role', 1))>مستخدم تطبيق</option>
                                <option value="2" @selected($data->role == old('role', 2))>مسؤول قسم</option>
                            </select>
                            <!--end::Select2-->
                        </div>
                    </div>
                    <!--end::Row-->


                </div>
                <!--end::Col-->



            </div>

            <div class="seperator "></div>
            <div class="row mb-2">
                <!--begin::Col-->
                <div class="col-lg-12">
                    <!--begin::Row-->
                    <div class="row fv-plugins-icon-container">

                        <label class="col-lg-2 col-form-label required fw-bold fs-6">الاسم
                            بالكامل</label>
                        <div class="col-lg-4">
                            <input autocomplete="off" type="text" name="name"
                                class="form-control form-control-lg form-control-solid mb-3 mb-lg-0 name"
                                placeholder="الاسم بالكامل" value="{{ old('name', $data->name) }}">
                            <div class="fv-plugins-message-container invalid-feedback"></div>
                            @error('name')
                                <div class="fv-plugins-message-container invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <label class="col-lg-2 col-form-label required fw-bold fs-6">رقم
                            الجوال</label>
                        <div class="col-lg-4">
                            <input autocomplete="off" type="text" name="phone" max="13"
                                class="form-control form-control-lg form-control-solid item_no patient_search ui-autocomplete-input "
                                placeholder="رقم الجوال" value="{{ old('phone', $data->phone) }}" autocomplete="off">

                            <div class="fv-plugins-message-container invalid-feedback"></div>
                            @error('phone')
                                <div class="fv-plugins-message-container invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>


                        <label class="col-lg-2 col-form-label required fw-bold fs-6">البريد الالكتروني</label>
                        <div class="col-lg-4">
                            <input autocomplete="off" type="text" name="email"
                                class="form-control form-control-lg form-control-solid mb-3 mb-lg-0 email"
                                placeholder="البريد الالكتروني" value="{{ old('email', $data->email) }}">
                            <div class="fv-plugins-message-container invalid-feedback"></div>
                            @error('email')
                                <div class="fv-plugins-message-container invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <label class="col-lg-2 col-form-label required fw-bold fs-6">الرقم الوظيفي</label>
                        <div class="col-lg-4">
                            <input autocomplete="off" type="text" name="emp_no"
                                class="form-control form-control-lg form-control-solid mb-3 mb-lg-0 emp_no"
                                placeholder="الرقم الوظيفي" value="{{ old('emp_no', $data->emp_no) }}">
                            <div class="fv-plugins-message-container invalid-feedback"></div>
                            @error('emp_no')
                                <div class="fv-plugins-message-container invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>



                        <label class="col-lg-2 col-form-label required fw-bold fs-6">رقم
                            الهوية</label>
                        <div class="col-lg-4">
                            <input autocomplete="off" type="text" name="id_number" max="13"
                                class="form-control form-control-lg form-control-solid item_no patient_search ui-autocomplete-input "
                                placeholder="رقم الهوية" value="{{ old('id_number', $data->id_number) }}"
                                autocomplete="off">

                            <div class="fv-plugins-message-container invalid-feedback"></div>
                            @error('id_number')
                                <div class="fv-plugins-message-container invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>



                    </div>
                    <!--end::Row-->


                    <hr class="py-3">
                    {{-- <!--begin::Row-->
                      <div class="row fv-plugins-icon-container">

                     
                       
                        <label class="col-lg-2 col-form-label required fw-bold fs-6">كلمة المرور</label>
                        <div class="col-lg-4">
                            <input autocomplete="off" type="password" name="password"
                                class="form-control form-control-lg form-control-solid mb-3 mb-lg-0 password"
                                placeholder="كلمة المرور" value="{{ old('password', $data->name) }}">
                            <div class="fv-plugins-message-container invalid-feedback"></div>
                            @error('password')
                                <div class="fv-plugins-message-container invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>



                        <label class="col-lg-2 col-form-label required fw-bold fs-6">تأكيد كلمة المرور</label>
                        <div class="col-lg-4">
                            <input autocomplete="off" type="password" name="password_confirmation"
                                class="form-control form-control-lg form-control-solid mb-3 mb-lg-0 password"
                                placeholder="تأكيد كلمة المرور" value="{{ old('password', $data->name) }}">
                            <div class="fv-plugins-message-container invalid-feedback"></div>
                            @error('password')
                                <div class="fv-plugins-message-container invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>
                    <!--end::Row--> --}}



                </div>
                <!--end::Col-->







                <!--begin::Col-->
                <div class="col-lg-12">












                </div>
            </div>
            <!--end::Row-->


        </div>
        <!--end::Col-->
    </div>







</div>
<!--end::Card header-->
</div>

<div class="d-flex justify-content-center">
    <!--end::Button-->
    <!--begin::Button-->
    <button type="submit" id="kt_ecommerce_add_category_submit" class="btn btn-primary">
        <span class="indicator-label">حفظ الموظف</span>
        <span class="indicator-progress">Please wait...
            <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
    </button>
    <!--end::Button-->
</div>
</div>
<!--end::Main column-->
