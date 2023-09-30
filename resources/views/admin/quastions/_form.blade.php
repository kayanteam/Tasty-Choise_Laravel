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
                        <label class="col-lg-2 col-form-label required fw-bold fs-6">الشركة</label>
                        <div class="col-lg-4">
                            <!--begin::Label-->
                            <!--end::Label-->
                            <!--begin::Select2-->
                            <select name="company_id" class="form-select mb-2" data-control="select2"
                                data-placeholder="قم بتحديد الشركة" data-allow-clear="true">
                                <option></option>
                                @foreach ($compaines as $comp)
                                    <option value="{{ $comp->id }}" @selected($comp->id == old('company_id', $data->company_id))>
                                        {{ $comp->name }}</option>
                                @endforeach

                            </select>
                            <!--end::Select2-->
                        </div>

                        <label class="col-lg-2 col-form-label required fw-bold fs-6">القسم</label>
                        <div class="col-lg-4">
                            <!--begin::Label-->
                            <!--end::Label-->
                            <!--begin::Select2-->
                            <select name="category_id" class="form-select mb-2" data-control="select2"
                                data-placeholder="قم بتحديد القسم" data-allow-clear="true">
                                <option></option>
                                {{-- @foreach ($categories as $cat)
                                    <option value="{{ $cat->id }}" @selected($cat->id == old('category_id', $data->category_id))>
                                        {{ $cat->name }}</option>
                                @endforeach --}}

                            </select>
                            <!--end::Select2-->
                        </div>

                        <label class="col-lg-2 col-form-label required fw-bold fs-6">السؤال </label>
                        <!-- textarea -->
                        <div class="col-lg-10">
                            <textarea class="form-control form-control-solid" name="quastion[ar]" rows="3"
                                placeholder="الوصف">{{$data->getTranslation('quastion' , 'ar')}}</textarea>

                      
                       
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