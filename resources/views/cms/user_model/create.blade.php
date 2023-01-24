@extends('cms.parent');
@section('title',__('cms.models'))
@section('page-lg',__('cms.home'))
@section('main-pg-md',__('cms.models_Management'))
@section('page-md',__('cms.create_model'))
@section('styles')
<link href="{{asset('cms/assets/plugins/custom/datatables/datatables.bundle.css')}}" rel="stylesheet" type="text/css" />
<!--end::Vendor Stylesheets-->

@endsection

@section('Content')
<!--begin::Card-->
<div class="card">

    <!--begin::Card body-->
    <div class="card-body py-4">
        <!--begin::Table-->
        <div id="kt_table_users_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                <form id="create-form" class="form fv-plugins-bootstrap5 fv-plugins-framework" >
                    @csrf
                    <div class="row">
                        <div class="col-6">
                            <div class="fv-row w-100 flex-md-root fv-plugins-icon-container" data-select2-id="select2-data-131-74d4">
                                <!--begin::Label-->
                                <label class="required form-label">{{__('cms.brands')}}</label>

                                <select class="form-select mb-2 " name="tax" id="brand_id" >
                                    @foreach ($brands as $brand)
                                    <option value="{{$brand->id}}">{{$brand->name}}</option>
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
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>

                                <!--end::Select2-->
                                <!--begin::Description-->
                                <!--end::Description-->
                            <div class="fv-plugins-message-container invalid-feedback"></div>
                            </div>

                        </div>


                        {{-- <div class="col-6">
                            <div class="fv-row w-100 flex-md-root fv-plugins-icon-container" data-select2-id="select2-data-131-74d4">
                                <!--begin::Label-->
                                <label class="required form-label">{{__('cms.models')}}</label>

                                <select class="form-select mb-2 " name="model_id[]" data-size="7" multiple data-live-search="true" id ='model_id' >

                                </select>

                                <!--end::Select2-->
                                <!--begin::Description-->
                                <!--end::Description-->
                            <div class="fv-plugins-message-container invalid-feedback"></div>
                            </div>

                        </div> --}}

                        <label class="form-label">{{__('cms.models')}}</label>

                        <select  class="form-select mb-2" name="model_id[]" id ='model_id' data-control="select2" data-placeholder="Select an option" data-allow-clear="true" multiple="multiple">
                            <option></option>

                        </select>

                    </div>







                    <!--begin::Input group-->

                    <!--end::Input group-->

                    <!--begin::Input group-->



                    <!--end::Separator-->
                    <!--begin::Action buttons-->
                    <div class="d-flex justify-content-end">
                        <!--begin::Button-->
                        <!--end::Button-->
                        <!--begin::Button-->
                        <button type="button" onclick="performStore()" class="btn btn-primary">
                            <span class="indicator-label">{{__('cms.save')}}</span>
                            <span class="indicator-progress">Please wait...
                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                        </button>
                        <!--end::Button-->
                    </div>
                    <!--end::Action buttons-->
                </form>
                {{-- <table class="table align-middle table-row-dashed fs-6 gy-5 dataTable no-footer" id="kt_table_users">
                    <!--begin::Table head-->
                    <thead>
                        <!--begin::Table row-->
                        <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">

                            <th class="min-w-125px sorting" tabindex="0" aria-controls="kt_table_users" rowspan="1" colspan="1" aria-label="User: activate to sort column ascending" style="width: 206.375px;">{{__('cms.models')}}</th>



                            <th class="min-w-125px sorting" tabindex="0" aria-controls="kt_table_users" rowspan="1" colspan="1" aria-label="Joined Date: activate to sort column ascending" style="width: 142.234px;">{{__('cms.status')}}</th>


                        </tr>
                        <!--end::Table row-->
                    </thead>
                    <!--end::Table head-->
                    <!--begin::Table body-->
                    <tbody class="text-gray-600 fw-semibold">

                        @foreach ($models as $productmodel)
                        <tr>
                            <td>{{$productmodel->name}}</td>
                            <td>
                                <div class="form-group clearfix align-middle">
                                    <div class="icheck-success d-inline">
                                        <input class="form-check-input " type="checkbox" onclick="performUpdate('{{$productmodel->id}}')" id="models-{{$productmodel->id}}" @checked($productmodel->granted)

                                        >
                                        <label class="form-check-label ms-3" for="productmodel_{{$productmodel->id}}"></label>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                    <!--end::Table body-->
                </table> --}}
        </div>
        <!--end::Table-->
    </div>
    <!--end::Card body-->
</div>
<!--end::Card-->
@endsection
@section('scripts')

<script>
    $(function() {
        bsCustomFileInput.init()
    });
</script>
{{-- <script>
    function performUpdate(id) {
        axios.put('/cms/UserModel/store', {
                product_models_id: id,
            })
            .then(function(response) {
                console.log(response);
                toastr.success(response.data.message);
            })
            .catch(function(error) {
                console.log(error.response);
                toastr.error(error.response.data.message);
            });
    }
</script> --}}




<script>



$('#category_id, #brand_id ').on('change',function(){
    var selectedSubject = $("#brand_id option:selected").val();
        getmodels(this.value,selectedSubject);
    });
    function getmodels(categoryId,branId){
        axios.get(`/cms/UserModel/category/${categoryId}/brand/${branId}`)
       .then(function (response) {
           console.log(response);
           console.log(response.data.data);

           $('#model_id').empty();
           $.each(response.data.data , function(i , item){
            console.log('Id: '+item['id']);
            $('#model_id').append(new Option(item['name'],item['id']));
           });

       })
       .catch(function (error) {

       });

    }

    function performStore() {




        axios.post('/cms/UserModel/store',{
            model_id:Array.from(document.querySelectorAll('#model_id option:checked')).map(el => el.value)

        })
        .then(function (response) {
            console.log(response);
            toastr.success(response.data.message);
            document.getElementById('create-form').reset();
        })
        .catch(function (error) {
            console.log(error.response);
            toastr.error(error.response.data.message);
        });}
 </script>
<!--begin::Vendors Javascript(used for this page only)-->
<script src="{{asset('cms/assets/plugins/custom/datatables/datatables.bundle.js')}}"></script>
<script src="{{asset('cms/assets/plugins/custom/formrepeater/formrepeater.bundle.js')}}"></script>
<!--end::Vendors Javascript-->
<!--begin::Custom Javascript(used for this page only)-->
<script src="{{asset('cms/assets/js/custom/apps/ecommerce/catalog/save-product.js')}}"></script>
<script src="{{asset('cms/assets/js/widgets.bundle.js')}}"></script>
<script src="{{asset('cms/assets/js/custom/widgets.js')}}"></script>
<script src="{{asset('cms/assets/js/custom/apps/chat/chat.js')}}"></script>
<script src="{{asset('cms/assets/js/custom/utilities/modals/upgrade-plan.js')}}"></script>
<script src="{{asset('cms/assets/js/custom/utilities/modals/create-app.js')}}"></script>
<script src="{{asset('cms/assets/js/custom/utilities/modals/users-search.js')}}"></script>

@endsection
