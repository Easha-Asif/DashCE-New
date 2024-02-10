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
                <div class="card author-box">
                  <div class="card-body">
                    <div class="author-box-center">
                      <div class="profile-image">
                        @if(Auth::user()->image == '')
                          <img src="{{ asset('/uploads/default/default.png') }}" width="100" height="100" class=" rounded-circle mb-2">
                        @else
                          <img src="{{ asset(''.Auth::user()->image) }}" width="100" height="100" class="rounded-circle mb-2">
                        @endif
                      </div>
                      <div class="clearfix"></div>
                      <div class="author-box-name">
                        <a href="#">{{$user->name}}</a>
                      </div>
                      <div class="author-box-job" >
                        @if(!empty($user->getRoleNames()))
                          @foreach($user->getRoleNames() as $v)
                            <label class="badge badge-success">{{ $v }}</label>
                          @endforeach
                        @endif
                      </div>
                    </div>
                    <div class="row" style="justify-content: space-around;">
                      <div class="col-xl-2 col-lg-6 col-md-6 col-sm-6 col-xs-12" style="border: 1px solid;">
                        <div class="card-statistic-4">
                          <div class="align-items-center justify-content-between">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                              <div class="card-content">
                                <h5 class="font-15">Active</h5>
                                <h2 class="mb-3 font-18">3</h2>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="col-xl-2 col-lg-6 col-md-6 col-sm-6 col-xs-12" style="border: 1px solid;">
                        <div class="card-statistic-4">
                          <div class="align-items-center justify-content-between">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                              <div class="card-content" style="width: 110px;">
                                <h5 class="font-15">Plan's</h5>
                                <h2 class="mb-3 font-18">2 Month</h2>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="col-xl-2 col-lg-6 col-md-6 col-sm-6 col-xs-12" style="border: 1px solid;">
                        <div class="card-statistic-4">
                          <div class="align-items-center justify-content-between">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                              <div class="card-content" style="width: 110px;">
                                <h5 class="font-15">Dash Passes</h5>
                                <h2 class="mb-3 font-18">{{$user->dash_pass}}</h2>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="col-xl-2 col-lg-6 col-md-6 col-sm-6 col-xs-12" style="border: 1px solid;">
                        <div class="card-statistic-4">
                          <div class="align-items-center justify-content-between">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                              <div class="card-content" style="width: 110px;">
                                <h5 class="font-15">Member Since</h5>
                                <h2 class="mb-3 font-18">{{ $user->date }}</h2>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="col-xl-2 col-lg-6 col-md-6 col-sm-6 col-xs-12" style="border: 1px solid;">
                        <div class="card-statistic-4">
                          <div class="align-items-center justify-content-between">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                              <div class="card-content" style="width: 110px;">
                                <h5 class="font-15">Do Not Call / Contact</h5>
                                <h2 class="mb-3 font-18">{{ $user->contact }}</h2>
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
                    <a class="nav-link active" id="detail-tab2" data-toggle="tab" href="#details" role="tab"
                      aria-selected="true">Details</a>
                    <a class="nav-link" id="ccp-tab2" data-toggle="tab" href="#ccp" role="tab"
                      aria-selected="true">Courses / CE Progress</a>
                    <a class="nav-link" id="pp-tab2" data-toggle="tab" href="#pp" role="tab"
                      aria-selected="true">Plans & Payment</a>
                    <a class="nav-link" id="c-tab2" data-toggle="tab" href="#c" role="tab"
                      aria-selected="true">Communications</a>
                    <a class="nav-link" id="goal-tab2" data-toggle="tab" href="#goal" role="tab"
                      aria-selected="true">Goals</a>
                    <a class="nav-link" id="activity-tab2" data-toggle="tab" href="#activity" role="tab"
                      aria-selected="true">Activity</a>
                  </li>
                </ul>
                <div class="tab-content tab-bordered" id="myTab3Content">
                  <div class="tab-pane fade show active" id="details" role="tabpanel" aria-labelledby="detail-tab2">
                    <div class="row">

                      <div class="col-12 col-md-12 col-lg-5">
                        <div class="card">
                          <div class="card-body">
                            <div class="py-4">
                              <p class="clearfix">
                                <span class="float-left">
                                  status:<br>
                                  UserID:
                                </span>
                                <span class="float-right text-muted">
                                  @if($user->status == '0')
                                    <label class="badge badge-primary">Active</label><br>
                                  @else
                                    <label class="badge badge-danger">Deactive</label><br>
                                  @endif
                                  {{$user->id}}
                                </span>
                              </p>
                              <p class="clearfix">
                                <span class="float-left">
                                  First Name:
                                </span>
                                <span class="float-right text-muted">
                                  {{$user->name}}
                                </span>
                              </p>
                              <p class="clearfix">
                                <span class="float-left">
                                  Email:<br>
                                  Mobile Phone:<br>
                                  Text Opt-In:
                                </span>
                                <span class="float-right text-muted">
                                  {{$user->email}}<br>
                                  {{$user->phone}}<br>
                                  {{$user->updated_at}}
                                </span>
                              </p>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="col-12 col-md-12 col-lg-7">
                        <div class="card">
                          <div class="card-body" style="padding-left: 50px;padding-right: 50px;">
                            <div class="py-4">
                              <p class="clearfix">
                                <span class="float-left">
                                  Referral URL:<br>
                                  Number Of Referrals:
                                </span>
                                <span class="float-right text-muted">
                                  {{$user->referral_url}}<br>
                                  {{$referralCount}}<br>
                                </span>
                              </p>
                              <p class="clearfix">
                                <span class="float-left">
                                  App User:<br>
                                  App Version:<br>
                                  App Count:<br>
                                </span>
                                <span class="float-right text-muted">
                                  {{ $user->app_user }}<br>
                                  {{ $user->app_version }}<br>
                                  {{ $user->device_count }}<br>
                                </span>
                              </p>
                              <p class="clearfix">
                                <span class="float-left">
                                  Last Seen:
                                </span>
                                <span class="float-right text-muted">
                                  {{$user->last_login}}
                                </span>
                              </p>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="col-12 col-md-12 col-lg-6">
                        <div class="card">
                          <div class="card-header">
                            <h4>Additional Info</h4>
                          </div>
                          <div class="card-body">
                            <div class="py-4">
                              <p class="clearfix">
                                <span class="float-left">
                                  Last Modified:
                                </span>
                                <span class="float-right text-muted">
                                  {{$user->updated_at}}
                                </span>
                              </p>
                              <p class="clearfix">
                                <span class="float-left">
                                  Verified:
                                </span>
                                <span class="float-right text-muted">
                                  {{ $user->email_verified_at }} by email
                                </span>
                              </p>
                              <p class="clearfix">
                                <span class="float-left">
                                  Face Verification:
                                </span>
                                <span class="float-right text-muted">
                                  {{ $user->face_verification }}
                                </span>
                              </p>
                              <p class="clearfix">
                                <span class="float-left">
                                  Devices:
                                </span>
                                <span class="float-right text-muted">
                                  {{ $user->device }}
                                </span>
                              </p>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="col-12 col-md-12 col-lg-6">
                        <div class="card">
                          <div class="card-header">
                            <h4>Additional Info</h4>
                          </div>
                          <div class="card-body">
                            <div class="py-4">
                              <p class="clearfix">
                                <span class="float-left">
                                  Referring Url:
                                </span>
                                <span class="float-right text-muted">
                                  {{$user->referring_url}}
                                </span>
                              </p>
                              <p class="clearfix">
                                <span class="float-left">
                                  UTM Source:
                                </span>
                                <span class="float-right text-muted">
                                  {{ $user->utm_source }}
                                </span>
                              </p>
                              <p class="clearfix">
                                <span class="float-left">
                                  UTM Keywords:
                                </span>
                                <span class="float-right text-muted">
                                  {{ $user->utm_keyword }}
                                </span>
                              </p>
                              <p class="clearfix">
                                <span class="float-left">
                                  UTM Campaign:
                                </span>
                                <span class="float-right text-muted">
                                  {{ $user->utm_campaign }}
                                </span>
                              </p>
                              <p class="clearfix">
                                <span class="float-left">
                                  UTM Medium:
                                </span>
                                <span class="float-right text-muted">
                                  {{ $user->utm_medium }}
                                </span>
                              </p>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="col-12 col-12 col-md-12 col-lg-12">
                        <div class="card">
                            <div class="card-header" style="display: block;">
                              <h4>Licenses</h4>
                              <a href="{{ route('licenses.create') }}" class="btn btn-primary" style="position: absolute; right: 10px; top: 3px;">Add Licenses</a>
                            </div>
                          <div class="card-body">
                            <div class="table-responsive">
                              <table class="table table-striped" id="table-1">
                                <thead>
                                  <tr>
                                  <th>No</th>
                                  <th>Name</th>
                                  <th>State</th>
                                  <th>Type</th>
                                  <th>Expiration</th>
                                  <th>License #</th>
                                  <th>Brokerage</th>
                                  <th>Brokerage #</th>
                                  <th>Status</th>
                                  <th width="250px">Action</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  @foreach ($licenses as $key => $license)
                                  <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $license->name }}</td>
                                    <td>{{ $license->state }}</td>
                                    <td>{{ $license->type }}</td>
                                    <td>{{ $license->expiration_date }}</td>
                                    <td>{{ $license->license }}</td>
                                    <td>{{ $license->brokerageid->id ?? '' }}</td>
                                    <td>{{ $license->brokerageid->name ?? '' }}</td>
                                    <td>
                                      @can('license-edit')
                                        @if($license->status == '0')
                                        <a href="{{ route('licenses.status', $license->id) }}" class="btn btn-primary">Active</a>
                                        @else
                                        <a href="{{ route('licenses.status', $license->id) }}" class="btn btn-danger">Deactive</a>
                                        @endif
                                      @endcan
                                    </td>
                                    <td>
                                        @can('license-edit')
                                        <a class="btn btn-primary" href="{{ route('licenses.edit',$license->id) }}">Edit</a>
                                        @endcan
                                        @can('license-delete')
                                        <button class="btn btn-danger" type="button" onclick="deleteItem({{ $license->id }})">
                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                        </button>
                                        <form id="delete-form-{{ $license->id }}" action="{{ route('licenses.destroy', $license->id) }}" method="post"
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
                  <div class="tab-pane fade show" id="ccp" role="tabpanel" aria-labelledby="ccp-tab2">
                    sds
                  </div>
                  <div class="tab-pane fade show" id="pp" role="tabpanel" aria-labelledby="pp-tab2">
                    jjy
                  </div>
                  <div class="tab-pane fade show" id="c" role="tabpanel" aria-labelledby="c-tab2">
                    gfvf
                  </div>
                  <div class="tab-pane fade show" id="goal" role="tabpanel" aria-labelledby="goal-tab2">
                    rfr
                  </div>
                  <div class="tab-pane fade show" id="activity" role="tabpanel" aria-labelledby="activity-tab2">
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
