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
                                    <a class="nav-link" id="information-tab" href="{{ route('settings.information') }}"
                                        role="tab" aria-controls="information" aria-selected="true">Company
                                        Information</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link active" id="social-tab" href="#" role="tab"
                                        aria-controls="social" aria-selected="false">Social Links</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="fav-log-tab" href="{{ route('settings.favLogo') }}"
                                        role="tab" aria-controls="fav-logo" aria-selected="false">Logo & Favicon</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="myTabContent2">
                                <div class="tab-pane fade show active" id="social" role="tabpanel"
                                    aria-labelledby="social-tab">
                                    <form action="{{ route('settings.socialUpdate') }}" method="POST">
                                        @method('PATCH')
                                        @csrf
                                        <div class="form-group row mb-4">
                                            <label
                                                class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Facebook</label>
                                            <div class="col-sm-12 col-md-7">
                                                <input type="text" name="facebook" value="{{ $links->facebook ?? '' }}"
                                                    class="form-control @error('facebook') is-invalid @enderror"
                                                    placeholder="Facebook URL">
                                                @error('facebook')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror

                                            </div>
                                        </div>

                                        <div class="form-group row mb-4">
                                            <label
                                                class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Instagram</label>
                                            <div class="col-sm-12 col-md-7">
                                                <input type="url" name="instagram" value="{{ $links->instagram ?? '' }}"
                                                    class="form-control @error('instagram') is-invalid @enderror"
                                                    placeholder="Instagram URL">
                                                @error('instagram')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row mb-4">
                                            <label
                                                class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Twitter</label>
                                            <div class="col-sm-12 col-md-7">
                                                <input type="url" name="twitter" value="{{ $links->twitter ?? '' }}"
                                                    class="form-control @error('twitter') is-invalid @enderror"
                                                    placeholder="Twitter URL">
                                                @error('twitter')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror

                                            </div>
                                        </div>

                                        <div class="form-group row mb-4">
                                            <label
                                                class="col-form-label text-md-right col-12 col-md-3 col-lg-3">LinkedIn</label>
                                            <div class="col-sm-12 col-md-7">
                                                <input type="url" name="linkedin" value="{{ $links->linkedin ?? '' }}"
                                                    class="form-control @error('linkedin') is-invalid @enderror"
                                                    placeholder="LinkedIn URL">
                                                @error('linkedin')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror

                                            </div>
                                        </div>

                                        <div class="form-group row mb-4">
                                            <label
                                                class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Google</label>
                                            <div class="col-sm-12 col-md-7">
                                                <input type="url" name="google" value="{{ $links->google ?? '' }}"
                                                    class="form-control @error('google') is-invalid @enderror"
                                                    placeholder="Google URL">
                                                @error('google')
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
