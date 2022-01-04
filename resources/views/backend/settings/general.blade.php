@extends('layouts.backend.app')

@section('content')
<div class="page-header d-print-none">
    <div class="row align-items-center">
        <div class="col d-flex">
            <div class=""></div>
            <div class="name">
                <h2 class="page-title">
                    General Setting
                </h2>
                <div class="page-pretitle">
                    <a href="{{ route('app.dashboard') }}">Dashboard</a> / Settings
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
        <div class="card mb-3">
            <div class="card-body">
                <div class="card-title">How To Use</div>
                <p>You can get the value of each setting anywhere on your site by calling <code>settings('key')</code></p>
            </div>
        </div>

        <form id="userForm" role="form" method="POST" action="{{ route('app.settings.general.update') }}" enctype="multipart/form-data">@csrf
            @method('PUT')
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group mb-3 ">
                                <label class="form-label @error('site_title') text-danger @enderror">Site Title <code>{ key: site_title }</code></label>
                                <div class="col">
                                    <input type="text" name="site_title" id="site_title"
                                        class="form-control @error('site_title') is-invalid @enderror" autofocus
                                        required value="{{ setting('site_title') ?? old('site_title') }}">
                                    @error('site_title')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group mb-3 ">
                                <label class="form-label @error('site_description') text-danger @enderror">Site Description <code>{ key: site_description }</code></label>
                                <div class="col">
                                    <textarea name="site_description" id="site_description" cols="30" rows="5" class="form-control @error('site_description') is-invalid @enderror">{{ setting('site_description') ?? old('site_description') }}</textarea>
                                    @error('site_description')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group mb-3 ">
                                <label class="form-label @error('site_address') text-danger @enderror">Site Address <code>{ key: site_address }</code></label>
                                <div class="col">
                                    <textarea name="site_address" id="site_address" cols="30" rows="3" class="form-control @error('site_address') is-invalid @enderror">{{ setting('site_address') ?? old('site_address') }}</textarea>
                                    @error('site_address')
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