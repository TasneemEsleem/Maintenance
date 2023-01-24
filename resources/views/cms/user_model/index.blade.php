 @extends('cms.parent');
@section('title',__('cms.models'))
@section('page-lg',__('cms.home'))
@section('main-pg-md',__('cms.models_Management'))
@section('page-md',__('cms.models_list'))
@section('Content')
<div id="kt_app_content" class="app-content flex-column-fluid">
    <!--begin::Content container-->
    <div id="kt_app_content_container" class="app-container container-xxl">
        <!--begin::Products-->
        <div class="card card-flush">
            <!--begin::Card header-->
            <div class="card-header align-items-center py-5 gap-2 gap-md-5">
                <!--begin::Card title-->
                <div class="card-title">
                    <!--begin::Search-->

                    <!--end::Search-->
                </div>
                <!--end::Card title-->
                <!--begin::Card toolbar-->
                <div class="card-toolbar flex-row-fluid  gap-5">

                    <!--begin::Add product-->
                    {{-- <a onclick="performStore()"
                    class="btn btn-primary">{{__('cms.create_problem')}}  </a> --}}



                    <!--end::Add product-->
                </div>


                <div class="card-toolbar flex-row-fluid justify-content-end gap-5">
                    <button type="button" class="btn btn-primary"
                    data-bs-toggle="modal"
                     data-bs-target="#kt_modal_add_customer">{{__('cms.create_problem')}} </button>


                    <!--begin::Add product-->

                    <!--end::Add product-->
                </div>
                <!--end::Card toolbar-->
            </div>
            <!--end::Card header-->
            <!--begin::Card body-->
            <div class="card-body pt-0">
                <!--begin::Table-->
                <div id="kt_ecommerce_products_table_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer"><div class="table-responsive"><table class="table align-middle table-row-dashed fs-6 gy-5 dataTable no-footer" id="kt_ecommerce_products_table">
                    <!--begin::Table head-->
                    <thead>
                        <!--begin::Table row-->
                        <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                            <th class="min-w-125px sorting" tabindex="0" aria-controls="kt_table_users" rowspan="1" colspan="1" aria-label="User: activate to sort column ascending" style="width: 206.375px;"></th>

                            <th class="min-w-200px sorting" tabindex="0" aria-controls="kt_ecommerce_products_table" rowspan="1" colspan="1" aria-label="Product: activate to sort column ascending" style="width: 206.828px;">{{__('cms.product_model')}}</th>

                            <th class="text-end min-w-100px sorting" tabindex="0" aria-controls="kt_ecommerce_products_table" rowspan="1" colspan="1" aria-label="SKU: activate to sort column ascending" style="width: 103.562px;">{{__('cms.JOINED_DATE')}}</th>
                            <th class="text-end min-w-100px sorting" tabindex="0" aria-controls="kt_ecommerce_products_table" rowspan="1" colspan="1" aria-label="SKU: activate to sort column ascending" style="width: 103.562px;"></th>

                        <!--end::Table row-->
                    </thead>
                    <!--end::Table head-->
                    <!--begin::Table body-->
                    @foreach($user_models as $user_model)
                    <tbody class="fw-semibold text-gray-600">
                    <tr class="odd">
                        <td>
                            <div class="form-group clearfix align-middle">
                                <div class="icheck-success d-inline" id="model_id" >
                                    <input class="form-check-input "  type="checkbox"  id="model_{{$user_model->id}}"

                                    >
                                    <label class="form-check-label ms-3" for="model_{{$user_model->id}}"></label>
                                </div>
                            </div>
                        </td>
                            <td class="text-left pe-0">
                                <span class="fw-bold">{{$user_model->models->name}}</span>
                            </td>
                            <!--end::SKU=-->
                            <!--begin::Qty=-->
                            <td class="text-end pe-0" data-order="16">
                                <span class="fw-bold ms-3">{{$user_model->created_at}}</span>
                            </td>
                            <td class="text-end pe-0">
                            <!--end::Action=-->
                        </tr>
                     </tbody>
                     @endforeach
                    <!--end::Table body-->
                </table>
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start">
                </div>

            </div>
        </div>
        </div>
            </div>
        </div>
    </div>



    <!--begin::Modal - Customers - Add-->
    <div class="modal fade" id="kt_modal_add_customer" tabindex="-1" aria-hidden="true">
        <!--begin::Modal dialog-->
        <div class="modal-dialog modal-dialog-centered mw-650px">
            <!--begin::Modal content-->
            <div class="modal-content">
                <!--begin::Form-->
                <form class="form" action="#" id="kt_modal_add_customer_form" data-kt-redirect="../../demo1/dist/apps/customers/list.html">
                    <!--begin::Modal header-->
                    <div class="modal-header" id="kt_modal_add_customer_header">
                        <!--begin::Modal title-->
                        <h2 class="fw-bold">Add a Problem</h2>
                        <!--end::Modal title-->
                        <!--begin::Close-->
                        <div id="kt_modal_add_customer_close" class="btn btn-icon btn-sm btn-active-icon-primary">
                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                            <span class="svg-icon svg-icon-1">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor" />
                                    <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="currentColor" />
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                        </div>
                        <!--end::Close-->
                    </div>
                    <!--end::Modal header-->
                    <!--begin::Modal body-->
                    <div class="modal-body py-10 px-lg-17">
                        <!--begin::Scroll-->

                            <div class="fv-row mb-50">
                                <!--begin::Label-->
                                <label class="fs-6 fw-semibold mb-2">Description</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" class="form-control form-control-solid" placeholder="" id="description" />
                                <!--end::Input-->
                            </div>


                        <!--end::Scroll-->
                    </div>
                    <!--end::Modal body-->
                    <!--begin::Modal footer-->
                    <div class="modal-footer flex-center">
                        <!--begin::Button-->
                        <button type="reset" id="kt_modal_add_customer_cancel" class="btn btn-light me-3">Discard</button>
                        <!--end::Button-->
                        <!--begin::Button-->
                        <button type="button" onclick="performStore({{$user_models}})"  id="kt_modal_add_customer_submit" class="btn btn-primary">
                            <span class="indicator-label">Submit</span>
                            <span class="indicator-progress">Please wait...
                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                        </button>
                        <!--end::Button-->
                    </div>
                    <!--end::Modal footer-->
                </form>
                <!--end::Form-->
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(function() {
        bsCustomFileInput.init()
    });
</script>
<script>

function performStore(modelsArray) {

    var models=modelsArray;
    const checked=[];

    for (var i = 0; i < models.length; i++) {
        if(document.getElementById(`model_${models[i].id}`).checked){
        checked[i]=models[i].model_id;
        }

}

    let data={
        models:checked,
        description:document.getElementById('description').value
    }
      axios.post('/cms/problems', data)
    .then(function (response) {
        console.log(response);
        toastr.success(response.data.message);
        window.location.href = '/cms/problems';

    })
    .catch(function (error) {
        console.log(error.response);
        toastr.error(error.response.data.message);
    });
}
</script>
@endsection

