@extends('admin.layouts.master')

@section('title')
    Create Module 
@endsection

@section('content')
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <x-cardheader title="Create Module" /> 
                        <x-form action="{{ route('modules.store') }}" method="POST">
                        <div class="card-body">
                            <x-forms.input title="Module Name" type="text" name="name" placeholder="Module Name" />
                            <x-forms.input title="Module Display Name" type="text" name="display_name" placeholder="Module Display Name" />
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
