@extends('cms.parent')
@section('title',__('cms.repair_problems'))
@section('page-lg',__('cms.home'))
@section('main-pg-md',__('cms.repair_problem_management'))
@section('page-md',__('cms.create_or_update_repair_problem'))
@section('styles')

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
                        <path
                            d="M20 14H18V10H20C20.6 10 21 10.4 21 11V13C21 13.6 20.6 14 20 14ZM21 19V17C21 16.4 20.6 16 20 16H18V20H20C20.6 20 21 19.6 21 19ZM21 7V5C21 4.4 20.6 4 20 4H18V8H20C20.6 8 21 7.6 21 7Z"
                            fill="currentColor"></path>
                        <path opacity="0.3"
                            d="M17 22H3C2.4 22 2 21.6 2 21V3C2 2.4 2.4 2 3 2H17C17.6 2 18 2.4 18 3V21C18 21.6 17.6 22 17 22ZM10 7C8.9 7 8 7.9 8 9C8 10.1 8.9 11 10 11C11.1 11 12 10.1 12 9C12 7.9 11.1 7 10 7ZM13.3 16C14 16 14.5 15.3 14.3 14.7C13.7 13.2 12 12 10.1 12C8.10001 12 6.49999 13.1 5.89999 14.7C5.59999 15.3 6.19999 16 7.39999 16H13.3Z"
                            fill="currentColor"></path>
                    </svg>
                </span>
                <!--end::Svg Icon-->
                <h2>{{__('cms.create_or_update_repair_problem')}}</h2>
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
                <!--begin::Input group-->

                <!--end::Input group-->
                <div class="row">

                    <div class="row mb-6">
                        <div class="fv-row mb-7 fv-plugins-icon-container">
                            <!--begin::Label-->
                            <label class="fs-6 fw-semibold form-label mt-3">
                                <span class="required">{{__('cms.details')}}</span>
                                <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip"
                                    aria-label="Enter the details." data-bs-original-title="Enter the details."
                                    data-kt-initialized="1"></i>
                            </label>
                            <!--end::Label-->
                            <!--begin::Input-->

                            <textarea name="details" class="form-control form-control-solid" id="details"
                                value="{{  $repairProblem->details ??'' }}">{{ $repair_problem->details ??'' }}</textarea>



                            <div class="fv-plugins-message-container invalid-feedback"></div>
                        </div>
                    </div>




                </div>

                <!--begin::Input group-->
                <div class="row mb-6">
                    <!--begin::Label-->
                    <label class="col-lg-4 col-form-label required fw-semibold fs-6">
                        <span class="required">{{__('cms.status')}}</span>
                        <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip"
                            aria-label="Enter the stutus." data-bs-original-title="Enter the stutus."
                            data-kt-initialized="1"></i>
                    </label>
                    <!--end::Label-->
                    <!--begin::Input-->

                    <div class="row">


                        @foreach ($statuss as $status)

                        <div class="form-check form-check-inline">

                            <input
                            class="form-check-input"   type="radio"   name="app_status"  id="app_status"
                             value="{{ $status->id}}"
                                onchange=" @if ($status->has_repair == 1 )
                                    repair_spare_part()" >
                            @endif


                            <label class="form-check-label" for="inlineRadio1"

                                @if($repair_problem!=null)
                                 @selected($repair_problem->problem_status_id==$status->id )
                                @endif>
                                @if (app()->isLocale('ar')) {{$status->name_ar}}
                                @else{{$status->name_en}}
                                @endif
                            </label>

                        </div><br>
                        @endforeach




                        {{-- <div class="col-6">
                            <select class="form-select form-select-solid form-select-lg" data-control="select2"
                                name="app_status" id="app_status" data-select2-id="select2-data-10-uyhn">

                                <option selected disabled data-select2-id="select2-data-12-0cmm">{{__('cms.choose')}}
                                </option>
                                @foreach ($statuss as $status)
                                <option value="{{ $status->id}}" @if($repair_problem!=null) @selected($repair_problem->
                                    problem_status_id==$status->id )
                                    @endif >
                                    @if (app()->isLocale('ar')) {{$status->name_ar}}
                                    @else{{$status->name_en}}
                                    @endif
                                </option>

                                @endforeach

                            </select>
                            <!--end::Input-->


                            <!--end::Input-->
                            <div class="fv-plugins-message-container invalid-feedback"></div>
                            <!--end::Hint-->
                        </div> --}}
                    </div>




                    <div class="d-flex flex-column flex-column-fluid">
                        <!--begin::Toolbar-->
                        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
                        </div>
                        <!--end::Toolbar-->
                        <!--begin::Content-->
                        <div id="kt_app_content" class="app-content flex-column-fluid">
                            <!--begin::Content container-->
                            <div id="kt_app_content_container" class="app-container container-xxl">
                                <!--begin::Card-->
                                <div class="card" id="box" style="display: none">


                                    <!--begin::Card body-->
                                    <div class="card-body py-4">
                                        <!--begin::Table-->
                                        <div id="kt_table_users_wrapper"
                                            class="dataTables_wrapper dt-bootstrap4 no-footer">
                                            <div class="table-responsive">
                                                <table
                                                    class="table align-middle table-row-dashed fs-6 gy-5 dataTable no-footer"
                                                    id="kt_table_users">
                                                    <!--begin::Table head-->
                                                    <thead>
                                                        <!--begin::Table row-->
                                                        <tr
                                                            class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
                                                            <th>#</th>
                                                            <th tabindex="0" aria-controls="kt_table_users" rowspan="1"
                                                                colspan="1"
                                                                aria-label="User: activate to sort column ascending">
                                                                {{__('cms.spare_part')}}</th>

                                                            <th tabindex="0" aria-controls="kt_table_users" rowspan="1"
                                                                colspan="1"
                                                                aria-label="Two-step: activate to sort column ascending"
                                                                style="width: 125px;">{{__('cms.used')}}</th>

                                                            <!--end::Table row-->
                                                    </thead>
                                                    <!--end::Table head-->
                                                    <!--begin::Table body-->
                                                    <tbody class="text-gray-600 fw-semibold">
                                                        @foreach ($spareParts as $spare_part)


                                                        <tr class="odd">

                                                            <!--begin::Checkbox-->
                                                            <td>{{$loop->index+1}}</td>
                                                            <td>{{$spare_part->name ?? '' }}</td>

                                                            <!--end::Checkbox-->
                                                            <!--begin::User=-->
                                                            <td>
                                                                <div class="form-group clearfix align-middle">
                                                                    <div class="icheck-success d-inline">
                                                                        <input class="form-check-input " type="checkbox"
                                                                            onclick="StoreSparePart('{{$spare_part->id}}')"
                                                                            id="spare_part_{{$spare_part->id}}"
                                                                            @checked($spare_part->assigned==true) >
                                                                        <label class="form-check-label ms-3"
                                                                            for="spare_part_{{$spare_part->id}}"></label>
                                                                    </div>
                                                                </div>
                                                            </td>

                                                            <!--end::Two step=-->
                                                            <!--begin::Joined-->
                                                        </tr>


                                                        @endforeach

                                                    </tbody>
                                                    <!--end::Table body-->
                                                </table>
                                            </div>

                                        </div>
                                        <!--end::Table-->
                                    </div>
                                    <!--end::Card body-->
                                </div>
                                <!--end::Card-->
                            </div>
                            <!--end::Content container-->
                        </div>
                        <!--end::Content-->
                    </div>

                    <div class="fv-plugins-message-container invalid-feedback"></div>
                    <!--end::Hint-->
                </div>

                <div class="row mb-6">

                    <!--end::Separator-->
                    <!--begin::Action buttons-->
                    <div class="d-flex justify-content-end">
                        <!--begin::Button-->
                        <!--end::Button-->
                        <!--begin::Button-->
                        <button type="button" onclick="performStore('{{ $problem->id }}')" class="btn btn-primary"
                            data-kt-users-modal-action="submit">
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



<script>
    function repair_spare_part(event) {
        $('#box').show();

}

</script>
<script>


    function performStore(id) {
    axios.post('/cms/repair_problems', {
        app_status: document.getElementById('app_status').value,
        problem_id:id,
        spare_part_id:id,
        details: document.getElementById('details').value,
        repair_id:{{ $repair->id}},

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

<script>
      function StoreSparePart(id) {

axios.post('/cms/repair_spare_part', {
 spare_part_id:id,
 repair_id:{{ $repair->id}},

})
.then(function (response) {
    console.log(response);
    toastr.success(response.data.message);
})
.catch(function (error) {
    console.log(error.response);
    toastr.error(error.response.data.message);
});}
</script>

@endsection
