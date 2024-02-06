@extends('admin.layouts.master')

@section('title')
    Edit Content 
@endsection

@section('content')
<section class="section">
    <div class="section-body">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <x-cardheader title="Edit Content" /> 
              <x-form action="{{ route('contents.update', $content->id) }}" method="patch">
                <div class="card-body">
                  <x-forms.input title="Name" type="text" name="name" value="{{ $content->name }}" placeholder="Name" />
                  <x-forms.input title="Value" type="text" name="value" value="{{ $content->value }}" placeholder="Value" />
                  <x-forms.primary-button>Update</x-forms.primary-button>
                </div>
              </x-form>
            </div>
          </div>
        </div>
    </div>
</section>
@endsection