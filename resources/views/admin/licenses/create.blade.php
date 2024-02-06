@extends('admin.layouts.master')

@section('title')
    Create License 
@endsection

@section('content')
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <x-cardheader title="Create License" /> 
                        <x-form action="{{ route('licenses.store') }}" method="POST">
                        <div class="card-body">
                            <x-forms.input title="Name" type="text" name="name" placeholder="Name" />
                            <x-forms.input title="State" type="text" name="state" placeholder="State" />
                            <x-forms.input title="Type" type="text" name="type" placeholder="Type" />
                            <x-forms.input title="Expiration" type="date" name="expiration_date" placeholder="Expiration" />
                            <x-forms.input title="License" type="text" name="license" placeholder="License" />
                            
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3 vali-field">Brokerage</label>
                                <div class="col-sm-12 col-md-7">
                                    <select name="Brokerage_id" class="form-control selectric" id="Brokerage_id">
                                    <option value="">Select Brokerage</option>
                                        @foreach ($brokerages as $brokerage)
                                            <option value="{{ $brokerage->id }}">{{ $brokerage->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <x-forms.primary-button>Submit</x-forms.primary-button>
                        </div>
                        </x-form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
