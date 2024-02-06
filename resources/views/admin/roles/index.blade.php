@extends('admin.layouts.master')

@section('title')
      Role Manage
  @endsection

@section('content')
<section class="section">
    <div class="section-body">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <x-cardheader title="Roles" />
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
                            <button class="btn " type="button" onclick="deleteItem({{ $role->id }})">
                                <i class="fa fa-eye text-success" aria-hidden="true"></i>
                            </button>
                            @can('role-edit')
                            <a href="{{ route('roles.edit',$role->id) }}" class="btn "><i class="fa fa-edit text-primary" aria-hidden="true"></i></a>
                            @endcan
                            @can('role-delete')
                            <button class="btn " type="button" onclick="deleteItem({{ $role->id }})">
                                <i class="fa fa-trash text-danger" aria-hidden="true"></i>
                            </button>

                            <form id="delete-form-{{ $role->id }}" action="{{ route('roles.destroy', $role->id) }}" method="post"
                                  style="display:none;">
                                @csrf
                                @method('DELETE')
                            </form>
                            @endcan
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
                    document.getElementById('delete-form-'+id).submit();
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
