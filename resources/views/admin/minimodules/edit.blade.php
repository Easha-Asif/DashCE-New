@extends('admin.layouts.master')

@section('title')
    Edit Mini Module
@endsection

@section('content')
<section class="section">
    <div class="section-body">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <x-cardheader title="Edit Mini Module" /> 
              <x-form action="{{ route('minimodules.update', $minimodule->id) }}" method="patch">
                <div class="card-body">
                  <x-forms.input title="Name" type="text" name="name" value="{{ $minimodule->name }}" placeholder="Name" />
                  <x-forms.input title="Module Display Name" type="text" name="display_name" value="{{ $minimodule->display_name }}" placeholder="Module Display Name" />

                  <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3 vali-field">Module</label>
                    <div class="col-sm-12 col-md-7">
                        <select name="module_id" class="form-control selectric" id="module_id">
                        <option value="">Select Module</option>
                            @foreach ($modules as $module)
                              <option value="{{ $module->id }}" {{ ($module->id == $minimodule->module_id) ? 'selected' : null }}>{{ $module->name }}</option>
                            @endforeach
                        </select>
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