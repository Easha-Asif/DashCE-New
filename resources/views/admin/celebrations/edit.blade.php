@extends('admin.layouts.master')

@section('title')
    Edit Celebration
@endsection

@section('content')
<section class="section">
    <div class="section-body">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <x-cardheader title="Edit Celebration" /> 
              <x-form action="{{ route('celebrations.update', $celebration->id) }}" method="patch">
                <div class="card-body">
                  <x-forms.input title="Name" type="text" name="name" value="{{ $celebration->name }}" placeholder="Name" />
                  <x-forms.input title="Placement" type="text" name="placement" value="{{ $celebration->placement }}" placeholder="Placement" />
                  <x-forms.input title="Where" type="text" name="where" value="{{ $celebration->where }}" placeholder="Where" />
                  <x-forms.input title="Type" type="text" name="type" value="{{ $celebration->type }}" placeholder="Type" />
                  <x-forms.primary-button>Update</x-forms.primary-button>
                </div>
              </x-form>
            </div>
          </div>
        </div>
    </div>
</section>
@endsection