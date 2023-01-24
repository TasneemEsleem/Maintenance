@extends('cms.parent');
@section('title',__('cms.categories'))
@section('page-lg',__('cms.home'))
@section('main-pg-md',__('cms.categories_Management'))
@section('page-md',__('cms.categories_list'))
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
                <div class="card-toolbar flex-row-fluid justify-content-end gap-5">
                
                    <!--begin::Add product-->
                    <a href="{{route('categories.create' )}}" class="btn btn-primary">{{__('cms.create_category')}}</a>
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

                            <th class=" min-w-70px sorting" tabindex="0" aria-controls="kt_ecommerce_products_table" rowspan="1" colspan="1" aria-label="Product: activate to sort column ascending" style="width: 206.828px;">{{__('cms.over_view')}}</th>
                            <th class=" min-w-70px sorting" tabindex="0" aria-controls="kt_ecommerce_products_table" rowspan="1" colspan="1" aria-label="Qty: activate to sort column ascending" style="width: 93.1875px;">{{__('cms.value')}}</th>
                            <th class=" min-w-70px sorting" tabindex="0" aria-controls="kt_ecommerce_products_table" rowspan="1" colspan="1" aria-label="SKU: activate to sort column ascending" style="width: 103.562px;">{{__('cms.unit')}}</th>
                            <th class=" min-w-100px sorting" tabindex="0" aria-controls="kt_ecommerce_products_table" rowspan="1" colspan="1" aria-label="SKU: activate to sort column ascending" style="width: 103.562px;">{{__('cms.JOINED_DATE')}}</th>



                        <!--end::Table row-->
                    </thead>
                    <!--end::Table head-->
                    <!--begin::Table body-->
                    <tbody class="fw-semibold text-gray-600">


                    <tr class="odd">

                            <!--begin::Checkbox-->

                            <!--end::Checkbox-->
                            <!--begin::Category=-->
               
                            <!--end::Category=-->
                            <!--begin::SKU=-->
                            <td class=" pe-0">
                                <span class="fw-bold">{{$sparepart->Over_View}}</span>
                            </td>
                            <td class=" pe-0">
                                <span class="fw-bold">{{$sparepart->value}}</span>
                            </td>
                            <td class="pe-0">
                                <span class="fw-bold">{{$sparepart->unit}}</span>
                            </td>
                            <td class="pe-0">
                                <span class="fw-bold">{{$sparepart->created_at}}</span>
                            </td>
                            <!--end::SKU=-->
                            <!--begin::Qty=-->
                           
                        
                            <!--end::Action=-->
                        </tr>
                     </tbody>
                    <!--end::Table body-->
                </table>
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start">
                </div>

            </div>
        </div>
    </div>
                <!--end::Table-->
            </div>
            <!--end::Card body-->
        </div>
        <!--end::Products-->
    </div>
    <!--end::Content container-->
</div>
@endsection
@section('scripts')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>



@endsection

