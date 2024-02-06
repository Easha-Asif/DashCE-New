@extends('admin.layouts.master')

@section('title')
    Create Interaction 
@endsection

@section('content')
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <x-cardheader title="Create Interaction" /> 
                        <x-form action="{{ route('interactions.store') }}" method="POST">
                        <div class="card-body">
                            <x-forms.input title="Interaction Name" type="text" name="name" placeholder="Interaction Name" />
                            <x-forms.input title="Badge" type="text" name="badge" placeholder="Badge" />
                            <x-forms.input title="Type" type="text" name="type" placeholder="Type" />
                            <x-forms.input title="Time" type="text" name="time" placeholder="Time" />

                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3 vali-field">Mini Module</label>
                                <div class="col-sm-12 col-md-7">
                                    <select name="mini_module_id" class="form-control selectric" id="mini_module_id">
                                    <option value="">Select Mini Module</option>
                                        @foreach ($minimodules as $module)
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
