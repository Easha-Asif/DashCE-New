@extends('admin.layouts.master')

@section('title')
    Edit Course 
@endsection

@section('content')
<section class="section">
    <div class="section-body">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <x-cardheader title="Edit Course" /> 
              <x-form action="{{ route('courses.update', $course->id) }}" method="patch">
                <div class="card-body">
                  <x-forms.input title="Name" type="text" name="name" value="{{ $course->name }}" placeholder="Name" />
                  <x-forms.input title="State" type="text" name="state" value="{{ $course->state }}" placeholder="State" />
                  <x-forms.input title="Renewal Date" type="date" name="renewal_date" value="{{ $course->renewal_date }}" placeholder="Renewal Date" />
                  <x-forms.input title="Expiration" type="date" name="expiration_date" value="{{ $course->expiration_date }}" placeholder="Expiration" />
                  <x-forms.input title="Interaction" type="number" name="interaction" value="{{ $course->interaction }}" placeholder="Interaction" />
                  <x-forms.input title="Length" type="text" name="length" value="{{ $course->length }}" placeholder="Length" />
                  <x-forms.input title="Credit Earn" type="number" name="credit_earn" value="{{ $course->credit_earn }}" placeholder="Credit Earn" />
                  <x-forms.input title="Module" type="number" name="module" value="{{ $course->module }}" placeholder="Module" />
                  <x-forms.input title="Calculated Length" type="text" name="cal_length" value="{{ $course->cal_length }}" placeholder="Calculated Length" />

                  <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3 vali-field">Categories</label>
                    <div class="col-sm-12 col-md-7">
                        <select name="category_id" class="form-control selectric" id="category_id">
                        <option value="">Select Categories</option>
                            @foreach ($coursecategories as $coursecategory)
                              <option value="{{ $coursecategory->id }}" {{ ($coursecategory->id == $course->category_id) ? 'selected' : null }}>{{ $coursecategory->name }}</option>
                            @endforeach
                        </select>
                    </div>
                  </div>

                  <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3 description">Description</label>
                    <div class="col-sm-12 col-md-7">
                      <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="5" placeholder="Description (Optional)">{{ $course->description }}</textarea>
                    </div>
                  </div>

                  <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3 description">Sub Title</label>
                    <div class="col-sm-12 col-md-7">
                      <textarea class="form-control" name="sub_title" id="exampleFormControlTextarea1" rows="5" placeholder="Sub Title (Optional)">{{ $course->sub_title }}</textarea>
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