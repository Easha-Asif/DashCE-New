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
                                    <a class="nav-link" id="social-tab" href="{{ route('settings.social') }}" role="tab"
                                        aria-controls="social" aria-selected="false">Social Links</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link active" id="fav-log-tab" href="#" role="tab"
                                        aria-controls="fav-logo" aria-selected="false">Logo & Favicon</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="myTabContent2">
                                <div class="tab-pane fade show active" id="fav-logo" role="tabpanel"
                                    aria-labelledby="fav-log-tab">
                                    <form action="{{ route('settings.logoFavIconUpdate') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('PATCH')
                                        <div class="form-group row mb-4">
                                            <label
                                                class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Favicon</label>
                                            <div class="col-sm-12 col-md-7">
                                                @if (isset($favicon))
                                                    <img width="100" height="100"
                                                        src="{{ asset('public/uploads/setting/' . $favicon->favicon) }}"
                                                        class="rounded avatar-lg" alt="">
                                                @else
                                                    <img width="100" height="100"
                                                        src="{{ asset('public/uploads/setting/favicon.ico') }}"
                                                        class="rounded avatar-lg" alt="">
                                                @endif
                                                <input type="file" class="form-control mt-4" name="favicon"
                                                    id="favicon">
                                            </div>
                                        </div>

                                        <div class="form-group row mb-4">
                                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                            <div class="col-sm-12 col-md-7">
                                                <button type="submit" class="btn btn-primary">Update</button>
                                            </div>
                                        </div>

                                    </form>

                                    <form class="mt-5" action="{{ route('settings.logoFavIconUpdate') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('PATCH')
                                        <div class="form-group row mb-4">
                                            <label
                                                class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Logo</label>
                                            <div class="col-sm-12 col-md-7">

                                                @if (isset($logo))
                                                    <img width="100" height="100"
                                                        src="{{ asset('public/uploads/setting/' . $logo->logo) }}"
                                                        class="rounded avatar-lg" alt="">
                                                @else
                                                    <img width="100" height="100"
                                                        src="{{ asset('public/uploads/setting/logo.png') }}"
                                                        class="rounded avatar-lg" alt="">
                                                @endif
                                                <input type="file" class="form-control mt-4" name="logo"
                                                    id="logo">
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

