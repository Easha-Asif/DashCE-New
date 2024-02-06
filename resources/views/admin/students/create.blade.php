@extends('admin.layouts.master')

@section('title')
      Create Student
  @endsection

@section('content')
<section class="section">
    <div class="section-body">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <x-cardheader title="Create Student" />
              <x-form action="{{ route('students.store') }}" method="POST" enctype="multipart/form-data">
                <div class="card-body">
                <x-forms.input title="Name" type="text" name="name" placeholder="Name" />
                <x-forms.input title="Email" type="email" name="email" placeholder="Email" />
                <x-forms.input title="Phone" type="number" name="phone" placeholder="Phone" />
                <x-forms.input title="Password" type="password" name="password" placeholder="Password" />
                <x-forms.input title="Confirm Password" type="password" name="confirm-password" placeholder="Confirm Password" />
                <x-forms.input title="Referring Url" type="text" name="referring_url" placeholder="Referring Url" />

                <div class="form-group row mb-4">
                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3 vali-field">License</label>
                  <div class="col-sm-12 col-md-7">
                      <select name="license_id" class="form-control selectric" id="license_id">
                      <option value="">Select license</option>
                          @foreach ($licenses as $license)
                              <option value="{{ $license->id }}">{{ $license->name }}</option>
                          @endforeach
                      </select>
                  </div>
                </div>

                <div class="form-group row mb-4">
                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Role</label>
                  <div class="col-sm-12 col-md-7">
                    {!! Form::select('roles[]', $roles,[], array('class' => 'form-control selectric')) !!}
                  </div>
                </div>
                <x-forms.primary-button>Submit</x-forms.primary-button>            
                </div>
              </x-form>
            </div>
          </div>
        </div>
    </div>
</section>
@endsection