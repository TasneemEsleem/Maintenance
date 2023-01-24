@extends('cms.parent')
@section('title',__('cms.users'))
@section('page-lg',__('cms.home'))
@section('main-pg-md',__('cms.User_Management'))
@section('page-md',__('cms.user_create'))
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
                <h2>{{__('cms.create_user')}}</h2>
            </div>
            <!--end::Card title-->
        </div>
        <!--end::Card header-->
        <!--begin::Card body-->
        <div class="card-body pt-5">
            <!--begin::Form-->
            <form id="create-form" class="form fv-plugins-bootstrap5 fv-plugins-framework">
                @csrf
                <!--begin::Input group-->
                <div class="mb-7">
                    <!--begin::Label-->
                    <label class="fs-6 fw-semibold mb-3">
                        <span>{{__('cms.Create_avatar')}}</span>
                        <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" aria-label="Allowed file types: png, jpg, jpeg." data-bs-original-title="Allowed file types: png, jpg, jpeg." data-kt-initialized="1"></i>
                    </label>
                    <!--end::Label-->
                    <!--begin::Image input wrapper-->
                    <div class="mt-1">
                        <!--begin::Image placeholder-->
                        <style>
                            .image-input-placeholder {
                                background-image: url('assets/media/svg/files/blank-image.svg');
                            }

                            [data-theme="dark"] .image-input-placeholder {
                                background-image: url('assets/media/svg/files/blank-image-dark.svg');
                            }
                        </style>
                        <!--end::Image placeholder-->
                        <!--begin::Image input-->
                        <div class="image-input image-input-outline image-input-placeholder image-input-empty" data-kt-image-input="true">
                            <!--begin::Preview existing avatar-->
                            <div class="image-input-wrapper w-100px h-100px" style="background-image: url('assets/media//avatars/300-6.jpg')"></div>
                            <!--end::Preview existing avatar-->
                            <!--begin::Edit-->
                            <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" aria-label="Change avatar" data-bs-original-title="Change avatar" data-kt-initialized="1">
                                <i class="bi bi-pencil-fill fs-7"></i>
                                <!--begin::Inputs-->
                                <input type="file" id="user_image" accept=".png, .jpg, .jpeg">
                                <input type="hidden" name="avatar_remove">
                                <!--end::Inputs-->
                            </label>
                            <!--end::Edit-->
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
                    </div>
                    <!--end::Image input wrapper-->
                </div>
                <!--end::Input group-->
                <!--begin::Input group-->
                <div class="row mb-6">
                    <!--begin::Label-->
                    <label class="col-lg-2 col-form-label fw-semibold fs-6">
                        <span class="required">{{__('cms.name')}}</span>
                        <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" aria-label="Enter the contact's name." data-bs-original-title="Enter the contact's name." data-kt-initialized="1"></i>
                    </label>
                    <div class="col-lg-8 fv-row">
                        <!--end::Label-->
                        <!--begin::Input-->
                        <input type="text" class="form-control form-control-solid" id="name">
                        <!--end::Input-->
                        <div class="fv-plugins-message-container invalid-feedback"></div>
                    </div>
                </div>
                <div class="row mb-6">
                    <!--begin::Label-->
                    <label class="col-lg-2 col-form-label fw-semibold fs-6">
                        <span class="required">{{__('cms.email')}}
                        </span>
                        <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" aria-label="Enter the contact's email." data-kt-initialized="1"></i>
                    </label>
                    <div class="col-lg-8 fv-row">

                        <!--end::Label-->
                        <!--begin::Input-->
                        <input type="email" class="form-control form-control-solid" id="email">
                        <!--end::Input-->
                        <div class="fv-plugins-message-container invalid-feedback"></div>
                    </div>
                </div>
                <div class="row mb-6">
                    <!--begin::Label-->
                    <label class="col-lg-2 col-form-label fw-semibold fs-6">
                        <span class="required">{{__('cms.user_type')}}</span>
                        <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" aria-label="Enter the contact's name." data-bs-original-title="Enter the contact's name." data-kt-initialized="1"></i>
                    </label>
                    <!--end::Label-->
                    <!--begin::Input-->
                    <div class="col-lg-8 fv-row">
                        <select class="form-select form-select-solid form-select-lg" data-control="select2" name="user_type" id="user_type" data-select2-id="select2-data-10-uyhn">
                            <option value="" data-select2-id="select2-data-12-0cmm">{{__('cms.choose')}}</option>
                            <option value="agent"> {{__('cms.agent')}} </option>
                            <option value="technical"> {{__('cms.technical')}}</option>
                            <option value="customers"> {{__('cms.customers')}}</option>
                          
                        </select>
                        <!--end::Input-->
                        <div class="fv-plugins-message-container invalid-feedback"></div>
                        <!--end::Hint-->
                    </div>

                    
                </div>










                <div class="row mb-6">
                    <!--begin::Label-->
                    <label class="col-lg-2 col-form-label fw-semibold fs-6">
                        <span class="required">{{__('cms.roles')}}</span>
                        <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" aria-label="Enter the contact's name." data-bs-original-title="Enter the contact's name." data-kt-initialized="1"></i>
                    </label>
                    <!--end::Label-->
                    <div class="col-lg-8 fv-row">
                        <!--begin::Input-->

                        <select class="form-select form-select-solid form-select-lg" data-control="select2"  
                        id="user_role" name="role_id" aria-label={{__('cms.role')}} data-control="select2" data-placeholder={{__('cms.roles')}}class="form-select form-select-solid form-select-lg">
                           <option value="">{{__('cms.roles')}} </option>
                           @foreach ($roles as $role)
                           <option value="{{ $role->id }}">{{$role->name}}</option>
                           @endforeach
    
                
                       </select>




                  
               
                        <div class="form-text">"{{__('cms.select-guard')}}"</div>
                    </div> 

                    
                </div>

















   
                <div class="row mb-6">
                    <!--begin::Label-->
                    <label class="col-lg-2 col-form-label  fw-semibold fs-6">
                        <span class="required">{{__('cms.country')}}</span>
                        <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" data-kt-initialized="1"></i>
                    </label>

                    <div class="col-lg-8 fv-row">
                        <select class="form-select form-select-solid form-select-lg" data-control="select2" id="country_id" data-select2-id="select2-data-10-uyhn">
                            <option value="-1" data-select2-id="select2-data-12-0cmm">{{__('cms.choose')}}</option>
                            @foreach($countries as $country)
                            <option value="{{$country->id}}">
                                @if (app()->getLocale()=='ar')
                                {{$country->name_ar}}
                                @else
                                {{$country->name_en}}
                                @endif
                            </option>
                            @endforeach
                        </select>
                        <!--end::Input-->
                        <div class="fv-plugins-message-container invalid-feedback"></div>
                        <!--end::Hint-->
                    </div>
                </div>
                <div class="row mb-6">
                    <!--begin::Label-->
                    <label class="col-lg-2 col-form-label  fw-semibold fs-6">
                        <span class="required">{{__('cms.city')}}</span>
                        <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" data-kt-initialized="1"></i>
                    </label>

                    <div class="col-lg-8 fv-row">
                        <select class="form-select form-select-solid form-select-lg" data-control="select2" id="city_id" data-select2-id="select2-data-10-uyhn" disabled>
                            <option value="-1" selected>Select Country</option>

                        </select>
                        <!--end::Input-->
                        <div class="fv-plugins-message-container invalid-feedback"></div>
                        <!--end::Hint-->
                    </div>
                </div>
                <div class="row mb-6">
                    <!--begin::Label-->
                    <label class="col-lg-2 col-form-label fw-semibold fs-6">
                        <span class="required">{{__('cms.region')}}
                        </span>
                        <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" aria-label="Enter the contact's email." data-kt-initialized="1"></i>
                    </label>
                    <div class="col-lg-8 fv-row">

                        <!--end::Label-->
                        <!--begin::Input-->
                        <input type="text" class="form-control form-control-solid" id="region">
                        <!--end::Input-->
                        <div class="fv-plugins-message-container invalid-feedback"></div>
                    </div>
                </div>
                <!--end::Separator-->
                <!--begin::Action buttons-->
                <div class="d-flex justify-content-end">
                    <!--begin::Button-->
                    <!--end::Button-->
                    <!--begin::Button-->
                    <button type="button" onclick="performStore()" class="btn btn-primary" data-kt-users-modal-action="submit">
                        <span class="indicator-label">{{__('cms.Save')}}</span>
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
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
    $(function() {
        bsCustomFileInput.init()
    });
