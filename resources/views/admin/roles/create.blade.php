@extends('admin.layouts.master')

@section('title')
      Create Role
  @endsection

@section('content')
<section class="section">
    <div class="section-body">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <x-cardheader title="Create Role" />
              <x-form action="{{ route('roles.store') }}" method="POST">
                <div class="card-body">
                <div class="form-group row mb-4">
                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Role Name</label>
                  <div class="col-sm-12 col-md-7">
                    {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
                  </div>
                </div>

                <table class="table table-bordered table-striped text-center mb-3 table-responsive-xl">
                    <thead>
                    <tr>
                        <th>Model</th>
                        <th>List</th>
                        <th>Create</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                    </thead>
                    <tbody>
                      @foreach($resources as $resource)
                      <tr>
                      <td>{{ ucwords(str_replace('-', ' ', $resource)) }}</td>
                        @foreach($actions as $action)
                        <td>
                            <div class="pretty p-icon p-jelly p-round p-bigger">
                              <?php
                                  // Construct the expected permission name
                                  $permissionName = "{$resource}-{$action}";
                                  // Check if the permission exists
                                  $hasPermission = $permissions->contains('name', $permissionName);
                                  ?>
                              @if($hasPermission)
                                {{ Form::checkbox("permission[{$permissionName}]", "{$permissionName}") }}
                                <div class="state p-info">
                                    <i class="icon material-icons">done</i>
                                    <label>{{ ucfirst($action) }}</label>
                                </div>
                              @else
                              <!-- Display a message or placeholder for permissions that do not exist -->
                              <span>None</span>
                              @endif
                            </div>
                        </td>
                        @endforeach
                      </tr>
                      @endforeach
                    </tbody>
                </table>


                <div class="form-group row mb-4">
                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                  <div class="col-sm-12 col-md-7">
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
                </div>
              </div>
              </x-form>
            </div>
          </div>
        </div>
    </div>
</section>
@endsection