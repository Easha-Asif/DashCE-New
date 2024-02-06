@extends('admin.layouts.master')

@section('title')
      Change User Password
  @endsection

@section('content')
<section class="section">
    <div class="section-body">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <x-cardheader title="Change User Password" />
              <x-form action="{{ route('users.updatePassword') }}" method="POST">
                <div class="card-body">
                <x-forms.input title="Old Password" type="text" name="old_password" placeholder="Old Password" />
                <x-forms.input title="New Password" type="text" name="password" placeholder="New Password" /> 
                <x-forms.input title="Confirm Password" type="text" name="confirm-password" placeholder="Confirm Password" />
                <x-forms.primary-button>Submit</x-forms.primary-button>            
                </div>
              </x-form>
            </div>
          </div>
        </div>
    </div>
</section>
@endsection