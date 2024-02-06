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
                        @if($course->image == '')
                          <img src="{{ asset('/uploads/default/default.png') }}" width="100" height="100" class=" mb-2">
                        @else
                          <img src="{{ asset(''.course->image) }}" width="100" height="100" class="mb-2">
                        @endif
                      </div>
                      @can('course-edit')
                        <a class="btn btn-primary" style="float: right;" href="{{ route('courses.edit',$course->id) }}">Edit</a>
                      @endcan
                      <div class="clearfix"></div>
                      <div class="course-names">
                        <div class="author-box-name">
                          <a href="#">{{$course->name}}</a>
                        </div>
                        <div class="author-box-name">
                          Instructor:<a href="#"> {{$course->user->name ?? ''}}</a>
                        </div>
                        <div class="author-box-job" >
                            @if($course->status == '0')
                              <label class="badge badge-primary">Active</label>
                            @else
                              <label class="badge badge-danger">Deactive</label>
                            @endif
                        </div>
                      </div>
                    </div>
                    <div class="row" style="justify-content: space-around;">
                      <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-xs-12" style="border: 1px solid;">
                        <div class="card-statistic-4">
                          <div class="align-items-center justify-content-between">
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 pr-0 pt-3">
                              <div class="card-content" style="width: 110px;">
                                <h5 class="font-15">Active Students</h5>
                                <h2 class="mb-3 font-18">{{ $studentcounts }}</h2>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-xs-12" style="border: 1px solid;">
                        <div class="card-statistic-4">
                          <div class="align-items-center justify-content-between">
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 pr-0 pt-3">
                              <div class="card-content" style="width: 110px;">
                                <h5 class="font-15">State</h5>
                                <h2 class="mb-3 font-18">
                                  {{ $course->state }}
                                </h2>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-xs-12" style="border: 1px solid;">
                        <div class="card-statistic-4">
                          <div class="align-items-center justify-content-between">
                            <div class="pr-0 pt-3">
                              <div class="card-content">
                                <h5 class="font-15">Last Modified</h5>
                                <h2 class="mb-3 font-18">{{ $course->updated_at }}</h2>
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
                      aria-selected="true">Overview</a>
                    <a class="nav-link" id="ccp-tab2" data-toggle="tab" href="#ccp" role="tab"
                      aria-selected="true">Students</a>
                    <a class="nav-link" id="c-tab2" data-toggle="tab" href="#c" role="tab"
                      aria-selected="true">Content</a>
                    <a class="nav-link" id="goal-tab2" data-toggle="tab" href="#goal" role="tab"
                      aria-selected="true">Reviews</a>
                    <a class="nav-link" id="activity-tab2" data-toggle="tab" href="#activity" role="tab"
                      aria-selected="true">Course Assets</a>
                    <a class="nav-link" id="sm-tab2" data-toggle="tab" href="#sm" role="tab"
                      aria-selected="true">Social Media</a>
                    <a class="nav-link" id="certificates-tab2" data-toggle="tab" href="#certificates" role="tab"
                      aria-selected="true">Certificates</a>
                  </li>
                </ul>
                <div class="tab-content tab-bordered" id="myTab3Content">
                  <div class="tab-pane fade show active" id="details" role="tabpanel" aria-labelledby="detail-tab2">
                    <div class="row">

                      <div class="col-12 col-md-12 col-lg-5">
                        <div class="card">
                          <div class="card-header">
                            <h4>Course Overview:</h4>
                          </div>
                          <div class="card-body">
                            <div class="py-4">
                              <p class="clearfix">
                                <span class="float-left">
                                  Course Description:
                                </span><br>
                                <span class="float-left text-muted">
                                  {{ $course->description }}<br>
                                </span>
                              </p>
                              <p class="clearfix">
                                <span class="float-left">
                                  Course Sub Title:
                                </span><br>
                                <span class="float-left text-muted">
                                  {{$course->sub_title}}
                                </span>
                              </p>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="col-12 col-md-12 col-lg-7">
                        <div class="card">
                          <div class="card-header">
                            <h4>Course Details</h4>
                          </div>
                          <div class="card-body" style="padding-left: 60px;padding-right: 60px;">
                            <div class="py-4">
                              <div class="row">
                                <div class="col-sm-12 col-md-6 col-lg-6">
                                  <p class="clearfix">
                                    <span class="float-left">
                                      Course ID:
                                    </span>
                                    <span class="float-right text-muted">
                                      {{$course->id}}<br>
                                    </span>
                                  </p>
                                  <p class="clearfix">
                                    <span class="float-left">
                                      Course Created:<br>
                                      Final Exam ?:<br>
                                      Lenght:<br>
                                      Modules:<br>
                                      Rating:<br>
                                    </span>
                                    <span class="float-right text-muted">
                                      {{$course->date}}<br>
                                      @if($course->exam == '0')
                                        Yes
                                      @else
                                        No
                                      @endif<br>
                                      {{$course->length}}<br>
                                      {{$course->module}}<br>
                                      Rating
                                    </span>
                                  </p>
                                </div>
                                <div class="col-sm-12 col-md-6 col-lg-6">
                                  <p class="clearfix" style="margin-bottom: 42px;">
                                    <span class="float-left">
                                      
                                    </span>
                                    <span class="float-right text-muted">
                                      
                                    </span>
                                  </p>
                                  <p class="clearfix">
                                    <span class="float-left">
                                      Course Expiration Date:<br>
                                      Interaction:<br>
                                      Credits Earned:<br>
                                      Calculated length:<br>
                                    </span>
                                    <span class="float-right text-muted">
                                      {{$course->expiration_date}}<br>
                                      {{$course->interaction}}<br>
                                      {{$course->credit_earn}}<br>
                                      {{$course->cal_length}}<br>
                                    </span>
                                  </p>
                                </div>
                              </div>
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
                    <ul class="nav nav-tabs" id="myTab2" role="tablist" style="justify-content: space-around;">
                      <li class="nav-item" style="display: flex; flex-wrap: wrap;">
                        <a class="nav-link active" id="module-tab2" data-toggle="tab" href="#module" role="tab"
                          aria-selected="true">Module</a>
                        <a class="nav-link" id="ccp-tab2" data-toggle="tab" href="#min-mod" role="tab"
                          aria-selected="true">Mini Module</a>
                        <a class="nav-link" id="interaction-tab2" data-toggle="tab" href="#interaction" role="tab"
                          aria-selected="true">Interaction</a>
                        <a class="nav-link" id="celebration-tab2" data-toggle="tab" href="#celebration" role="tab"
                          aria-selected="true">Celebration</a>
                        <a class="nav-link" id="exam-tab2" data-toggle="tab" href="#exam" role="tab"
                          aria-selected="true">Exam</a>
                      </li>
                    </ul>

                    <div class="tab-content" id="myTab3Content">
                      <div class="tab-pane fade show active" id="module" role="tabpanel" aria-labelledby="module-tab2">
                        <!-- -->
                        <div class="col-12 col-12 col-md-12 col-lg-12">
                          <div class="card">
                            <div class="card-header" style="display: block;">
                              <h4>Modules</h4>
                                <a href="{{ route('courses.createCourseModule', ['course' => $course->id]) }}" class="btn btn-primary" style="position: absolute; right: 10px; top: 3px;">Add Modules</a>
                            </div>
                            <div class="card-body">
                              <div class="table-responsive">
                                <table class="table table-striped" id="table-1">
                                  <thead>
                                    <tr>
                                    <th>No</th>
                                    <th>Module Name</th>
                                    <th>Module Display Name</th>
                                    <th># Of Mini Modules</th>
                                    <th>Time</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                  @foreach ($minimodules as $key => $minimodule)
                                  <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $minimodule->name }}</td>
                                    <td>{{ $minimodule->display_name }}</td>
                                    <td>{{ $minimodule->discount_type }}</td>
                                    <td>{{ $minimodule->discount }}</td>
                                  </tr>
                                  @endforeach
                                  </tbody>
                                </table>
                              </div>
                            </div>
                          </div>
                        </div>
                        <!-- -->
                      </div>
                      <div class="tab-pane fade show" id="min-mod" role="tabpanel" aria-labelledby="min-mod-tab2">
                        <!-- -->
                        <div class="col-12 col-12 col-md-12 col-lg-12">
                          <div class="card">
                            <div class="card-header" style="display: block;">
                              <h4>Mini Modules</h4>
                                <a href="{{ route('courses.createCourseMiniModule', ['course' => $course->id]) }}" class="btn btn-primary" style="position: absolute; right: 10px; top: 3px;">Add Mini Modules</a>
                            </div>
                            <div class="card-body">
                              <div class="table-responsive">
                                <table class="table table-striped" id="table-2">
                                  <thead>
                                    <tr>
                                    <th>No</th>
                                    <th>Module ID</th>
                                    <th>Name</th>
                                    <th>Display Name</th>
                                    <th>Interaction</th>
                                    <th>Time</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                  @foreach ($minimodules as $key => $minimodule)
                                  <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $minimodule->module->name ?? '' }}</td>
                                    <td>{{ $minimodule->name }}</td>
                                    <td>{{ $minimodule->display_name }}</td>
                                    <td>{{ $minimodule->discount_type }}</td>
                                    <td>{{ $minimodule->discount }}</td>
                                  </tr>
                                  @endforeach
                                  </tbody>
                                </table>
                              </div>
                            </div>
                          </div>
                        </div>
                        <!-- -->
                      </div>
                      <div class="tab-pane fade show" id="interaction" role="tabpanel" aria-labelledby="interaction-tab2">
                        <!-- -->
                        <div class="col-12 col-12 col-md-12 col-lg-12">
                          <div class="card">
                            <div class="card-header" style="display: block;">
                              <h4>Interactions</h4>
                                <a href="{{ route('courses.createCourseInteraction', ['course' => $course->id]) }}" class="btn btn-primary" style="position: absolute; right: 10px; top: 3px;">Add Interactions</a>
                            </div>
                            <div class="card-body">
                              <div class="table-responsive">
                                <table class="table table-striped" id="table-3">
                                  <thead>
                                    <tr>
                                    <th>No</th>
                                    <th>Mini</th>
                                    <th>Mod</th>
                                    <th>Badge</th>
                                    <th>Type</th>
                                    <th>Interaction Name</th>
                                    <th>Time</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                  @foreach ($interactions as $key => $interactions)
                                  <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $interactions->minimodule->name ?? '' }}</td>
                                    <td>{{ $interactions->module->name ?? '' }}</td>
                                    <td>{{ $interactions->badge }}</td>
                                    <td>{{ $interactions->type }}</td>
                                    <td>{{ $interactions->name }}</td>
                                    <td>{{ $interactions->time }}</td>
                                  </tr>
                                  @endforeach
                                  </tbody>
                                </table>
                              </div>
                            </div>
                          </div>
                        </div>
                        <!-- -->
                      </div>
                      <div class="tab-pane fade show" id="celebration" role="tabpanel" aria-labelledby="celebration-tab2">
                        <!-- -->
                        <div class="col-12 col-12 col-md-12 col-lg-12">
                          <div class="card">
                            <div class="card-header" style="display: block;">
                              <h4>Celebrations</h4>
                                <a href="{{ route('courses.createCourseCelebration', ['course' => $course->id]) }}" class="btn btn-primary" style="position: absolute; right: 10px; top: 3px;">Add Celebrations</a>
                            </div>
                            <div class="card-body">
                              <div class="table-responsive">
                                <table class="table table-striped" id="table-4">
                                  <thead>
                                    <tr>
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>Type</th>
                                    <th>Where</th>
                                    <th>Placement</th>
                                    <th>Status</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                  @foreach ($celebrations as $key => $celebration)
                                  <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $celebration->name }}</td>
                                    <td>{{ $celebration->type }}</td>
                                    <td>{{ $celebration->where }}</td>
                                    <td>{{ $celebration->placement }}</td>
                                    <td>
                                      @if($celebration->status == '0')
                                      <label class="badge badge-primary">Active</label>
                                      @else
                                      <label class="badge badge-danger">Deactive</label>
                                      @endif
                                    </td>
                                  </tr>
                                  @endforeach
                                  </tbody>
                                </table>
                              </div>
                            </div>
                          </div>
                        </div>
                        <!-- -->
                      </div>

                      <div class="tab-pane fade show" id="exam" role="tabpanel" aria-labelledby="exam-tab2">
                        <!-- -->
                        <div class="col-12 col-12 col-md-12 col-lg-12">
                          <div class="card">
                            <div class="card-header" style="display: block;">
                              <h4>Exams</h4>
                                <a href="{{ route('courses.createCourseExam', ['course' => $course->id]) }}" class="btn btn-primary" style="position: absolute; right: 10px; top: 3px;">Add Exams</a>
                            </div>
                            <div class="card-body">
                              <div class="table-responsive">
                                <table class="table table-striped" id="table-5">
                                  <thead>
                                    <tr>
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>Type</th>
                                    <th>Where</th>
                                    <th>Placement</th>
                                    <th>Status</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                  @foreach ($exams as $key => $exam)
                                  <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $exam->name }}</td>
                                    <td>{{ $exam->type }}</td>
                                    <td>{{ $exam->where }}</td>
                                    <td>{{ $exam->placement }}</td>
                                    <td>
                                      @if($exam->status == '0')
                                      <label class="badge badge-primary">Active</label>
                                      @else
                                      <label class="badge badge-danger">Deactive</label>
                                      @endif
                                    </td>
                                  </tr>
                                  @endforeach
                                  </tbody>
                                </table>
                              </div>
                            </div>
                          </div>
                        </div>
                        <!-- -->
                      </div>

                    </div>
                  </div>
                  <div class="tab-pane fade show" id="goal" role="tabpanel" aria-labelledby="goal-tab2">
                    sps
                  </div>
                  <div class="tab-pane fade show" id="activity" role="tabpanel" aria-labelledby="activity-tab2">
                    <div class="col-12 col-md-12 col-lg-12">
                      <div class="card">
                        <div class="card-header">
                          <h4>Thumbnails:</h4>
                        </div>
                        <div class="card-body">
                          <div class="row">
                            <div class="col-12 col-md-4 col-lg-4">
                              <div class="profile-image">
                                @if($course->image == '')
                                  <div class="profileImagesUploader">
                                    <label class="cabinet">
                                      <img src="{{ asset('/uploads/default/default.png') }}" class="img-responsive rounded-circle" width="80" height="80" id="item-img-output" />
                                        <input type="file" class="item-img file center-block" name="image" onchange="readURL(this);"/>
                                    </label>                                        
                                  </div>
                                @else
                                  <div class="profileImagesUploader">
                                    <label class="cabinet">
                                      <img src="{{ asset(''.course->image) }}" width="80" height="80" class="img-responsive rounded-circle" width="80" height="80" id="item-img-output2" />
                                      <input type="file" class="item-img file center-block" name="image" onchange="readURL2(this);"/>
                                    </label>                                        
                                  </div>
                                @endif
                                <p class="clearfix">
                                  <span class="float-left">
                                    Small Thumbnail:
                                  </span><br>
                                  <span class="float-left text-muted">
                                    Image size: 100 x 100 px
                                  </span><br>
                                  <span class="float-left text-muted">
                                    <a href="#" class="btn btn-primary">Update</a>
                                  </span>
                                </p>
                              </div>
                            </div>

                            <div class="col-12 col-md-4 col-lg-4">
                              <div class="profile-image">
                                @if($course->image == '')
                                  <div class="profileImagesUploader">
                                    <label class="cabinet">
                                      <img src="{{ asset('/uploads/default/default.png') }}" class="img-responsive rounded-circle" width="110" height="110" id="item-img-output3" />
                                        <input type="file" class="item-img file center-block" name="image" onchange="readURL3(this);"/>
                                    </label>                                        
                                  </div>
                                @else
                                  <div class="profileImagesUploader">
                                    <label class="cabinet">
                                      <img src="{{ asset(''.course->image) }}" class="img-responsive rounded-circle" width="110" height="110" id="item-img-output4">
                                        <input type="file" class="item-img file center-block" name="image" onchange="readURL4(this);"/>
                                    </label>                                        
                                  </div>
                                @endif
                                <p class="clearfix">
                                  <span class="float-left">
                                    Medium Thumbnail:
                                  </span><br>
                                  <span class="float-left text-muted">
                                    Image size: 300 x 300 px
                                  </span><br>
                                  <span class="float-left text-muted">
                                    <a href="#" class="btn btn-primary">Update</a>
                                  </span>
                                </p>
                              </div>
                            </div>

                            <div class="col-12 col-md-4 col-lg-4">
                              <div class="profile-image">
                                @if($course->image == '')
                                  <div class="profileImagesUploader">
                                    <label class="cabinet">
                                      <img src="{{ asset('/uploads/default/default.png') }}" class="img-responsive rounded-circle" width="140" height="140" id="item-img-output5" />
                                      <input type="file" class="item-img file center-block" name="image" onchange="readURL5(this);"/>
                                    </label>                                        
                                  </div>
                                @else
                                  <div class="profileImagesUploader">
                                    <label class="cabinet">
                                      <img src="{{ asset(''.course->image) }}" width="140" height="140" class="img-responsive rounded-circle" id="item-img-output6">
                                        <input type="file" class="item-img file center-block" name="image" onchange="readURL6(this);"/>
                                    </label>                                        
                                  </div>
                                @endif
                                <p class="clearfix">
                                  <span class="float-left">
                                    Large Thumbnail:
                                  </span><br>
                                  <span class="float-left text-muted">
                                    Image size: 400 x 400 px
                                  </span><br>
                                  <span class="float-left text-muted">
                                    <a href="#" class="btn btn-primary">Update</a>
                                  </span>
                                </p>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="col-12 col-md-12 col-lg-12">
                      <div class="card">
                        <div class="card-header">
                          <h4>Supplemental Assets:</h4>
                        </div>
                        <div class="card-body">
                          <div class="row">
                            <div class="col-12 col-md-12 col-lg-12">
                              <div class="profile-image">
                                @if($course->image == '')
                                  <!-- <img src="{{ asset('/uploads/default/default.png') }}" class="img-responsive rounded-circle" width="80" height="80" id="item-img-output" /> -->
                                  <input type="file" class="item-img file center-block" name="image"/>
                                @else
                                  <img src="{{ asset(''.course->image) }}" width="80" height="80" class="img-responsive rounded-circle" width="80" height="80" id="item-img-output2" />
                                  <input type="file" class="item-img file center-block" name="image"/>
                                @endif
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

                  </div>

                  <div class="tab-pane fade show" id="sm" role="tabpanel" aria-labelledby="sm-tab2">
                    dpsod
                  </div>
                  <div class="tab-pane fade show" id="certificates" role="tabpanel" aria-labelledby="certificates-tab2">
                    dfh
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

<script>
  function readURL(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function (e) {
        $('#item-img-output')
        .attr('src', e.target.result);
      };
      reader.readAsDataURL(input.files[0]);
    }
  }
</script>

<script>
  function readURL2(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function (e) {
        $('#item-img-output2')
        .attr('src', e.target.result);
      };
      reader.readAsDataURL(input.files[0]);
    }
  }
</script>

<script>
  function readURL3(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function (e) {
        $('#item-img-output3')
        .attr('src', e.target.result);
      };
      reader.readAsDataURL(input.files[0]);
    }
  }
</script>

<script>
  function readURL4(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function (e) {
        $('#item-img-output4')
        .attr('src', e.target.result);
      };
      reader.readAsDataURL(input.files[0]);
    }
  }
</script>

<script>
  function readURL5(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function (e) {
        $('#item-img-output5')
        .attr('src', e.target.result);
      };
      reader.readAsDataURL(input.files[0]);
    }
  }
</script>

<script>
  function readURL6(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function (e) {
        $('#item-img-output6')
        .attr('src', e.target.result);
      };
      reader.readAsDataURL(input.files[0]);
    }
  }
</script>

@endpush