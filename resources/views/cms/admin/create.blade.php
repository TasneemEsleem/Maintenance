@extends('cms.parent')
@section('styles')
    	<!--begin::Vendor Stylesheets(used for this page only)-->
		<link href="{{asset('cms/assets/plugins/custom/datatables/datatables.bundle.css')}}" rel="stylesheet" type="text/css" />
		<!--end::Vendor Stylesheets-->
@endsection

@section('title',__('cms.admins'))
@section('page-lg',__('cms.home'))
@section('main-pg-md',__('cms.Admin_Management'))
@section('page-md',__('cms.add_admin'))
@section('Content')
<div class="col-xl-12">
    <!--begin::Contacts-->
    <div class="card card-flush h-lg-100" id="kt_contacts_main">
        <!--begin::Card header-->
        <div class="card-header pt-7" id="kt_chat_contacts_header">
            <!--begin::Card title-->
            <div class="card-title">
                <!--begin::Svg Icon | path: icons/duotune/communication/com005.svg-->
                <span class="svg-icon svg-icon-1 me-2">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M20 14H18V10H20C20.6 10 21 10.4 21 11V13C21 13.6 20.6 14 20 14ZM21 19V17C21 16.4 20.6 16 20 16H18V20H20C20.6 20 21 19.6 21 19ZM21 7V5C21 4.4 20.6 4 20 4H18V8H20C20.6 8 21 7.6 21 7Z" fill="currentColor"></path>
                        <path opacity="0.3" d="M17 22H3C2.4 22 2 21.6 2 21V3C2 2.4 2.4 2 3 2H17C17.6 2 18 2.4 18 3V21C18 21.6 17.6 22 17 22ZM10 7C8.9 7 8 7.9 8 9C8 10.1 8.9 11 10 11C11.1 11 12 10.1 12 9C12 7.9 11.1 7 10 7ZM13.3 16C14 16 14.5 15.3 14.3 14.7C13.7 13.2 12 12 10.1 12C8.10001 12 6.49999 13.1 5.89999 14.7C5.59999 15.3 6.19999 16 7.39999 16H13.3Z" fill="currentColor"></path>
                    </svg>
                </span>
                <!--end::Svg Icon-->
                <h2>{{__('cms.add_admin')}}</h2>
            </div>
            <!--end::Card title-->
        </div>
        <!--end::Card header-->
        <!--begin::Card body-->
        <div class="card-body pt-5">
            <!--begin::Form-->
            <form id="create-form" class="form fv-plugins-bootstrap5 fv-plugins-framework" >
                @csrf


                <!--begin::Input group-->

                <!--end::Input group-->
                <div class="row">

                    <div class="col-6">
                           <div class="fv-row mb-7 fv-plugins-icon-container">
                        <!--begin::Label-->
                        <label class="fs-6 fw-semibold form-label mt-3">
                            <span class="required">{{__('cms.name')}}</span>
                            <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" aria-label="Enter the contact's name." data-bs-original-title="Enter the contact's name." data-kt-initialized="1"></i>
                        </label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <input type="text" class="form-control form-control-solid" id="name" >
                        <!--end::Input-->
                    <div class="fv-plugins-message-container invalid-feedback"></div></div>
                 </div>

                    <div class="col-6">
                        <div class="fv-row mb-7 fv-plugins-icon-container">
                            <!--begin::Label-->
                            <label class="fs-6 fw-semibold form-label mt-3">
                                <span class="required">
                                    {{__('cms.email')}} </span>
                                <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" aria-label="Enter the contact's email." data-bs-original-title="Enter the contact's email." data-kt-initialized="1"></i>
                            </label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="email" class="form-control form-control-solid" id="email"  >
                            <!--end::Input-->
                        <div class="fv-plugins-message-container invalid-feedback"></div></div>
                   </div>


                </div>

                <!--begin::Input group-->

   <!--begin::Input group-->

   <div class="col-6">
    <div class="fv-row mb-7 fv-plugins-icon-container">
        <!--begin::Label-->
        <label class="fs-6 fw-semibold form-label mt-3">
            <span class="required">
                {{__('cms.guard_name')}} </span>
</div>

    <!--end::Label-->
    <!--begin::Col-->
    <div class="col-lg-12 fv-row">
        <!--begin::Input-->
        <select id="role_id"  class="form-select form-select-solid form-select-lg" data-control="select2"
        data-select2-id="select2-data-10-uyhn"
        name="role_id" aria-label={{__('cms.role')}} data-control="select2" data-placeholder={{__('cms.roles')}}>
           <option  value="">{{__('cms.roles')}} </option>
           @foreach ($roles as $role)
           <option  data-kt-flag="flags/indonesia.svg" value="{{ $role->id }}">{{$role->name}}</option>

           @endforeach

       </select>


        <!--end::Input-->
        <!--begin::Hint-->
        <div class="form-text">"{{__('cms.select-guard')}}"</div>
        <!--end::Hint-->
    </div>
    <!--end::Col-->
