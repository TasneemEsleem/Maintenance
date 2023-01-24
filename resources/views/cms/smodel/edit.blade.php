@extends('cms.parent')
@section('title',__('cms.model'))
@section('page-lg',__('cms.home'))
@section('main-pg-md',__('cms.model_mangment'))
@section('page-md',__('cms.edit_model'))
@section('styles')
    	<!--begin::Vendor Stylesheets(used for this page only)-->
		<link href="{{asset('cms/assets/plugins/custom/datatables/datatables.bundle.css')}}" rel="stylesheet" type="text/css" />
		<!--end::Vendor Stylesheets-->
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
                <h2>{{__('cms.edit_model')}}</h2>
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
                        <div class="fv-row w-100 flex-md-root fv-plugins-icon-container" data-select2-id="select2-data-131-74d4">
                            <!--begin::Label-->
                            <label class="required form-label">{{__('cms.brands')}}</label>
        
                            <select class="form-select mb-2 " name="tax" id="brand_id" >
                                @foreach ($brands as $brand)
                                <option value="{{$brand->id}}" @if($sModel->brand_id == $brand->id) selected @endif>{{$brand->name}}
                                </option>
                                @endforeach
                            </select>
                               
                            <!--end::Select2-->
                            <!--begin::Description-->
                            <!--end::Description-->
                        <div class="fv-plugins-message-container invalid-feedback"></div>
                      </div>
                    </div>



                    <div class="col-6">
                        <div class="fv-row w-100 flex-md-root fv-plugins-icon-container" data-select2-id="select2-data-131-74d4">
                            <!--begin::Label-->
                            <label class="required form-label">{{__('cms.categories')}}</label>
        
                            <select class="form-select mb-2 " name="tax" id="category_id" >
                                @foreach ($categories as $category)
                                <option value="{{$category->id}}" @if($sModel->category_id == $category->id) selected @endif>{{$category->name}}
                                </option>
                                @endforeach
                            </select>
                               
                            <!--end::Select2-->
                            <!--begin::Description-->
                            <!--end::Description-->
                        <div class="fv-plugins-message-container invalid-feedback"></div>
                    </div>

                    </div>
                </div>
      
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
                        <input type="text" class="form-control form-control-solid" id="name" value="{{$sModel->name}}">
                        <!--end::Input-->
                    <div class="fv-plugins-message-container invalid-feedback"></div></div>
                 </div>

                


                </div>
                <!--begin::Input group-->
             
                <div class="row">
                    <div class="mb-7">
                        <label class="fs-6 fw-semibold mb-3">
                            <span>{{__('cms.image')}}</span>
                            
                            <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" aria-label="Allowed file types: png, jpg, jpeg." data-bs-original-title="Allowed file types: png, jpg, jpeg." data-kt-initialized="1"></i>
                        </label>
                 
                        <div class="card card-flush py-4">
                         
                            <div class="card-body  pt-0">
                            
                                {{-- <style>.image-input-placeholder { background-image: url('assets/media/svg/files/blank-image.svg'); } [data-theme="dark"] .image-input-placeholder { background-image: url('assets/media/svg/files/blank-image-dark.svg'); }</style> --}}
                                <!--end::Image input placeholder-->
                                {{-- <div class="image-input image-input-empty image-input-outline image-input-placeholder mb-3" data-kt-image-input="true">
                                    <div class="image-input-wrapper w-150px h-150px"></div> --}}
                                 
                                    
                                        <input type="file" id="image" accept=".png, .jpg, .jpeg" multiple>
                                        <input type="hidden" name="avatar_remove">
                       
                                <div class="text-muted fs-7">Set the product image. Only *.png, *.jpg and *.jpeg image files are accepted</div>
                                        {{-- </div> --}}
                             </div>
                        <!--end::Image input wrapper-->
                    </div>
                 </div>

             <div class="">
                <!--begin::Switch-->
                <label class="form-check form-switch form-switch-sm form-check-custom form-check-solid">
                    <!--begin::Input-->
                    <input class="form-check-input" id="active" type="checkbox" 
                    @if($sModel->active) checked @endif >

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
                    <button type="button" onclick="performUpdate('{{$sModel->id}}')"  class="btn btn-primary">
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
    function performUpdate(id) {
  
  var formData = new FormData();
        formData.append('category_id', document.getElementById('category_id').value);
        formData.append('brand_id', document.getElementById('brand_id').value);
        formData.append('name', document.getElementById('name').value);
        formData.append('active', document.getElementById('active').checked ? 1:0);
           formData.append('image_1',document.getElementById('image').files[0]);
           formData.append('image_2', document.getElementById('image').files[1]);
           formData.append('image_3', document.getElementById('image').files[2]);
          formData.append('image_4', document.getElementById('image').files[3]);
          formData.append('image_5', document.getElementById('image').files[4]);
    

      formData.append('_method','PUT');

      axios.post(`/cms/smodels/${id}`, formData)
      .then(function (response) {
          console.log(response);
          toastr.success(response.data.message);
          window.location.href = '/cms/smodels';
      })
      .catch(function (error) {
          console.log(error.response);
          toastr.error(error.response.data.message);
      });
 }
</script> 

@endsection