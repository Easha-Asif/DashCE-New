@extends('admin.layouts.master')

@section('title')
    Role Manage
@endsection

@section('content')
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card-header d-flex justify-content-between">
                        <h3>
                            Roles
                        </h3>

                        <div class="text-right">
                            <button class="btn btn-primary rounded ps-2 pe-2 pt-1 pb-1" type="button">
                                <i class="fa fa-plus text-primary" aria-hidden="true"></i> Add Role
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive text-nowrap">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th></th>
                                        <th>Role Name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($roles as $key => $role)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td></td>
                                            <td>{{ $role->name }}</td>
                                            <td>

                                                <div class="dropdown">
                                                    <button type="button" class="btn p-0 dropdown-toggle"
                                                        data-toggle="dropdown">
                                                        <i class="ti ti-dots-vertical"></i>
                                                    </button>

                                                    <div class="dropdown-menu">

                                                        @can('role-edit')

                                                            <a class="dropdown-item" href="{{ route('roles.edit', $role->id) }}">
                                                                <i class="ti ti-pencil me-1"></i> Edit
                                                            </a>
                                                        @endcan
                                                        @can('role-delete')
                                                            <a class="dropdown-item" href="javascript:void(0);"
                                                                onclick="deleteItem({{ $role->id }})">
                                                                <i class="ti ti-trash me-1"></i> Delete
                                                            </a>
                                                            <form id="delete-form-{{ $role->id }}"
                                                                action="{{ route('users.destroy', $role->id) }}" method="post"
                                                                style="display:none;">
                                                                @csrf
                                                                @method('DELETE')
                                                            </form>
                                                        @endcan
                                                    </div>
                                                </div>

                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('js')
    <!-- Sweet Alert Js -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.29.1/dist/sweetalert2.all.min.js"></script>

    <script type="text/javascript">
        function deleteItem(id) {
            const swalWithBootstrapButtons = swal.mixin({
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                buttonsStyling: false,
            })

            swalWithBootstrapButtons({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!',
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                    event.preventDefault();
                    document.getElementById('delete-form-' + id).submit();
                } else if (
                    // Read more about handling dismissals
                    result.dismiss === swal.DismissReason.cancel
                ) {
                    swalWithBootstrapButtons(
                        'Cancelled',
                        'Your data is safe :)',
                        'error'
                    )
                }
            })
        }
    </script>
@endpush