</div>
<!--end::Input group-->





             <div class="row">
                <div class="mb-7">
                    <!--begin::Label-->
                    <label class="fs-6 fw-semibold mb-3">
                        <span>{{__('cms.image')}}</span>

                        <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" aria-label="Allowed file types: png, jpg, jpeg." data-bs-original-title="Allowed file types: png, jpg, jpeg." data-kt-initialized="1"></i>
                    </label>
                    <!--end::Label-->
                    <!--begin::Image input wrapper-->
                    <div class="card card-flush py-4">
                        <!--begin::Card header-->

                        <!--end::Card header-->
                        <!--begin::Card body-->
                        <div class="card-body  pt-0">
                            <!--begin::Image input-->
                            <!--begin::Image input placeholder-->
                            <style>.image-input-placeholder { background-image: url('assets/media/svg/files/blank-image.svg'); } [data-theme="dark"] .image-input-placeholder { background-image: url('assets/media/svg/files/blank-image-dark.svg'); }</style>
                            <!--end::Image input placeholder-->
                            <div class="image-input image-input-empty image-input-outline image-input-placeholder mb-3" data-kt-image-input="true">
                                <!--begin::Preview existing avatar-->
                                <div class="image-input-wrapper w-150px h-150px"></div>
                                <!--end::Preview existing avatar-->
                                <!--begin::Label-->
                                <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" aria-label="Change avatar" data-bs-original-title="Change avatar" data-kt-initialized="1">
                                    <i class="bi bi-pencil-fill fs-7"></i>
                                    <!--begin::Inputs-->
                                    <input type="file" id="admin_image" accept=".png, .jpg, .jpeg">
                                    <input type="hidden" name="avatar_remove">
                                    <!--end::Inputs-->
                                </label>
                                <!--end::Label-->



                                <!--begin::Cancel-->
                                <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" aria-label="Cancel avatar" data-bs-original-title="Cancel avatar" data-kt-initialized="1">
                                    <i class="bi bi-x fs-2"></i>
                                </span>
                                <!--end::Cancel-->
                                <!--begin::Remove-->
                                <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" aria-label="Remove avatar" data-bs-original-title="Remove avatar" data-kt-initialized="1">
                                    <i class="bi bi-x fs-2"></i>
                                </span>
                                <!--end::Remove-->
                            </div>
                            <!--end::Image input-->
                            <!--begin::Description-->
                            <div class="text-muted fs-7">Set the product image. Only *.png, *.jpg and *.jpeg image files are accepted</div>
                            <!--end::Description-->
                        </div>
                        <!--end::Card body-->
                    </div>

                    <!--end::Image input wrapper-->
                </div>
             </div>

             <div class="d-flex justify-content-begin">
                <!--begin::Switch-->
                <label class="form-check form-switch form-switch-sm form-check-custom form-check-solid">
                    <!--begin::Input-->
                    <input class="form-check-input" id="active" type="checkbox" checked="checked">
                    <!--end::Input-->
                    <!--begin::Label-->
                    <span class="form-check-label fw-semibold text-muted">{{__('cms.active')}}</span>
                    <!--end::Label-->
                </label>
                <!--end::Switch-->
            </div>
                <!--end::Separator-->
                <!--begin::Action buttons-->
                <div class="d-flex justify-content-center">
                    <!--begin::Button-->
                    <!--end::Button-->
                    <!--begin::Button-->
                    <button type="button" onclick="performStore()"  class="btn btn-primary">
                        <span class="indicator-label">{{__('cms.save')}}</span>
                        <span class="indicator-progress">Please wait...
                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                    </button>
                    <!--end::Button-->
                </div>
                <!--end::Action buttons-->
            </form>
            <!--end::Form-->
        </div>
        <!--end::Card body-->
    </div>
    <!--end::Contacts-->
</div>
@endsection
@section('scripts')
<script src="{{asset('cms/assets/plugins/custom/datatables/datatables.bundle.js')}}"></script>
<script src="{{asset('cms/assets/plugins/custom/formrepeater/formrepeater.bundle.js')}}"></script>
<script src="{{asset('cms/assets/js/custom/apps/ecommerce/catalog/save-product.js')}}"></script>
<script src="{{asset('cms/assets/js/widgets.bundle.js')}}"></script>
<script src="{{asset('cms/assets/js/custom/widgets.js')}}"></script>
<script src="{{asset('cms/assets/js/custom/apps/chat/chat.js')}}"></script>
<script src="{{asset('cms/assets/js/custom/utilities/modals/upgrade-plan.js')}}"></script>
<script src="{{asset('cms/assets/js/custom/utilities/modals/create-app.js')}}"></script>
<script src="{{asset('cms/assets/js/custom/utilities/modals/users-search.js')}}"></script>

 <script>
    $(function () { bsCustomFileInput.init() });
  </script>
<script>

    function performStore() {
         var formData = new FormData();
         formData.append('name', document.getElementById('name').value);
         formData.append('role_id', document.getElementById('role_id').value);
         formData.append('email', document.getElementById('email').value);
         formData.append('active', document.getElementById('active').checked ? 1:0);
         formData.append('image',document.getElementById('admin_image').files[0]);
        axios.post('/cms/admins', formData)
        .then(function (response) {
            console.log(response);
            toastr.success(response.data.message);
            document.getElementById('create-form').reset();
            window.location.href = '/cms/admins';

        })
        .catch(function (error) {
            console.log(error.response);
            toastr.error(error.response.data.message);
        });}
 </script>
@endsection
