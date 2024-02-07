@extends('admin.layouts.master')

@section('title')
Student Manage
@endsection

@section('content')
<section class="section">
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <x-cardheader title="Students" />
                    <x-forms.primary-button id="createButton" class="float-right">Create</x-forms.primary-button>
                    <div class="card-body">
                        <div class="table-responsive text-nowrap">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Licence Status</th>
                                        <th>Last Login</th>
                                        <th>Progress</th>
                                        <th>Subscription</th>
                                        <th>Role</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $key => $user)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>
                                            @if($user->license->status ?? '' == '0' )
                                            Deactive
                                            @else
                                            Active
                                            @endif
                                        </td>
                                        <td>{{ $user->last_login }}</td>
                                        <td></td>
                                        <td></td>
                                        <td>
                                            @if(!empty($user->getRoleNames()))
                                            @foreach($user->getRoleNames() as $v)
                                            <label class="badge badge-success">{{ $v }}</label>
                                            @endforeach
                                            @endif
                                        </td>
                                        <td>
                                            @can('user-edit')
                                            @if($user->status == '0')
                                            <a href="{{ route('students.status', $user->id) }}"
                                                class="btn btn-primary">Active</a>
                                            @else
                                            <a href="{{ route('students.status', $user->id) }}"
                                                class="btn btn-danger">Deactive</a>
                                            @endif
                                            @endcan
                                        </td>
                                        <td>
                                            <div class="dropdown">
                                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                    data-bs-toggle="dropdown">
                                                    <i class="ti ti-dots-vertical"></i>
                                                </button>
                                                <div class="dropdown-menu">
                                                    @can('user-edit')
                                                    @if($user->status == '0')
                                                    <a href="{{ route('students.status', $user->id) }}"
                                                        class="dropdown-item btn btn-primary">Active</a>
                                                    @else
                                                    <a href="{{ route('students.status', $user->id) }}"
                                                        class="dropdown-item btn btn-danger">Deactive</a>
                                                    @endif
                                                    <a class="dropdown-item btn btn-primary"
                                                        href="{{ route('students.edit', $user->id) }}">Edit</a>
                                                    @endcan
                                                    @can('user-delete')
                                                    <button class="dropdown-item btn btn-danger" type="button"
                                                        onclick="deleteItem({{ $user->id }})">
                                                        <i class="fa fa-trash" aria-hidden="true"></i> Delete
                                                    </button>
                                                    <form id="delete-form-{{ $user->id }}"
                                                        action="{{ route('students.destroy', $user->id) }}"
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
