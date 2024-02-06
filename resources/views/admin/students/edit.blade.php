@extends('admin.layouts.master')

@section('title')
      Edit User 
  @endsection

@section('content')
<section class="section">
    <div class="section-body">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <x-cardheader title="Edit User" />
              <x-form action="{{ route('students.update', $user->id) }}" method="patch" enctype="multipart/form-data">
                <div class="card-body">
                <x-forms.input title="Name" type="text" name="name" value="{{ $user->name }}" placeholder="Name" />
                <x-forms.input title="Email" type="text" name="email" value="{{ $user->email }}" placeholder="Email" />
                <x-forms.input title="Phone" type="number" name="phone" value="{{ $user->phone }}" placeholder="Phone" />
                <x-forms.input title="Referral Url" type="text" name="referral_url" value="{{ $user->referral_url }}" placeholder="Referral Url" />
                <x-forms.input title="Referring Url" type="text" name="referring_url" value="{{ $user->referring_url }}" placeholder="Referring Url" />
                <x-forms.input title="Password" type="password" name="password" placeholder="Password" />

                <div class="form-group row mb-4">
                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3 vali-field">License</label>
                  <div class="col-sm-12 col-md-7">
                      <select name="license_id" class="form-control selectric" id="license_id">
                      <option value="">Select License</option>
                          @foreach ($licenses as $license)
                            <option value="{{ $license->id }}" {{ ($license->id == $license->license_id) ? 'selected' : null }}>{{ $license->name }}</option>
                          @endforeach
                      </select>
                  </div>
                </div>

                <x-forms.input title="Confirm Password" type="password" name="confirm-password" placeholder="Confirm Password" />
                <div class="form-group row mb-4">
                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Select Role</label>
                  <div class="col-sm-12 col-md-7">
                    {!! Form::select('roles[]', $roles,$userRole, array('class' => 'form-control selectric')) !!}
                  </div>
                </div>
                <x-forms.primary-button>Update</x-forms.primary-button>
                </div>
              </x-form>
            </div>
          </div>
        </div>
    </div>
</section>
@endsection