@extends('admin.layouts.master')

@section('title')
      Edit Brokerage 
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
                        @if($user->image == '')
                          <img src="{{ asset('/uploads/default/default.png') }}" width="100" height="100" class=" rounded-circle mb-2">
                        @else
                          <img src="{{ asset(''.$user->image) }}" width="100" height="100" class="rounded-circle mb-2">
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
                              <div class="card-content" style="width: 110px;">
                                <h5 class="font-15">Active Students</h5>
                                <h2 class="mb-3 font-18">{{ $studentcounts }}</h2>
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
                                <h5 class="font-15">Partners</h5>
                                <h2 class="mb-3 font-18">
                                  @if($referralUrlcounts)
                                    Yes
                                  @else
                                    NO
                                  @endif
                                </h2>
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
                                <h5 class="font-15">Promo Code</h5>
                                <h2 class="mb-3 font-18">{{ $promocodecounts }}</h2>
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
                                <h5 class="font-15">White Label Course</h5>
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
                      aria-selected="true">White Label Course</a>
                    <a class="nav-link" id="c-tab2" data-toggle="tab" href="#c" role="tab"
                      aria-selected="true">Communications</a>
                    <a class="nav-link" id="goal-tab2" data-toggle="tab" href="#goal" role="tab"
                      aria-selected="true">Students</a>
                    <a class="nav-link" id="activity-tab2" data-toggle="tab" href="#activity" role="tab"
                      aria-selected="true">Promo Codes</a>
                  </li>
                </ul>
                <div class="tab-content tab-bordered" id="myTab3Content">
                  <div class="tab-pane fade show active" id="details" role="tabpanel" aria-labelledby="detail-tab2">
                    <div class="row">

                      <div class="col-12 col-md-12 col-lg-5">
                        <div class="card">
                          <div class="card-header">
                            <h4>Main Details:</h4>
                          </div>
                          <div class="card-body">
                            <div class="py-4">
                              <p class="clearfix">
                                <span class="float-left">
                                  Partner Sign-Up:<br>
                                  State:<br>
                                  Brokerage #:
                                </span>
                                <span class="float-right text-muted">
                                  {{ $user->date }}<br>
                                  {{$user->state}}<br>
                                  {{$license->license ?? ''}}
                                </span>
                              </p>
                              <p class="clearfix">
                                <span class="float-left">
                                  Broker First Name:
                                </span>
                                <span class="float-right text-muted">
                                  {{$user->name}}
                                </span>
                              </p>
                              <p class="clearfix">
                                <span class="float-left">
                                  Broker Email:<br>
                                  Broker Mobile Phone:<br>
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
                          <div class="card-header">
                            <h4>Marketing Snapshots</h4>
                          </div>
                          <div class="card-body" style="padding-left: 60px;padding-right: 60px;">
                            <div class="py-4">
                              <p class="clearfix">
                                <span class="float-left">
                                  Referral URL:<br>
                                  Number Of Visits:
                                </span>
                                <span class="float-right text-muted">
                                  {{$user->phone}}<br>
                                  {{$referralCount}}<br>
                                </span>
                              </p>
                              <p class="clearfix">
                                <span class="float-left">
                                  Potential # Of Students:<br>
                                  Active Students:<br>
                                  Inavtive Students:<br>
                                </span>
                                <span class="float-right text-muted">
                                  Last Blast<br>
                                  Active Students:<br>
                                  Inavtive Students:<br>
                                </span>
                              </p>
                              <p class="clearfix">
                                <span class="float-left">
                                  Last Blast:
                                </span>
                                <span class="float-right text-muted">
                                  {{$user->last_login}}
                                </span>
                              </p>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

                  </div>
                  <div class="tab-pane fade show" id="ccp" role="tabpanel" aria-labelledby="ccp-tab2">
                    sds
                  </div>
                  <div class="tab-pane fade show" id="c" role="tabpanel" aria-labelledby="c-tab2">
                    gfvf
                  </div>
                  <div class="tab-pane fade show" id="goal" role="tabpanel" aria-labelledby="goal-tab2">
                    <div class="col-12 col-12 col-md-12 col-lg-12">
                        <div class="card">
                          <div class="card-header" style="display: block;">
                              <h4>Students</h4>
                              <a href="{{ route('students.create') }}" class="btn btn-primary" style="position: absolute; right: 10px; top: 3px;">Add Students</a>
                            </div>
                          <div class="card-body">
                            <div class="table-responsive">
                              <table class="table table-striped" id="table-1">
                                <thead>
                                  <tr>
                                  <th>No</th>
                                  <th>Name</th>
                                  <th>Email</th>
                                  <th>Licence Status</th>
                                  <th>Last Login</th>
                                  <th>Progress</th>
                                  <th>Subscription</th>
                                  <th>Status</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  @foreach ($students as $key => $user)
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
                                      @can('student-edit')
                                        @if($user->status == '0')
                                        <label class="badge badge-primary">Active</label>
                                        @else
                                        <label class="badge badge-danger">Deactive</label>
                                        @endif
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
                  <div class="tab-pane fade show" id="activity" role="tabpanel" aria-labelledby="activity-tab2">
                    <div class="col-12 col-12 col-md-12 col-lg-12">
                        <div class="card">
                            <div class="card-header" style="display: block;">
                              <h4>Promo Code</h4>
                              <a href="{{ route('promocodes.create') }}" class="btn btn-primary" style="position: absolute; right: 10px; top: 3px;">Add Promo Codes</a>
                            </div>
                          <div class="card-body">
                            <div class="table-responsive">
                              <table class="table table-striped" id="table-2">
                                <thead>
                                  <tr>
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>Code</th>
                                    <th>Discount Type</th>
                                    <th>Discount</th>
                                    <th>Status</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  @foreach ($promocodes as $key => $promocode)
                                  <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $promocode->name }}</td>
                                    <td>{{ $promocode->code }}</td>
                                    <td>{{ $promocode->discount_type }}</td>
                                    <td>{{ $promocode->discount }}</td>
                                    <td>
                                      @can('promo-code-edit')
                                        @if($promocode->status == '0')
                                          <label class="badge badge-primary">Active</label>
                                        @else
                                          <label class="badge badge-danger">Deactive</label>
                                        @endif
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
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
</section>
@endsection