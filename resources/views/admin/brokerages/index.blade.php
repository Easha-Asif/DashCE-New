@extends('admin.layouts.master')

@section('title')
Brokerage Manage
@endsection

@section('content')
<section class="section">
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h3>
                            Brokerages
                        </h3>

                        <div class="text-right">
                            <button class="btn btn-primary rounded ps-2 pe-2 pt-1 pb-1" type="button" id="createButton">
                                <i class="fa fa-plus text-primary" aria-hidden="true"></i> Add Broker
                            </button>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive text-nowrap">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>BROKERAGE ID</th>
                                        <th>PARTNER</th>
                                        <th>BROKERAGE NAME</th>
                                        <th>MASTRER BRAND</th>
                                        <th>RM</th>
                                        <th>PHONE</th>
                                        <th>STATE</th>
                                        <th>LICENSES</th>
                                        <th>TYPE</th>
                                        <th>STUDENTS</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $key => $user)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>
                                            @if($referralUrlcounts)
                                            Yes
                                            @else
                                            NO
                                            @endif
                                        </td>
                                        <td>Barbie Reynolds</td>
                                        <td>Coldwell Banker</td>
                                        <td>Jackie Onasis</td>
                                        <td>231-235-4575</td>
                                        <td>Arizona</td>
                                        <td>40</td>
                                        <td>
                                            @if(!empty($user->getRoleNames()))
                                            @foreach($user->getRoleNames() as $v)
                                            <label class="badge badge-success">{{ $v }}</label>
                                            @endforeach
                                            @endif
                                        </td>
                                        <td>12</td>
                                        <td>
                                            <div class="dropdown">
                                                <button type="button" class="btn p-0 dropdown-toggle"
                                                data-toggle="dropdown">
                                                <i class="ti ti-dots-vertical"></i>
                                            </button>
                                                <div class="dropdown-menu">
                                                    @can('user-edit')
                                                    <a class="dropdown-item"
                                                        href="{{ route('brokerages.view', $user->id) }}">
                                                        <i class="fa fa-eye" aria-hidden="true"></i> View</a>
                                                    <a class="dropdown-item"
                                                        href="{{ route('brokerages.edit', $user->id) }}">
                                                        <i class="fa fa-pencil" aria-hidden="true"></i> Edit</a>
                                                    @endcan
                                                    @can('user-delete')
                                                    <button class="dropdown-item btn " type="button"
                                                        onclick="deleteItem({{ $user->id }})">
                                                        <i class="fa fa-trash" aria-hidden="true"></i> Delete
                                                    </button>
                                                    <form id="delete-form-{{ $user->id }}"
                                                        action="{{ route('brokerages.destroy', $user->id) }}"
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