</script>
<script type="text/javascript">
    $('#country_id').on('change', function() {
        if (this.value == -1) {
            $('#city_id').empty();
            $("#city_id").append('<option value=-1>Select Country</option>');
            $('#city_id').attr('disabled', true);
        } else {
            getCity(this.value);

        }
    });

    function getCity(country_id) {

        var locale = document.getElementsByTagName("html")[0].getAttribute("lang");

        axios.get('/country/' + country_id)
            .then(function(response) {
                console.log(response);
                console.log(response.data.cities);
                $('#city_id').empty();
                if (response.data.cities.length > 0) {
                    $.each(response.data.cities, function(i, item) {
                        console.log('Id: ' + item['id']);
                        if (locale == 'ar') {
                            $('#city_id').append(new Option(item['name_ar'], item['id']));
                        } else {
                            $('#city_id').append(new Option(item['name_en'], item['id']));
                        }
                        $('#city_id').attr('disabled', false);
                    });
                } else {
                    $('#city_id').empty();
                    $('#city_id').attr('disabled', true);
                }
            })
            .catch(function(error) {});
    }
</script>
<script>
    function performStore() {
        console.log(document.getElementById('user_role').value);
        var formData = new FormData();
        formData.append('user_role', document.getElementById('user_role').value);
        formData.append('name', document.getElementById('name').value);
        formData.append('email', document.getElementById('email').value);
        formData.append('image', document.getElementById('user_image').files[0]);
        formData.append('user_type', document.getElementById('user_type').value);
        formData.append('country_id', document.getElementById('country_id').value);
        formData.append('city_id', document.getElementById('city_id').value);
        formData.append('region', document.getElementById('region').value);

        axios.post('/cms/users', formData)
            .then(function(response) {
                console.log(response);
                toastr.success(response.data.message);
                document.getElementById('create-form').reset();
                window.location.href = '/cms/users';
            })
            .catch(function(error) {
                console.log(error.response);
                toastr.error(error.response.data.message);
            });
    }
</script>
@endsection