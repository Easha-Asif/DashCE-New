@extends('admin.layouts.master')

@section('title')
    Edit User
@endsection

@section('content')
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="padding-20">
                            <div class="author-box">
                                <div class="card-body">
                                    <div class="author-box-center">
                                        <div class="profile-image">

                                            <img src="{{ asset('/uploads/default/default.png') }}" width="100"
                                                height="100" class=" rounded-circle mb-2">
                                        </div>
                                        <div class="clearfix"></div>
                                        <div class="author-box-name">
                                            <a href="#">Student Name</a>
                                        </div>
                                        <div class="author-box-job">
                                            @if (!empty($user->getRoleNames()))
                                                @foreach ($user->getRoleNames() as $v)
                                                    <label class="badge badge-success">{{ $v }}</label>
                                                @endforeach
                                            @endif
                                        </div>
                                    </div>
                                    <div class="row mt-3 mb-3" style="justify-content: space-around;">
                                        <div class="col-xl-2 col-lg-6 col-md-6 col-sm-6 col-xs-12 rounded cardShadow mb-2">
                                            <div class="card-statistic-4">
                                                <div class="align-items-center justify-content-between">
                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ps-0 pe-0 pt-3">
                                                        <div class="card-content text-center">
                                                            <h5 class="font-16 ">Active</h5>
                                                            <h2 class="mb-3 font-18 boxTitle">3</h2>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-xl-2 col-lg-6 col-md-6 col-sm-6 col-xs-12 rounded cardShadow mb-2">
                                            <div class="card-statistic-4">
                                                <div class="align-items-center justify-content-between">
                                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 ps-0 pe-0 pt-3">
                                                        <div class="card-content text-center" style="width: 110px;">
                                                            <h5 class="font-16">Plan's</h5>
                                                            <h2 class="mb-3 font-18 boxTitle">2 Month</h2>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-xl-2 col-lg-6 col-md-6 col-sm-6 col-xs-12 rounded cardShadow mb-2">
                                            <div class="card-statistic-4">
                                                <div class="align-items-center justify-content-between">
                                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                                                        <div class="card-content text-center" style="width: 110px;">
                                                            <h5 class="font-16">Dash Passes</h5>
                                                            <h2 class="mb-3 font-18 boxTitle">2</h2>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-xl-2 col-lg-6 col-md-6 col-sm-6 col-xs-12 rounded cardShadow mb-2">
                                            <div class="card-statistic-4">
                                                <div class="align-items-center justify-content-between">
                                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                                                        <div class="card-content text-center" style="width: 110px;">
                                                            <h5 class="font-16">Member Since</h5>
                                                            <h2 class="mb-3 font-18 boxTitle">12-15-2021</h2>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-xl-2 col-lg-6 col-md-6 col-sm-6 col-xs-12 rounded cardShadow mb-2">
                                            <div class="card-statistic-4">
                                                <div class="align-items-center justify-content-between">
                                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                                                        <div class="card-content text-center rounded" style="width: 110px;">
                                                            <h5 class="font-14">Do Not Call / Contact</h5>
                                                            <h2 class="mb-3 font-18 boxTitle">Clear</h2>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <ul class="nav nav-tabs" id="myTab2" role="tablist" style="justify-content: space-around;">
                                <li class="nav-item" style="display: flex; flex-wrap: wrap;">
                                    <a class="nav-link active" id="detail-tab2" data-toggle="tab" href="#details"
                                        role="tab" aria-selected="true">Details</a>
                                    <a class="nav-link" id="ccp-tab2" data-toggle="tab" href="#ccp" role="tab"
                                        aria-selected="true">Courses / CE Progress</a>
                                    <a class="nav-link" id="pp-tab2" data-toggle="tab" href="#pp" role="tab"
                                        aria-selected="true">Plans & Payment</a>
                                    <a class="nav-link" id="c-tab2" data-toggle="tab" href="#c" role="tab"
                                        aria-selected="true">Communications</a>
                                    <a class="nav-link" id="goal-tab2" data-toggle="tab" href="#goal" role="tab"
                                        aria-selected="true">Goals</a>
                                    <a class="nav-link" id="activity-tab2" data-toggle="tab" href="#activity"
                                        role="tab" aria-selected="true">Activity</a>
                                </li>
                            </ul>
                            <div class="tab-content tab-bordered" id="myTab3Content">
                                <div class="tab-pane fade show active" id="details" role="tabpanel"
                                    aria-labelledby="detail-tab2">
                                    <div class="row">

                                        <div class="col-12 col-md-12 col-lg-6">
                                            <table class="table table-striped">

                                                <tbody>
                                                    <tr>
                                                        <td>Status:</td>
                                                        <td class="text-start"><a href="#"
                                                                class="btn btn-primary rounded">Active</a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>User ID:</td>
                                                        <td class="text-start">541</td>
                                                    </tr>
                                                    <tr>
                                                        <td>First Name:</td>
                                                        <td class="text-start">John</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Last Name:</td>
                                                        <td class="text-start">Wayne</td>
                                                    </tr>

                                                    <tr>
                                                        <td>Email:</td>
                                                        <td class="text-start">john.wayne@gmail.com</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Mobile Number:</td>
                                                        <td class="text-start">480.555.1212</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Text Opt-In:</td>
                                                        <td class="text-start">Yes - 10-21-2020 10:00 AM</td>
                                                    </tr>
                                                </tbody>
                                            </table>

                                        </div>

                                        <div class="col-12 col-md-12 col-lg-6">
                                            <table class="table table-striped">

                                                <tbody>
                                                    <tr>
                                                        <td>Referral URL:</td>
                                                        <td class="text-start">https://dashu.com/referral/102623541                                                                    </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Number Of Referrals:</td>
                                                        <td class="text-start">12</td>
                                                    </tr>
                                                    <tr>
                                                        <td>App User:</td>
                                                        <td class="text-start">Android</td>
                                                    </tr>
                                                    <tr>
                                                        <td>App Version:</td>
                                                        <td class="text-start">4.1</td>
                                                    </tr>

                                                    <tr>
                                                        <td>Device Count:</td>
                                                        <td class="text-start">4</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Last Seen:</td>
                                                        <td class="text-start">15 days ago</td>
                                                    </tr>

                                                </tbody>
                                            </table>
                                        </div>


                                        <div class="col-12 mb-5">
                                            <div class="d-flex justify-content-between align-items-center mb-3 mt-5">
                                                <h4>Licenses</h4>
                                                <a href="{{ route('licenses.create') }}" class="btn btn-primary ">
                                                    <i class="fa fa-plus text-primary" aria-hidden="true"></i> Add Licenses</a>
                                            </div>

                                            <div class="table-responsive">
                                                <table class="table table-striped" >
                                                    <thead>
                                                        <tr>
                                                            <th>State</th>
                                                            <th>Type</th>
                                                            <th>Expiration</th>
                                                            <th>License Number</th>
                                                            <th>Status</th>
                                                            <th>Brokerage</th>
                                                            <th>Brokerage Number</th>
                                                            <th >Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>Arizona</td>
                                                            <td>Salesperson</td>
                                                            <td>5/31/2025</td>
                                                            <td>SAS5261145</td>
                                                            <td><a href="#" class="btn btn-primary">Active</a></td>
                                                            <td>Homestart</td>
                                                            <td>BR251112335</td>
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
                                                        <tr>
                                                            <td>California</td>
                                                            <td>Salesperson</td>
                                                            <td>4/24/2026</td>
                                                            <td>CD12325544</td>
                                                            <td><a href="#" class="btn btn-primary">Active</a></td>
                                                            <td>Coldwell Banker</td>
                                                            <td>BR635241154</td>
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
                                                        <tr>
                                                            <td>Arizona</td>
                                                            <td>Salesperson</td>
                                                            <td>5/31/2025</td>
                                                            <td>SAS5261145</td>
                                                            <td><a href="#" class="btn btn-primary">Active</a></td>
                                                            <td>Homestart</td>
                                                            <td>BR251112335</td>
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

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                        <div class="col-12 d-flex justify-content-between align-items-center mb-3 mt-2">
                                            <h4>Additional Information</h4>
                                        </div>

                                        <div class="col-12 col-md-12 col-lg-6">
                                            <table class="table table-striped">

                                                <tbody>
                                                    <tr>
                                                        <td>Last Modified:</td>
                                                        <td class="text-start">10/25/2023 10:33 PM</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Verified:</td>
                                                        <td class="text-start">10-15-2023 by email</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Face Verifictaion:</td>
                                                        <td class="text-start">Yes</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Devices:</td>
                                                        <td class="text-start">3</td>
                                                    </tr>

                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="col-12 col-md-12 col-lg-6">
                                            <table class="table table-striped">

                                                <tbody>
                                                    <tr>
                                                        <td>Referral URL:</td>
                                                        <td class="text-start">https://facebook.com</td>
                                                    </tr>
                                                    <tr>
                                                        <td>UTM Source:</td>
                                                        <td class="text-start">Facebook</td>
                                                    </tr>
                                                    <tr>
                                                        <td>UTM Keywords:</td>
                                                        <td class="text-start">ADRE Continuing Education</td>
                                                    </tr>
                                                    <tr>
                                                        <td>UTM Campaign:</td>
                                                        <td class="text-start">Summer Sale</td>
                                                    </tr>

                                                    <tr>
                                                        <td>UTM Medium:</td>
                                                        <td class="text-start">CPC</td>
                                                    </tr>
                                           

                                                </tbody>
                                            </table>
                                        </div>


                                    </div>

                                </div>
                                <div class="tab-pane fade show" id="ccp" role="tabpanel"
                                    aria-labelledby="ccp-tab2">
                                    sds
                                </div>
                                <div class="tab-pane fade show" id="pp" role="tabpanel"
                                    aria-labelledby="pp-tab2">
                                    jjy
                                </div>
                                <div class="tab-pane fade show" id="c" role="tabpanel" aria-labelledby="c-tab2">
                                    gfvf
                                </div>
                                <div class="tab-pane fade show" id="goal" role="tabpanel"
                                    aria-labelledby="goal-tab2">
                                    rfr
                                </div>
                                <div class="tab-pane fade show" id="activity" role="tabpanel"
                                    aria-labelledby="activity-tab2">
                                    frf
                                </div>
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
