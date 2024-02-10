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

                        <div class="card-header d-flex justify-content-between">
                            <h3>
                                Students
                            </h3>

                            <div class="text-right">
                                <button class="btn btn-primary rounded ps-2 pe-2 pt-1 pb-1" type="button" id="createButton">
                                    <i class="fa fa-plus text-primary" aria-hidden="true"></i> Add Students
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive text-nowrap">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>USER ID</th>
                                            <th>NAME</th>
                                            <th>EMAIl</th>
                                            <th>PHONE</th>
                                            <th>STATE LICENSED</th>
                                            <th>SUBSCRIPTION STATUS</th>
                                            <th>LAST LOGGED IN</th>
                                            <th>TYPE</th>
                                            <th>STATUS</th>
                                            <th>ACTION</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $key => $user)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>{{ $user->phone }}</td>
                                                <td>Arizona</td>
                                                <td>Monthly - Expired</td>

                                                <td>{{ $user->last_login }}</td>
                                                <td>
                                                    @if (!empty($user->getRoleNames()))
                                                        @foreach ($user->getRoleNames() as $v)
                                                            <label class="badge badge-success">{{ $v }}</label>
                                                        @endforeach
                                                    @endif
                                                </td>
                                                <td>
                                                    @can('user-edit')
                                                        @if ($user->status == '0')
                                                            <a href="{{ route('users.status', $user->id) }}"
                                                                class="btn btn-primary">Active</a>
                                                        @else
                                                            <a href="{{ route('users.status', $user->id) }}"
                                                                class="btn btn-danger">Deactive</a>
                                                        @endif
                                                    @endcan
                                                </td>
                                                <td>

                                                    <div class="dropdown">
                                                        <button type="button" class="btn p-0 dropdown-toggle"
                                                            data-toggle="dropdown">
                                                            <i class="ti ti-dots-vertical"></i>
                                                        </button>

                                                        <div class="dropdown-menu">

                                                            @can('user-edit')
                                                            <a class="dropdown-item"
                                                            href="{{ route('users.view', $user->id) }}">
                                                            <i class="fa fa-eye" aria-hidden="true"></i> View</a>
                                                                <a class="dropdown-item"
                                                                    href="{{ route('users.edit', $user->id) }}">
                                                                    <i class="ti ti-pencil me-1"></i> Edit
                                                                </a>
                                                            @endcan
                                                            @can('user-delete')
                                                                <a class="dropdown-item" href="javascript:void(0);"
                                                                    onclick="deleteItem({{ $user->id }})">
                                                                    <i class="ti ti-trash me-1"></i> Delete
                                                                </a>
                                                                <form id="delete-form-{{ $user->id }}"
                                                                    action="{{ route('users.destroy', $user->id) }}"
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
