@extends('admin.layouts.master')

@section('title')
    Edit Exam
@endsection

@section('content')
<section class="section">
    <div class="section-body">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <x-cardheader title="Edit Exam" /> 
              <x-form action="{{ route('exams.update', $exam->id) }}" method="patch">
                <div class="card-body">
                  <x-forms.input title="Name" type="text" name="name" value="{{ $exam->name }}" placeholder="Name" />
                  <x-forms.input title="Placement" type="text" name="placement" value="{{ $exam->placement }}" placeholder="Placement" />
                  <x-forms.input title="Where" type="text" name="where" value="{{ $exam->where }}" placeholder="Where" />
                  <x-forms.input title="Type" type="text" name="type" value="{{ $exam->type }}" placeholder="Type" />
                  <x-forms.primary-button>Update</x-forms.primary-button>
                </div>
              </x-form>
            </div>
          </div>
        </div>
    </div>
</section>
@endsection