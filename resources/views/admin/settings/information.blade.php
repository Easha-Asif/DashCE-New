@extends('admin.layouts.master')
@section('title', 'Site Settings')

@section('content')
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Add & Update Settings</h4>
                            @if ($errors->any())
                                @foreach ($errors as $error)
                                    {{ $error }}
                                @endforeach
                            @endif
                        </div>
                        <div class="card-body">
                            <ul class="nav nav-pills" id="myTab3" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="information-tab" href="#" role="tab"
                                        aria-controls="information" aria-selected="true">Company
                                        Information</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="social-tab" href="{{ route('settings.social') }}" role="tab"
                                        aria-controls="social" aria-selected="false">Social Links</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="fav-log-tab" href="{{ route('settings.favLogo') }}"
                                        role="tab" aria-controls="fav-logo" aria-selected="false">Logo & Favicon</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="myTabContent2">
                                <div class="tab-pane fade show active" id="information" role="tabpanel"
                                    aria-labelledby="information-tab">
                                    <form action="{{ route('settings.contactUpdate') }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <div class="form-group row mb-4">
                                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Company
                                                Name</label>
                                            <div class="col-sm-12 col-md-7">
                                                <input type="text" name="company_name"
                                                    value="{{ $contact->company_name ?? '' }}"
                                                    class="form-control @error('company_name') is-invalid @enderror"
                                                    placeholder="Company Name">
                                                @error('company_name')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row mb-4">
                                            <label
                                                class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Email</label>
                                            <div class="col-sm-12 col-md-7">
                                                <input type="text" name="email" value="{{ $contact->email ?? '' }}"
                                                    class="form-control @error('email') is-invalid @enderror"
                                                    placeholder="Email">
                                                @error('email')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row mb-4">
                                            <label
                                                class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Phone</label>
                                            <div class="col-sm-12 col-md-7">
                                                <input type="text" name="phone" value="{{ $contact->phone ?? '' }}"
                                                    class="form-control @error('phone') is-invalid @enderror"
                                                    placeholder="Phone">
                                                @error('phone')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row mb-4">
                                            <label
                                                class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Address</label>
                                            <div class="col-sm-12 col-md-7">
                                                <textarea class="form-control @error('address') is-invalid @enderror" name="address" cols="30" rows="20">{{ $contact->address ?? '' }}</textarea>
                                                @error('address')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row mb-4">
                                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                            <div class="col-sm-12 col-md-7">
                                                <button type="submit" class="btn btn-primary">Update</button>
                                            </div>
                                        </div>


                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
