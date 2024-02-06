@extends('admin.layouts.master')

@section('title')
    Edit License 
@endsection

@section('content')
<section class="section">
    <div class="section-body">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <x-cardheader title="Edit License" /> 
              <x-form action="{{ route('licenses.update', $license->id) }}" method="patch">
                <div class="card-body">
                  <x-forms.input title="Name" type="text" name="name" value="{{ $license->name }}" placeholder="Name" />
                  <x-forms.input title="State" type="text" name="state" value="{{ $license->state }}" placeholder="State" />
                  <x-forms.input title="Type" type="text" name="type" value="{{ $license->type }}" placeholder="Type" />
                  <x-forms.input title="Expiration" type="date" name="expiration_date" value="{{ $license->expiration_date }}" placeholder="Expiration" />
                  <x-forms.input title="License" type="text" name="license" value="{{ $license->license }}" placeholder="License" />

                  <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3 vali-field">Brokerage</label>
                    <div class="col-sm-12 col-md-7">
                        <select name="Brokerage_id" class="form-control selectric" id="Brokerage_id">
                        <option value="">Select Brokerage</option>
                            @foreach ($brokerages as $brokerage)
                              <option value="{{ $brokerage->id }}" data-type="{{ $brokerage->name }}" {{ ($brokerage->id == $license->Brokerage_id) ? 'selected' : null }}>{{ $brokerage->name }}</option>
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