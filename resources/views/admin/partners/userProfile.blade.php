@extends('admin.layouts.master')

@section('title')
    Create Content 
@endsection

@section('content')


      <section class="section">
        <div class="section-body">
          <div class="row mt-sm-4">
            <div class="col-12 col-md-12 col-lg-4">
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
                    <div class="author-box-job">
                      @if(!empty($user->getRoleNames()))
                        @foreach($user->getRoleNames() as $v)
                           <label class="badge badge-success">{{ $v }}</label>
                        @endforeach
                      @endif
                    </div>
                  </div>
                </div>
              </div>
              <div class="card">
                <div class="card-header">
                  <h4>Personal Details</h4>
                </div>
                <div class="card-body">
                  <div class="py-4">
                    <p class="clearfix">
                      <span class="float-left">
                        Phone
                      </span>
                      <span class="float-right text-muted">
                        {{$user->phone}}
                      </span>
                    </p>
                    <p class="clearfix">
                      <span class="float-left">
                        Mail
                      </span>
                      <span class="float-right text-muted">
                        {{$user->email}}
                      </span>
                    </p>
                    <p class="clearfix">
                      <span class="float-left">
                        About
                      </span>
                      <span class="float-right text-muted">
                        {{$user->about}}
                      </span>
                    </p>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-12 col-md-12 col-lg-8">
              <div class="card">
                <div class="padding-20">
                  <ul class="nav nav-tabs" id="myTab2" role="tablist">
                    <li class="nav-item">
                      <a class="nav-link active" id="profile-tab2" data-toggle="tab" href="#settings" role="tab"
                        aria-selected="true">Setting</a>
                    </li>
                  </ul>
                  <div class="tab-content tab-bordered" id="myTab3Content">
                    <div class="tab-pane fade show active" id="settings" role="tabpanel" aria-labelledby="profile-tab2">
                      <x-form action="{{ route('users.updateProfile', $user->id) }}" method="patch" enctype="multipart/form-data">
                        <div class="card-header">
                          <h4>Edit Profile</h4>
                        </div>
                        <div class="card-body">
                          <div class="row">
                            <div class="form-group col-md-12 col-12">
                              <label>First Name</label>
                              <input type="text" name="name" class="form-control" value="{{ $user->name }}">
                              <div class="invalid-feedback">
                                Please fill in the first name
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="form-group col-md-7 col-12">
                              <label>Email</label>
                              <input type="email" class="form-control" value="{{ $user->email }}">
                              <div class="invalid-feedback">
                                Please fill in the email
                              </div>
                            </div>
                            <div class="form-group col-md-5 col-12">
                              <label>Phone</label>
                              <input type="tel" class="form-control" value="{{ $user->phone }}">
                            </div>
                          </div>
                          <div class="row">
                            <div class="form-group col-12">
                              <label>Bio</label>
                              <textarea
                                class="form-control summernote-simple">{{ $user->about }}</textarea>
                            </div>
                          </div>
                          <div class="form-group col-md-5 col-12">
                            <label>image</label>
                             <div class="profileImagesUploader">
                              <label class="cabinet">
                                <img src="https://i.imgur.com/TVZHkOZ.jpg" class="img-responsive img-thumbnail" id="item-img-output" />
                                  <figcaption><i class="fa fa-camera"></i></figcaption>
                                 <input type="file" class="item-img file center-block" name="image" onchange="readURL(this);"/>
                              </label>                                        
                              </div>
                          </div>
                        <div class="card-footer text-right">
                          <button class="btn btn-primary">Save Changes</button>
                        </div>
                      </x-form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      
@endsection
