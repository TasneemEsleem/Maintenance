@extends('cms.parent');
@section('title',__('cms.spare_part'))
@section('page-lg',__('cms.home'))
@section('main-pg-md',__('cms.spare_part_Management'))
@section('page-md',__('cms.spare_part'))
@section('Content')
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
            <div class="card">


                <!--begin::Card body-->
                <div class="card-body py-4">
                    <!--begin::Table-->
                    <div id="kt_table_users_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                        <div class="table-responsive">
                            <table class="table align-middle table-row-dashed fs-6 gy-5 dataTable no-footer"
                                id="kt_table_users">
                                <!--begin::Table head-->
                                <thead>
                                    <!--begin::Table row-->
                                    <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
                                        <th  >#</th>
                                        <th tabindex="0" aria-controls="kt_table_users"
                                            rowspan="1" colspan="1" aria-label="User: activate to sort column ascending"
                                            >{{__('cms.spare_part')}}</th>

                                        <th  tabindex="0" aria-controls="kt_table_users"
                                            rowspan="1" colspan="1"
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
      <td >
            {{$loop->index+1}}
        </td>
        <td>{{$spare_part->name }}</td>

                                        <!--end::Checkbox-->
                                        <!--begin::User=-->
                                        <td >
                                            <div class="form-group clearfix align-middle">
                                                <div class="icheck-success d-inline">
                                                    <input class="form-check-input " type="checkbox"
                                                        onclick="performStore('{{$spare_part->id}}')"
                                                        id="spare_part_{{$spare_part->id}}" @checked($spare_part->assigned==true) >
                                                    <label class="form-check-label ms-3"  for="spare_part_{{$spare_part->id}}"></label>
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
@endsection
@section('scripts')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    $(function () { bsCustomFileInput.init() });
</script>
<script>

   function performStore(id) {

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
<script>
    function confirmDelete(id, reference) {
        Swal.fire({

          title: "{{__('cms.toast_title')}}",
            text: "{{__('cms.toast_text')}}",
            icon: 'warning',
            showCancelButton: true,
            cancelButtonColor: '#d33',
            confirmButtonColor: '#3085d6',
            confirmButtonText: "{{__('cms.confirmButtonText')}}"
        }).then((result) => {
        if (result.isConfirmed) {
            performDelete(id, reference);
        }
        });
    }

    function performDelete(id, reference) {
        axios.delete('/cms/spare_parts/'+id)
        .then(function (response) {
            console.log(response);
            toastr.success(response.data.message);
            reference.closest('tr').remove();
            showMessage(response.data);
        })
        .catch(function (error) {
            console.log(error.response);
            toastr.error(error.response.data.message);
            showMessage(error.response.data);
        });
    }

   
</script>

@endsection
