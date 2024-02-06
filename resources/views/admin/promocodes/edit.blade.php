@extends('admin.layouts.master')

@section('title')
    Edit Promo Code 
@endsection

@section('content')
<section class="section">
    <div class="section-body">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <x-cardheader title="Edit Promo Code" /> 
              <x-form action="{{ route('promocodes.update', $promocode->id) }}" method="patch">
                <div class="card-body">
                  <x-forms.input title="Name" type="text" name="name" value="{{ $promocode->name }}" placeholder="Name" />
                  <x-forms.input title="Code" type="text" name="code" value="{{ $promocode->code }}" placeholder="Code" />
                  <x-forms.input title="Discount Type" type="text" name="discount_type" value="{{ $promocode->discount_type }}" placeholder="Discount Type" />
                  <x-forms.input title="Discount" type="text" name="discount" value="{{ $promocode->discount }}" placeholder="Discount" />
                  <x-forms.primary-button>Update</x-forms.primary-button>
                </div>
              </x-form>
            </div>
          </div>
        </div>
    </div>
</section>
@endsection