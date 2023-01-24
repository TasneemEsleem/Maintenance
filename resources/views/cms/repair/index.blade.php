@extends('cms.parent');
@section('title',__('cms.repair'))
@section('page-lg',__('cms.home'))
@section('repair-pg-md',__('cms.repair'))
@section('page-md',__('cms.repair_list'))
@section('Content')
<div id="kt_app_content" class="app-content flex-column-fluid">
    <!--begin::Content container-->
    <div id="kt_app_content_container" class="app-container container-xxl">
        <!--begin::Products-->
        <div class="card card-flush">
            <!--begin::Card header-->

            <!--end::Card header-->
            <!--begin::Card body-->
            <div class="card-body pt-0">
                <!--begin::Table-->
                <div id="kt_ecommerce_products_table_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                    <div class="table-responsive">
                        <table class="table align-middle table-row-dashed fs-6 gy-5 dataTable no-footer" id="kt_ecommerce_products_table">
                            <!--begin::Table head-->
                            <thead>
                                <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
                                    <th class="min-w-125px sorting fs-4" tabindex="0" aria-controls="kt_table_users" aria-label="Two-step: activate to sort column ascending">#</th>
                                    <th class="min-w-125px sorting fs-4" tabindex="0" aria-controls="kt_table_users" aria-label="Two-step: activate to sort column ascending">{{__('cms.username')}}</th>
                                    <th class="min-w-125px sorting fs-4" tabindex="0" aria-controls="kt_table_users" aria-label="Two-step: activate to sort column ascending">{{__('cms.problem_details')}}</th>
                                    <th class="min-w-125px sorting fs-4" tabindex="0" aria-controls="kt_table_users" aria-label="Joined Date: activate to sort column ascending">{{__('cms.add_technical')}}</th>
                                </tr>
                                <!--end::Table row-->
                            </thead>
                            <!--end::Table head-->
                            <!--begin::Table body-->
                            <tbody class="fw-semibold text-gray-600">
                                @foreach ($problem as $problems)
                                <tr class="odd">
                                    <td>{{$loop->index+1}}</td>
                                    <td> {{$problems->user->name}}</td>

                                    <td>{{ $problems->details ??'NULL' }}</td>

                                    <td>
                                        <div class="text-left mb-1">
                                            <!--begin::Link-->
                                            <a class="btn btn-info font-weight-bolder font-size-sm" data-target="#create-form" value="{{ $problems->id }}" data-bs-target="#kt_modal_new_address_{{$problems->id}}" data-bs-toggle="modal">{{__('cms.add_technical')}}</a>
                                        </div>
                                        <!-- Begin Models -->
                                        <div class="modal fade" id="kt_modal_new_address_{{$problems->id}}" tabindex="-1" style="display: none; padding-left: 0px;" aria-modal="true" role="dialog">
                                            <!--begin::Modal dialog-->
                                            <div class="modal-dialog modal-dialog-centered mw-650px">
                                                <!--begin::Modal content-->
                                                <div class="modal-content">
                                                    <!--begin::Form-->
                                                    <form>
                                                        <!--begin::Modal header-->
                                                        @csrf
                                                        <input type="hidden" id="problem_id" value="{{ $problems->id }}" />
                                                        <div class="modal-header" id="kt_modal_new_address_header">
                                                            <h2>{{__('cms.add_technical')}}</h2>

                                                            <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                                                                <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                                                                <span class="svg-icon svg-icon-1">
                                                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor"></rect>
                                                                        <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="currentColor"></rect>
                                                                    </svg>
                                                                </span>
                                                                <!--end::Svg Icon-->
                                                            </div>
                                                        </div>
                                                        <div class="modal-body py-10 px-lg-17">
                                                            <div class="scroll-y me-n7 pe-7" id="kt_modal_new_address_scroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_new_address_header" data-kt-scroll-wrappers="#kt_modal_new_address_scroll" data-kt-scroll-offset="300px" style="max-height: 34px;">
                                                                <div class="d-flex flex-column mb-5 fv-row fv-plugins-icon-container">
                                                                    <label class="d-flex align-items-center fs-5 fw-semibold mb-2">
                                                                        <span class="required">{{__('cms.technical')}}</span>
                                                                        <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" data-kt-initialized="1"></i>
                                                                    </label>
                                                                    <select class="form-select form-select-solid form-select-lg" data-control="select2" data-select2-id="select2-data-10-uyhn" id="technecal_id" name="technecal_id">
                                                                        @foreach ($users as $user)
                                                                        <option data-kt-flag="flags/indonesia.svg" value="{{ $user->id }}">{{$user->name}}
                                                                        </option>
                                                                        @endforeach
                                                                    </select>
                                                                    <!--end::Select-->
                                                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                                                </div>

                                                            </div>
                                                            <!--end::Scroll-->
                                                        </div>

                                                        <div class="modal-footer flex-center">

                                                            <!--begin::Button-->
                                                            <button type="submit" onclick="performStore('{{$problems->id}}')" id="kt_modal_new_address_submit" class="btn btn-primary">
                                                                <span class="indicator-label">{{__('cms.save')}}</span>
                                                                <span class="indicator-progress">{{__('cms.Please_wait')}}...
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


                                    </td>
                                    <!--end::Action=-->
                                </tr>
                                @endforeach
                            </tbody>
                            <!--end::Table body-->
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start">
                        </div>
                        <div class="col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end">
                            <div class="dataTables_paginate paging_simple_numbers" id="kt_table_users_paginate">
                                <ul class="pagination">
                                    <li class="paginate_button page-item previous disabled" id="kt_table_users_previous"><a href="#" aria-controls="kt_table_users" data-dt-idx="0" tabindex="0" class="page-link"><i class="previous"></i></a></li>
                                    <li class="paginate_button page-item active"><a href="#" aria-controls="kt_table_users" data-dt-idx="1" tabindex="0" class="page-link">1</a></li>
                                    <li class="paginate_button page-item "><a href="#" aria-controls="kt_table_users" data-dt-idx="2" tabindex="0" class="page-link">2</a></li>
                                    <li class="paginate_button page-item "><a href="#" aria-controls="kt_table_users" data-dt-idx="3" tabindex="0" class="page-link">3</a></li>
                                    <li class="paginate_button page-item next" id="kt_table_users_next"><a href="#" aria-controls="kt_table_users" data-dt-idx="4" tabindex="0" class="page-link"><i class="next"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    {{ $problem->links() }}
                </div>
            </div>
        </div>
        <!--end::Table-->
    </div>



    <!--end::Card body-->
