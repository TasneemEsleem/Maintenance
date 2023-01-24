@extends('cms.parent');
@section('title',__('cms.repair_problems'))
@section('page-lg',__('cms.home'))
@section('repair_problem-pg-md',__('cms.repair_problems'))
@section('page-md',__('cms.repair_problem_list'))
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

                </div>
                <!--end::Card toolbar-->
            </div>
            <!--end::Card header-->
            <!--begin::Card body-->
            <div class="card-body pt-0">
                <!--begin::Table-->
                <div id="kt_ecommerce_products_table_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                    <div class="table-responsive">
                        <table class="table align-middle table-row-dashed fs-6 gy-5 dataTable no-footer" id="kt_ecommerce_products_table">
                            <!--begin::Table head-->
                            <thead>
                                <!--begin::Table row-->
                                <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">



                                    <th class="min-w-125px sorting" tabindex="0" aria-controls="kt_table_users" aria-label="Two-step: activate to sort column ascending">
                                        {{__('cms.problem_details')}}
                                    </th>

                                    <th class="min-w-125px sorting" tabindex="0" aria-controls="kt_table_users" aria-label="Joined Date: activate to sort column ascending">{{__('cms.Status')}}
                                    </th>
                                    <th class=" min-w-100px sorting_disabled" rowspan="1" colspan="1" aria-label="Actions">{{__('cms.actions')}}</th>
                                    <th class=" min-w-100px sorting_disabled" rowspan="1" colspan="1" aria-label="Actions">{{__('cms.spareparts')}}</th>
                                </tr>
                                <!--end::Table row-->
                            </thead>
                            <!--end::Table head-->
                            <!--begin::Table body-->
                            <tbody class="fw-semibold text-gray-600">
                                @foreach ($repairs as $repair)


                                <tr class="odd">




                                    <td class="d-flex align-items-center">
                                        <!--begin:: Avatar -->

                                        <!--end::Avatar-->
                                        <!--begin::User details-->
                                        <div class="d-flex flex-column">
                                            <a href="../../demo1/dist/apps/user-management/users/view.html" class="text-gray-800 text-hover-primary mb-1"> 
                                                {{ $repair->problem->details ??'NULL' }}



                                            </a>

                                        </div>
                                        <!--begin::User details-->
                                    </td>

                                    <!--end::Two step=-->
                                    <!--begin::Joined-->
                                    <td>
                                        <span class="fw-bold">{{$repair->app_status}}</span>
                                    </td>



                                    <td>
                                        <div class="d-flex  flex-shrink-0">

                                            <a href="{{route('repair.problem',$repair->problem->id )}}" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
                                                <!--begin::Svg Icon | path: icons/duotune/art/art005.svg-->
                                                <span class="btn btn-info">
                                                    {{ __('cms.information') }}
                                                </span>
                                                <!--end::Svg Icon-->
                                            </a>

                                        </div>
                                    </td>

                                    <td>
                                        <div class="d-flex  flex-shrink-0">

                                            <a href="{{route('repair_problems.show', $repair->id )}}" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
                                                <!--begin::Svg Icon | path: icons/duotune/art/art005.svg-->
                                                <span class="btn btn-info">
                                                    {{ __('cms.count') }}:{{ $repair->spareparts_count }}
                                                </span>
                                                <!--end::Svg Icon-->
                                            </a>

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

<script>
    function confirmDelete(id, reference) {
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            cancelButtonColor: '#d33',
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                performDelete(id, reference);
            }
        });
    }

    function performDelete(id, reference) {
        axios.delete('/cms/repair_problems/' + id)
            .then(function(response) {
                console.log(response);
                toastr.success(response.data.message);
                reference.closest('tr').remove();
                // showMessage(response.data.message);
            })
            .catch(function(error) {
                console.log(error.response);
                toastr.error(error.response.data.message);
                // showMessage(error.response.data.message);
            });
    }

    function showMessage(data) {
        Swal.fire(
            data.title,
            data.text,
            data.icon
        );
    }
</script>

@endsection