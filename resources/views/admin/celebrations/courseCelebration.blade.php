@extends('admin.layouts.master')

@section('title')
    Create Celebration 
@endsection

@section('content')
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <x-cardheader title="Create Celebration" /> 
                        <x-form action="{{ route('celebrations.store') }}" method="POST">
                        <div class="card-body">
                            <x-forms.input title="Name" type="text" name="name" placeholder="Name" />
                            <x-forms.input title="Placement" type="text" name="placement" placeholder="Placement" />
                            <x-forms.input title="Where" type="text" name="where" placeholder="Where" />
                            <x-forms.input title="Type" type="text" name="type" placeholder="Type" />
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
