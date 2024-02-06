@extends('admin.layouts.master')

@section('title')
    Create Content 
@endsection

@section('content')
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <x-cardheader title="Create Content" /> 
                        <x-form action="{{ route('contents.store') }}" method="POST">
                        <div class="card-body">
                            <x-forms.input title="Name" type="text" name="name" placeholder="Name" />
                            <x-forms.input title="Value" type="text" name="value" placeholder="Value" />
                            <x-forms.primary-button>Submit</x-forms.primary-button>
                        </div>
                        </x-form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
