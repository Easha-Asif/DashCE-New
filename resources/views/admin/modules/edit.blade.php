@extends('admin.layouts.master')

@section('title')
    Edit Module
@endsection

@section('content')
<section class="section">
    <div class="section-body">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <x-cardheader title="Edit Module" /> 
              <x-form action="{{ route('modules.update', $module->id) }}" method="patch">
                <div class="card-body">
                  <x-forms.input title="Name" type="text" name="name" value="{{ $module->name }}" placeholder="Name" />
                  <x-forms.input title="Module Display Name" type="text" name="display_name" value="{{ $module->display_name }}" placeholder="Module Display Name" />
                  <x-forms.primary-button>Update</x-forms.primary-button>
                </div>
              </x-form>
            </div>
          </div>
        </div>
    </div>
</section>
@endsection