</div>


@endsection
@section('scripts')
<script src="{{asset('cms/assets/plugins/global/plugins.bundle.js')}}"></script>
<script src="{{asset('cms/assets/js/scripts.bundle.js')}}"></script>
<script src="{{asset('cms/assets/js/custom/utilities/modals/new-address.js')}}"></script>
<script src="{{asset('cms/assets/js/widgets.bundle.js')}}"></script>
<script src="{{asset('cms/assets/js/custom/widgets.js')}}"></script>
<script src="{{asset('cms/assets/js/custom/apps/chat/chat.js')}}"></script>
<script src="https:://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{{asset('cms/assets/js/custom/utilities/modals/upgrade-plan.js')}}"></script>
<script src="{{asset('cms/assets/plugins/custom/datatables/datatables.bundle.js')}}"></script>
<script src="{{asset('cms/assets/plugins/custom/vis-timeline/vis-timeline.bundle.js')}}"></script>
<script src="https://cdn.amcharts.com/lib/5/index.js"></script>
<script src="https://cdn.amcharts.com/lib/5/xy.js"></script>
<script src="https://cdn.amcharts.com/lib/5/percent.js"></script>
<script src="https://cdn.amcharts.com/lib/5/radar.js"></script>
<script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>

<script>
    $(form.querySelector('[name="technecal_id"]')).select2().on('change', function() {
        validator.revalidateField('technecal_id');
    });
</script>
<script>
    function performStore(id) {
        axios.post('/cms/repairs', {
                problem_id: id,
                technecal_id: document.getElementById('technecal_id').value,

            })
            .then(function(response) {
                console.log(response);
                toastr.success(response.data.message);
                document.getElementById('insert-form').reset();
                window.location.href = '/cms/repairs'
            })
            .catch(function(error) {
                console.log(error.response);
                toastr.error(error.response.data.message);
            });
    }
</script>

@endsection