@extends('cms.parent');
@section('styles')
@section('Content')

<div class="d-flex align-items-center gap-2 gap-lg-3" data-select2-id="select2-data-124-66z3">
    <!--begin::Filter menu-->
    <div class="m-0">
        <!--begin::Menu toggle-->
        <a href="#" class="btn btn-sm btn-flex bg-body btn-color-gray-700 btn-active-color-primary fw-bold" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
            <!--begin::Svg Icon | path: icons/duotune/general/gen031.svg-->
            <span class="svg-icon svg-icon-6 svg-icon-muted me-1">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M19.0759 3H4.72777C3.95892 3 3.47768 3.83148 3.86067 4.49814L8.56967 12.6949C9.17923 13.7559 9.5 14.9582 9.5 16.1819V19.5072C9.5 20.2189 10.2223 20.7028 10.8805 20.432L13.8805 19.1977C14.2553 19.0435 14.5 18.6783 14.5 18.273V13.8372C14.5 12.8089 14.8171 11.8056 15.408 10.964L19.8943 4.57465C20.3596 3.912 19.8856 3 19.0759 3Z" fill="currentColor"></path>
                </svg>
            </span> Filter
        </a>

        <div class="menu menu-sub menu-sub-dropdown w-250px w-md-300px" data-kt-menu="true" id="kt_menu_633f0a570a592" style="">
            <!--begin::Header-->
            <div class="px-7 py-5">
                <div class="fs-5 text-dark fw-bold">Filter Options</div>
            </div>
            <!--end::Header-->
            <!--begin::Menu separator-->
            <div class="separator border-gray-200"></div>
            <!--end::Menu separator-->


            <div class="px-7 py-5">
                <!--begin::Input group-->
                <div class="mb-10" data-select2-id="select2-data-123-ns5n">
                <label class="col-lg-2 col-form-label  fw-bold fs-6">
                        <span>{{__('cms.brand')}}</span>
                    </label>

                    <div class="col-lg-8 fv-row">
                        <select class="form-select form-select-solid form-select-lg" data-control="select2" id="brand_id" data-select2-id="select2-data-10-uyhn">
                            <option value="-1" data-select2-id="select2-data-12-0cmm">{{__('cms.choose_brand')}}</option>
                            @foreach($brands as $brand)
                            <option value="{{$brand->id}}">
                                {{$brand->name}}
                            </option>
                            @endforeach
                        </select>                      
                    </div>
                </div>
            </div>
            <div class="px-7 py-5">
                <!--begin::Input group-->
                <div class="mb-10" data-select2-id="select2-data-123-ns5n">
                <label class="col-lg-2 col-form-label  fw-bold fs-6">
                        <span>{{__('cms.category')}}</span>
                    </label>

                    <div class="col-lg-8 fv-row">
                        <select class="form-select form-select-solid form-select-lg" data-control="select2" id="category_id" data-select2-id="select2-data-10-uyhn" disabled>
                            <option value="-1" selected>Select Category</option>

                        </select>
                        <!--end::Input-->
                        <div class="fv-plugins-message-container invalid-feedback"></div>
                        <!--end::Hint-->                      
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="separator border-gray-300"></div>

</div>
<div class="card">
<div class="separator border-gray-200"></div>

    <!--begin::Card body-->
    <div class="card-body py-4">
        <!--begin::Table-->
        <div id="kt_table_users_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
            <div class="table-responsive">
                <table class="table align-middle table-row-dashed fs-6 gy-5 dataTable no-footer" id="kt_table_users">
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
                                        <input class="form-check-input " type="checkbox" onclick="performUpdate('{{$productmodel->id}}')" id="models-{{$productmodel->id}}" @checked($productmodel->granted)>
                                        <label class="form-check-label ms-3" for="productmodel_{{$productmodel->id}}"></label>
                                    </div></div></td>
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

@endsection
@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
    $(function() {
        bsCustomFileInput.init()
    });
</script>
<script type="text/javascript">
    $('#brand_id').on('change', function() {
        if (this.value == -1) {
            $('#category_id').empty();
            $("#category_id").append('<option value=-1>Select Category</option>');
            $('#category_id').attr('disabled', true);
        } else {
            getCity(this.value);
        }
    });

    function getCity(brand_id) {
        axios.get('/brand/' + brand_id)
            .then(function(response) {
                console.log(response);
                console.log(response.data.categories);
                $('#category_id').empty();
                if (response.data.categories.length > 0) {
                    $.each(response.data.categories, function(i, item) {
                        console.log('Id: ' + item['id']);
                        $('#category_id').append(new Option(item['name'], item['id']));
                        $('#category_id').attr('disabled', false);
                    });
                } else {
                    $('#category_id').empty();
                    $('#category_id').attr('disabled', true);
                }
            })
            .catch(function(error) {});
    }
</script>

<script type="text/javascript">
    $('#category_id').on('change', function() {
        if (this.value == -1) {
            $('#model_id').empty();
            $('#model_id').attr('disabled', true);
        } else {
            getModel(this.value);
        }
    });
    function getCity(category_id) {
        axios.get('/category/' + category_id)
            .then(function(response) {
                console.log(response);
                console.log(response.data.categories);
                $('#model_id').empty();
                if (response.data.models.length > 0) {
                    $.each(response.data.models, function(i, item) {
                        console.log('Id: ' + item['id']);
                        $("#model_id").append(
        '<tr class="badge-light-success"><td>{{$models->name}}</td><td><div class="form-group clearfix align-middle"><div class="icheck-success d-inline"><input class="form-check-input " type="checkbox" onclick="performUpdate({{$models->id}})" id="models-{{$models->id}}" @checked($models->granted)>  <label class="form-check-label ms-3" for="models_{{$productmodel->id}}"></label></div></div></td>' +
        '</tr>');
         $('#model_id').attr('disabled', false);
}); } else {
            $('#model_id').empty();
            $('#model_id').attr('disabled', true);
}
            })
            .catch(function(error) {});
    }
</script>
@endsection