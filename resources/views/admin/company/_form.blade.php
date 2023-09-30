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
                        <label class="col-lg-2 col-form-label required fw-bold fs-6">الاسم </label>
                        <div class="col-lg-10">
                            <input type="text" name="name[ar]"
                                class="form-control form-control-lg form-control-solid mb-3 mb-lg-0 name"
                                placeholder="الاسم بالكامل" value="{{$data->getTranslation('name' , 'ar')}}">
                            <div class="fv-plugins-message-container invalid-feedback"></div>
                        </div>


                        <label class="col-lg-2 col-form-label required fw-bold fs-6">الوصف </label>
                        <!-- textarea -->
                        <div class="col-lg-10">
                            <textarea class="form-control form-control-solid" name="description[ar]" rows="3"
                                placeholder="الوصف">{{$data->getTranslation('description' , 'ar')}}</textarea>


                      
                        <label class="col-lg-2 col-form-label required fw-bold fs-6">الحالة</label>

                        <div class="col-lg-4 d-flex align-items-center">
                            <div class="form-check form-check-solid form-switch fv-row">
                                <input type="hidden" name="status" value="0">
                                <input class="form-check-input w-45px h-30px" type="checkbox" id="status" name="status" value="1" >
                                <label class="form-check-label" for="allowmarketing"></label>
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
        <button type="submit" class="btn btn-primary">
            <span class="indicator-label">تعديل الصنف</span>
            <span class="indicator-progress">Please wait...
                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
        </button>
        <!--end::Button-->
    </div>
</div>
<!--end::Main column-->