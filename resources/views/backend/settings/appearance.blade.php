@extends('layouts.backend.app')

@section('content')
<div class="page-header d-print-none">
    <div class="row align-items-center">
        <div class="col d-flex">
            <div class=""></div>
            <div class="name">
                <h2 class="page-title">
                    Appearance Setting
                </h2>
                <div class="page-pretitle">
                    <a href="{{ route('app.dashboard') }}">Beranda</a> / <a
                        href="{{ route('app.settings.general') }}">Settings
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row row-cards">
    <div class="col-md-3">
        @include('backend.settings.sidebar')
    </div>

    <div class="col-md-9">
        {{-- <div class="card mb-3">
            <div class="card-body">
                <div class="card-title">How To Use</div>
                <p>You can get the value of each setting anywhere on your site by calling <code>settings('key')</code></p>
            </div>
        </div> --}}

        <form id="appearanceForm" role="form" method="POST" action="{{ route('app.settings.appearance.update') }}" enctype="multipart/form-data">@csrf
            @method('PUT')
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group mb-3 ">
                                <label class="form-label @error('site_logo') text-danger @enderror">Logo (Only image are allowed)</label>
                                <div class="col">
                                    <input type="file" name="site_logo" id="site_logo"
                                        class="dropify @error('site_logo') is-invalid @enderror" data-default-file="{{ setting('site_logo') ==! null ? Storage::url(setting('site_logo')) : '' }}">
                                    @error('site_logo')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group mb-3 ">
                                <label class="form-label @error('site_favicon') text-danger @enderror">Favicon (Only image are allowed, Size 33 x 33)</label>
                                <div class="col">
                                    <input type="file" name="site_favicon" id="site_favicon"
                                        class="dropify @error('site_favicon') is-invalid @enderror" data-default-file="{{ setting('site_favicon') ==! null ? Storage::url(setting('site_favicon')) : '' }}">
                                    @error('site_favicon')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group mb-3 ">
                                <div class="col">
                                    @can('app.settings.update')
                                    <button type="submit" class="btn btn-primary">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                            stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <circle cx="12" cy="12" r="9" />
                                            <path d="M9 12l2 2l4 -4" />
                                        </svg>
                                        Update Setting
                                    </button>
                                    @endcan
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection

@push('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css" integrity="sha512-EZSUkJWTjzDlspOoPSpUFR0o0Xy7jdzW//6qhUkoZ9c4StFkVsp9fbbd0O06p9ELS3H486m4wmrCELjza4JEog==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<style>
    .dropify-wrapper .dropify-message p{
        font-size: initial;
    }
</style>
@endpush

@push('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js" integrity="sha512-8QFTrG0oeOiyWo/VM9Y8kgxdlCryqhIxVeRpWSezdRRAvarxVtwLnGroJgnVW9/XBRduxO/z1GblzPrMQoeuew==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $(document).ready(function() {
        $('.dropify').dropify();
    });
</script>
@endpush