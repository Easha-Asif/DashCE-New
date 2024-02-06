@extends('admin.layouts.master')

@section('title')
      Edit Permission 
  @endsection

@section('content')
<section class="section">
    <div class="section-body">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <x-cardheader title="Edit Permission" />
              <x-form action="{{ route('permissions.update', $permission->id) }}" method="patch">                
                <input type="hidden" name="guard_name" value="{{ $permission->guard_name }}">
                <div class="card-body">
                <x-forms.input title="Name" type="text" name="name" value="{{ $permission->name }}" placeholder="Name" />
                <x-forms.primary-button>Update</x-forms.primary-button>
              </div>
              </x-form>
            </div>
          </div>
        </div>
    </div>
</section>
@endsection