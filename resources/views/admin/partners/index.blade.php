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
                                Partners
                            </h3>

                            <div class="text-right">
                                <button class="btn btn-primary rounded ps-2 pe-2 pt-1 pb-1" type="button" id="createButton">
                                    <i class="fa fa-plus text-primary" aria-hidden="true"></i> Add Partner
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive text-nowrap">
                                <table class="table table-striped">
                                    <thead>

                                        <tr>
                                            <th>PARTNER ID</th>
                                            <th>COMPANY NAME</th>
                                            <th>TYPE</th>
                                            <th>RM</th>
                                            <th>PHONE</th>
                                            <th>STATE</th>
                                            <th>OFFERS PROMO CODE</th>
                                            <th>ADVERTISER</th>
                                            <th>OFFERS CLASSES</th>
                                            <th>STATUS</th>
                                            <th>ACTION</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <tr>
                                            <td>235482</td>
                                            <td>
                                                Nexa Mortagage
                                            </td>
                                            <td>Mortagage</td>
                                            <td>Jacke Onasis</td>
                                            <td>231-235-4575</td>
                                            <td>Arizona, California</td>
                                            <td>Yes
                                            </td>
                                            <td>Yes</td>
                                            <td>Yes</td>
                                            <td><a href="#" class="btn btn-primary">Active</a></td>
                                            <td>
                                                <div class="dropdown">
                                                    <button type="button" class="btn p-0 dropdown-toggle"
                                                        data-toggle="dropdown">
                                                        <i class="ti ti-dots-vertical"></i>
                                                    </button>
                                                    <div class="dropdown-menu">
                                                                <a class="dropdown-item btn "
                                                                    >
                                                                    <i class="fa fa-eye" aria-hidden="true"></i> View</a>
                                                                <a class="dropdown-item btn "
                                                                    ><i class="fa fa-pencil" aria-hidden="true"></i> Edit</a>
                                                                <button class="dropdown-item btn " type="button"
                                                                    ><i class="fa fa-trash" aria-hidden="true"></i> Delete
                                                                </button>
                                                                <form id=""
                                                                    action=""
                                                                    method="post" style="display:none;">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                </form>

                                                    </div>
                                                </div>

                                            </td>
                                        </tr>
                                        <tr>
                                            <td>524123</td>
                                            <td>
                                                Weserve
                                            </td>
                                            <td>Assosiation</td>
                                            <td>Bill Smith</td>
                                            <td>231-235-4575</td>
                                            <td>Arizona</td>
                                            <td>Yes
                                            </td>
                                            <td>Yes</td>
                                            <td>Yes</td>
                                            <td><a href="#" class="btn btn-primary">Active</a></td>
                                            <td>
                                                <div class="dropdown">
                                                    <button type="button" class="btn p-0 dropdown-toggle"
                                                        data-toggle="dropdown">
                                                        <i class="ti ti-dots-vertical"></i>
                                                    </button>
                                                    <div class="dropdown-menu">
                                                                <a class="dropdown-item btn "
                                                                    >
                                                                    <i class="fa fa-eye" aria-hidden="true"></i> View</a>
                                                                <a class="dropdown-item btn "
                                                                    ><i class="fa fa-pencil" aria-hidden="true"></i> Edit</a>
                                                                <button class="dropdown-item btn " type="button"
                                                                    ><i class="fa fa-trash" aria-hidden="true"></i> Delete
                                                                </button>
                                                                <form id=""
                                                                    action=""
                                                                    method="post" style="display:none;">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                </form>

                                                    </div>
                                                </div>

                                            </td>
                                        </tr>
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
