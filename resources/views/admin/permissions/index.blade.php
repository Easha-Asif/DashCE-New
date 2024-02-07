@extends('admin.layouts.master')

@section('title')
Permissions Manage
@endsection

@section('content')
<section class="section">
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <x-cardheader title="Permissions" />
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped" id="table-1">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Name</th>
                                        <th></th>
                                        <th width="280px">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($permissions as $key => $permission)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $permission->name }}</td>
                                        <td></td>
                                        <td>
                                            <div class="dropdown">
                                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                    data-bs-toggle="dropdown">
                                                    <i class="ti ti-dots-vertical"></i>
                                                </button>
                                                <div class="dropdown-menu">
                                                    @can('permission-edit')
                                                    <a class="dropdown-item"
                                                        href="{{ route('permissions.edit', $permission->id) }}">
                                                        <i class="ti ti-pencil me-1"></i> Edit
                                                    </a>
                                                    @endcan
                                                    @can('permission-delete')
                                                    <a class="dropdown-item" href="javascript:void(0);"
                                                        onclick="deleteItem({{ $permission->id }})">
                                                        <i class="ti ti-trash me-1"></i> Delete
                                                    </a>
                                                    <form id="delete-form-{{ $permission->id }}"
                                                        action="{{ route('permissions.destroy', $permission->id) }}"
                                                        method="post" style="display:none;">
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
