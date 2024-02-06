@extends('admin.layouts.master')

@section('title')
    Create Mini Module 
@endsection

@section('content')
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <x-cardheader title="Create Mini Module" /> 
                        <x-form action="{{ route('minimodules.store') }}" method="POST">
                        <div class="card-body">
                            <x-forms.input title="Module Name" type="text" name="name" placeholder="Module Name" />
                            <x-forms.input title="Module Display Name" type="text" name="display_name" placeholder="Module Display Name" />

                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3 vali-field">Module</label>
                                <div class="col-sm-12 col-md-7">
                                    <select name="module_id" class="form-control selectric" id="category_id">
                                    <option value="">Select Module</option>
                                        @foreach ($modules as $module)
                                            <option value="{{ $module->id }}">{{ $module->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <input type="hidden" name="course_id" value="{{ request('course') }}">
                            <x-forms.primary-button>Submit</x-forms.primary-button>
                        </div>
                        </x-form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
