@extends('cms.parent');
@section('title',__('cms.permission'))
@section('page-lg',__('cms.home'))
@section('main-pg-md',__('cms.role_Management'))
@section('page-md',__('cms.permission'))
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
                                        {{-- <th class="min-w-125px " >#</th> --}}
                                        <th class="min-w-125px sorting" tabindex="0" aria-controls="kt_table_users"
                                            rowspan="1" colspan="1" aria-label="User: activate to sort column ascending"
                                            style="width: 206.375px;">{{__('cms.permission')}}</th>

                                        <th class="min-w-125px sorting" tabindex="0" aria-controls="kt_table_users"
                                            rowspan="1" colspan="1"
                                            aria-label="Two-step: activate to sort column ascending"
                                            style="width: 125px;">{{__('cms.guard_name')}}</th>

                                        <!--end::Table row-->
                                </thead>
                                <!--end::Table head-->
                                <!--begin::Table body-->
                                <tbody class="text-gray-600 fw-semibold">
                                    @foreach ($permissions as $permission)


                                    <tr class="odd">

                                        <!--begin::Checkbox-->
          {{-- <td class="d-flex align-items-start">
            {{$loop->index+1}}
        </td> --}}
                                        <!--end::Checkbox-->
                                        <!--begin::User=-->
                                        <td class="d-flex align-items-center">
                                            <!--begin:: Avatar -->

                                            <!--end::Avatar-->
                                            <!--begin::User details-->
                                            <div class="d-flex flex-column">
                                                <a href="../../demo1/dist/apps/user-management/users/view.html"
                                                    class="text-gray-800 text-hover-primary mb-1">{{$permission->name}}</a>
                                            </div>
                                            <!--begin::User details-->
                                        </td>

                                        <!--end::Two step=-->
                                        <!--begin::Joined-->
                                        <td>{{$permission->guard_name }}</td>




                                    </tr>


                                    @endforeach

                                </tbody>
                                <!--end::Table body-->
                            </table>
                        </div>
                        <div class="row">
                            <div
                                class="col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start">
                            </div>
                            <div
                                class="col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end">
                                <div class="dataTables_paginate paging_simple_numbers" id="kt_table_users_paginate">
                                    <ul class="pagination">
                                        <li class="paginate_button page-item previous disabled"
                                            id="kt_table_users_previous"><a href="#" aria-controls="kt_table_users"
                                                data-dt-idx="0" tabindex="0" class="page-link"><i
                                                    class="previous"></i></a></li>
                                        <li class="paginate_button page-item active"><a href="#"
                                                aria-controls="kt_table_users" data-dt-idx="1" tabindex="0"
                                                class="page-link">1</a></li>
                                        <li class="paginate_button page-item "><a href="#"
                                                aria-controls="kt_table_users" data-dt-idx="2" tabindex="0"
                                                class="page-link">2</a></li>
                                        <li class="paginate_button page-item "><a href="#"
                                                aria-controls="kt_table_users" data-dt-idx="3" tabindex="0"
                                                class="page-link">3</a></li>
                                        <li class="paginate_button page-item next" id="kt_table_users_next"><a href="#"
                                                aria-controls="kt_table_users" data-dt-idx="4" tabindex="0"
                                                class="page-link"><i class="next"></i></a></li>
                                    </ul>
                                </div>
                            </div>
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
   function performStore() {
        var formData = new FormData();
        formData.append('name', document.getElementById('name').value);
        formData.append('email', document.getElementById('email').value);
        formData.append('active', document.getElementById('active').checked ? 1:0);
        formData.append('image',document.getElementById('role_image').files[0]);
       axios.post('/cms/roles', formData)
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
        axios.delete('/cms/roles/'+id)
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

    // function showMessage(data) {
    //     Swal.fire(
    //         data.title,
    //         data.text,
    //         data.icon
    //     );
    // }
</script>

@endsection
