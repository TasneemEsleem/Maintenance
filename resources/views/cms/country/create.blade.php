@extends('cms.parent')
@section('title',__('cms.country'))
@section('page-lg',__('cms.home'))
@section('main-pg-md',__('cms.country_Management'))
@section('page-md',__('cms.create_country'))
@section('styles')
<link href="{{asset('cms/assets/plugins/custom/datatables/datatables.bundle.css')}}" rel="stylesheet" type="text/css" />
@endsection
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
                <h2>{{__('cms.create_country')}}</h2>
            </div>
            <!--end::Card title-->
        </div>
        <!--end::Card header-->
        <!--begin::Card body-->
        <div class="card-body pt-5">
            <!--begin::Form-->
            <form id="create-form" class="form fv-plugins-bootstrap5 fv-plugins-framework" >
                @csrf
                <div class="row">
                    
                    <div class="col-6">
                           <div class="fv-row mb-7 fv-plugins-icon-container">
                        <!--begin::Label-->
                        <label class="fs-6 fw-semibold form-label mt-3">
                            <span class="required">{{__('cms.name_ar')}}</span>
                            <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" data-bs-original-title="Enter the  name." data-kt-initialized="1"></i>
                        </label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <input type="text" class="form-control form-control-solid" id="name_ar" >
                        <!--end::Input-->
                    <div class="fv-plugins-message-container invalid-feedback"></div></div>
                 </div>
                 <div class="col-6">
                           <div class="fv-row mb-7 fv-plugins-icon-container">
                        <!--begin::Label-->
                        <label class="fs-6 fw-semibold form-label mt-3">
                            <span class="required">{{__('cms.name_en')}}</span>
                            <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" data-bs-original-title="Enter the  name." data-kt-initialized="1"></i>
                        </label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <input type="text" class="form-control form-control-solid" id="name_en" >
                        <!--end::Input-->
                    <div class="fv-plugins-message-container invalid-feedback"></div></div>
                 </div>

                <!--begin::Action buttons-->
                <div class="d-flex justify-content-center">
                    <!--begin::Button-->
                    <!--end::Button-->
                    <!--begin::Button-->
                    <button type="button" onclick="performStore()" class="btn btn-primary">
                        <span class="indicator-label">{{__('cms.save')}}</span>
                        <span class="indicator-progress">{{__('cms.Please_wait')}}...
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
        formData.append('name_ar',document.getElementById('name_ar').value);
        formData.append('name_en',document.getElementById('name_en').value);
       axios.post('/cms/countries', formData)    
       .then(function (response) {
           console.log(response);
           toastr.success(response.data.message);
        //    document.getElementById('create-form').reset();
           window.location.href = '/cms/countries';

       })
       .catch(function (error) {
           console.log(error.response);
           toastr.error(error.response.data.message);
       });}
</script>
@endsection