@extends('admin.layouts.master')

@section('title')
      Create Permission
  @endsection

@section('content')
<section class="section">
    <div class="section-body">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <x-cardheader title="Create Permission" /> 
              <x-form action="{{ route('permissions.store') }}" method="POST">
                <input type="hidden" name="guard_name" value="web">
                <div class="card-body">
                  <x-forms.input title="Name" type="text" name="name" placeholder="Name" />
                  <x-forms.primary-button>Submit</x-forms.primary-button>
                </div>
              </x-form>
            </div>
          </div>
        </div>
    </div>
</section>
@endsection