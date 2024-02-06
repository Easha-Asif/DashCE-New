@extends('admin.layouts.master')

@section('title')
    Create Promo Code 
@endsection

@section('content')
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <x-cardheader title="Create Promo Code" /> 
                        <x-form action="{{ route('promocodes.store') }}" method="POST">
                        <div class="card-body">
                            <x-forms.input title="Name" type="text" name="name" placeholder="Name" />
                            <x-forms.input title="Code" type="text" name="code" placeholder="Code" />
                            <x-forms.input title="Discount Type" type="text" name="discount_type" placeholder="Discount Type" />
                            <x-forms.input title="Discount" type="text" name="discount" placeholder="Discount" />
                            <x-forms.primary-button>Submit</x-forms.primary-button>
                        </div>
                        </x-form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
