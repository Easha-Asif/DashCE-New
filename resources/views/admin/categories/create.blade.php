@extends('admin.layouts.master')

@section('title')
    Create Course Categories 
@endsection

@section('content')
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <x-cardheader title="Create Course Categories" /> 
                        <x-form action="{{ route('coursecategories.store') }}" method="POST">
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
