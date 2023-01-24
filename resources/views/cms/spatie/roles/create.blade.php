@extends('cms.parent')
@section('title',__('cms.roles'))
@section('page-lg',__('cms.home'))
@section('main-pg-md',__('cms.role_Management'))
@section('page-md',__('cms.create_role'))
@section('styles')
	<!--begin::Vendor Stylesheets(used for this page only)-->
    <link href="{{ asset('cms/assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />
    <!--end::Vendor Stylesheets-->
@endsection
@section('Content')
	<!--begin::Basic info-->
    <div class="card mb-5 mb-xl-10">
        <!--begin::Card header-->
        <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_profile_details" aria-expanded="true" aria-controls="kt_account_profile_details">
            <!--begin::Card title-->
            <div class="card-title m-0">
                <h3 class="fw-bold m-0">{{__('cms.create_role')}}</h3>
            </div>
            <!--end::Card title-->
        </div>
        <!--begin::Card header-->
        <!--begin::Content-->
        <div id="kt_account_settings_profile_details" class="collapse show">
            <!--begin::Form-->
            <form id="kt_account_profile_details_form create-form" class="form">
                    @csrf
                <!--begin::Card body-->
                <div class="card-body border-top p-9">


                    <!--begin::Input group-->
                    <div class="row mb-6">
                        <!--begin::Label-->
                        <label class="col-lg-4 col-form-label required fw-semibold fs-6">{{__('cms.name')}}</label>
                        <!--end::Label-->
                        <!--begin::Col-->
                        <div class="col-lg-8 fv-row">
                            <input  id="name" type="text" name="username" class="form-control form-control-lg form-control-solid" placeholder="{{__('cms.username')}}" value="Keenthemes" />
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Input group-->



                    <!--begin::Input group-->
                    <div class="row mb-6">
                        <!--begin::Label-->
                        <label  for="name" class="col-lg-4 col-form-label required fw-semibold fs-6">"{{__('cms.guard_name')}}" </label>
                        <!--end::Label-->
                        <!--begin::Col-->
                        <div class="col-lg-8 fv-row">
                            <!--begin::Input-->
                            <select id="guard_name"
                             name="language" aria-label="{{__('cms.select-guard')}}" data-control="select2" data-placeholder="{{__('cms.select-guard')}}" class="form-select form-select-solid form-select-lg">
                                <option value="">"{{__('cms.guard_name')}}" </option>
                                <option data-kt-flag="flags/indonesia.svg" value="admin">{{__('cms.admin')}}</option>
                                <option data-kt-flag="flags/malaysia.svg" value="user">{{__('cms.user')}}</option>
                                {{-- <option data-kt-flag="flags/indonesia.svg" value="client">{{__('cms.client')}}</option>
                                <option data-kt-flag="flags/malaysia.svg" value="technical">{{__('cms.technical')}}</option> --}}


                            </select>
                            <!--end::Input-->
                            <!--begin::Hint-->
                            <div class="form-text">"{{__('cms.select-guard')}}"</div>
                            <!--end::Hint-->
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Input group-->
		<!--begin::Actions-->
        <div class="card-footer d-flex justify-content-end py-6 px-9">
            <button type="button" onclick="performStore()"
            class="btn btn-primary">"{{__('cms.save')}}" </button>

        </div>
        <!--end::Actions-->
            </form>
            <!--end::Form-->
        </div>
        <!--end::Content-->
    </div>
    <!--end::Basic info-->

@endsection

@section('scripts')
<script>
    function performStore() {
        axios.post('/cms/roles', {
            name: document.getElementById('name').value,
            guard_name: document.getElementById('guard_name').value,
        })
        .then(function (response) {
            console.log(response);
            toastr.success(response.data.message);
            document.getElementById('create-form').reset();
        })
        .catch(function (error) {
            console.log(error.response);
            toastr.error(error.response.data.message);
        });
    }
</script>




		<!--begin::Vendors Javascript(used for this page only)-->
		<script src="{{ asset('cms/assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
		<!--end::Vendors Javascript-->
		<!--begin::Custom Javascript(used for this page only)-->
		<script src="{{ asset('cms/assets/js/custom/account/settings/signin-methods.js') }}"></script>
		<script src="{{ asset('cms/assets/js/custom/account/settings/profile-details.js') }}"></script>
		<script src="{{ asset('cms/assets/js/custom/account/settings/deactivate-account.js') }}"></script>
		<script src="{{ asset('cms/assets/js/custom/pages/user-profile/general.js') }}"></script>
		<script src="{{ asset('cms/assets/js/widgets.bundle.js') }}"></script>
		<script src="{{ asset('cms/assets/js/custom/widgets.js') }}"></script>
		<script src="{{ asset('cms/assets/js/custom/apps/chat/chat.js') }}"></script>
		<script src="{{ asset('cms/assets/js/custom/utilities/modals/upgrade-plan.js') }}"></script>
		<script src="{{ asset('cms/assets/js/custom/utilities/modals/create-app.js') }}"></script>
		<script src="{{ asset('cms/assets/js/custom/utilities/modals/offer-a-deal/type.js') }}"></script>
		<script src="{{ asset('cms/assets/js/custom/utilities/modals/offer-a-deal/details.js') }}"></script>
		<script src="{{ asset('cms/assets/js/custom/utilities/modals/offer-a-deal/finance.js') }}"></script>
		<script src="{{ asset('cms/assets/js/custom/utilities/modals/offer-a-deal/complete.js') }}"></script>
		<script src="{{ asset('cms/assets/js/custom/utilities/modals/offer-a-deal/main.js') }}"></script>
		<script src="{{ asset('cms/assets/js/custom/utilities/modals/two-factor-authentication.js') }}"></script>
		<script src="{{ asset('cms/assets/js/custom/utilities/modals/users-search.js') }}"></script>
		<!--end::Custom Javascript-->
		<!--end::Javascript-->
@endsection
