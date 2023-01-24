@extends('cms.parent');
@section('styles')
    
@endsection
@section('Content')
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

                                <th class="min-w-125px sorting" tabindex="0" aria-controls="kt_table_users"
                                    rowspan="1" colspan="1" aria-label="User: activate to sort column ascending"
                                    style="width: 206.375px;">{{__('cms.permission')}}</th>


                                <th class="min-w-125px sorting" tabindex="0" aria-controls="kt_table_users"
                                    rowspan="1" colspan="1"
                                    aria-label="Two-step: activate to sort column ascending"
                                    style="width: 125px;">{{__('cms.guard_name')}}</th>


                                <th class="min-w-125px sorting" tabindex="0" aria-controls="kt_table_users"
                                    rowspan="1" colspan="1"
                                    aria-label="Joined Date: activate to sort column ascending"
                                    style="width: 142.234px;">{{__('cms.status')}}</th>


                            </tr>
                            <!--end::Table row-->
                        </thead>
                        <!--end::Table head-->
                        <!--begin::Table body-->
                        <tbody class="text-gray-600 fw-semibold">

                            @foreach ($permissions as $permission)
                            <tr>
                                <td>{{$permission->name}}</td>
                                <td><span class="badge bg-success">{{$permission->guard_name}}</span></td>
                                <td >
                                    <div class="form-group clearfix align-middle">
                                        <div class="icheck-success d-inline">
                                            <input class="form-check-input " type="checkbox"
                                                onclick="performUpdate('{{$permission->id}}')"
                                                id="permission_{{$permission->id}}" @if($permission->granted)
                                            checked @endif>
                                            <label class="form-check-label ms-3"  for="permission_{{$permission->id}}"></label>
                                        </div>
                                    </div>
                                </td>
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
@endsection
@section('scripts')

<script>
    $(function () { bsCustomFileInput.init() });
</script>


<script>
    function performUpdate(permissionId) {
        axios.post('/cms/permissions/role', {
            permission_id: permissionId,
            role_id: {{ $role->id}}
        })
        .then(function (response) {
            console.log(response);
            // toastr.warning(response.data.message);

            Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: response.data.message,
            showConfirmButton: false,
            timer: 1500
            })
        })
        .catch(function (error) {
            console.log(error.response);
            toastr.error(error.response.data.message);
        });
    }

</script>
@endsection
