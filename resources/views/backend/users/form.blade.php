@extends('layouts.backend.app')

@section('content')
<div class="page-header d-print-none">
    <div class="row align-items-center">
        <div class="col d-flex">
            <div class=""></div>
            <div class="name">
                <h2 class="page-title">
                    {{ __((isset($user) ? 'Edit User' : 'Create New') . ' User') }}
                </h2>
                <div class="page-pretitle">
                    <a href="{{ route('app.dashboard') }}">Beranda</a> / <a
                        href="{{ route('app.users.index') }}">Users</a> / {{ __((isset($user) ? 'Edit' : 'Create')) }}
                </div>
            </div>
        </div>

        <div class="col-auto ml-auto d-print-none">
            <div class="btn-list">
                {{-- <span class="d-none d-sm-inline">
                    <a href="{{ route('donasi.create') }}" class="btn btn-white">
                        Tambah Donasi
                    </a>
                </span> --}}
                <a href="{{ route('app.users.index') }}" class="btn btn-danger d-none d-sm-inline-block">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M20 6a1 1 0 0 1 1 1v10a1 1 0 0 1 -1 1h-11l-5 -5a1.5 1.5 0 0 1 0 -2l5 -5Z" /><path d="M12 10l4 4m0 -4l-4 4" /></svg>
                    Back to List
                </a>
                <a href="#" class="btn btn-primary d-sm-none btn-icon" data-toggle="modal" data-target="#modal-report"
                    aria-label="Create new report">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
                        stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <line x1="12" y1="5" x2="12" y2="19" />
                        <line x1="5" y1="12" x2="19" y2="12" />
                    </svg>
                </a>
            </div>
        </div>
    </div>
</div>

<form id="userForm" role="form" method="POST" action="{{ isset($user) ? route('app.users.update', $user->id) : route('app.users.store') }}" enctype="multipart/form-data">
    @csrf
    @isset($user)
        @method('PUT')
    @endisset
    <div class="row row-cards">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">User Info</h3>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group mb-3 ">
                                <label class="form-label @error('name') text-danger @enderror">Name <span class="text-danger">*</span></label>
                                <div class="col">
                                    <input type="text" name="name" id="name"
                                        class="form-control @error('name') is-invalid @enderror"
                                        placeholder="Enter Name" value="{{ $user->name ?? old('name') }}" autofocus {{ !isset($user) ? 'required' : '' }}>
                                    @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group mb-3 ">
                                <label class="form-label  @error('email') text-danger @enderror">Email <span class="text-danger">*</span></label>
                                <div class="col">
                                    <input type="text" name="email" id="email"
                                        class="form-control @error('email') is-invalid @enderror"
                                        placeholder="Enter Email" value="{{ $user->email ?? old('email') }}">
                                    @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group mb-3 ">
                                <label class="form-label @error('password') text-danger @enderror">Password <span class="text-danger">*</span></label>
                                <div class="col">
                                    <input type="password" name="password" id="password"
                                        class="form-control @error('password') is-invalid @enderror"
                                        placeholder="********" {{ !isset($user) ? 'required' : '' }}>
                                    @error('password')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group mb-3 ">
                                <label class="form-label @error('password_confirmation') text-danger @enderror">Confirm Password <span class="text-danger">*</span></label>
                                <div class="col">
                                    <input type="password" name="password_confirmation" id="email_confirmation"
                                        class="form-control @error('password_confirmation') is-invalid @enderror"
                                        placeholder="********" {{ !isset($user) ? 'required' : '' }}>
                                    @error('password_confirmation')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">Set Role & Status</h3>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group mb-3 ">
                                <label class="form-label">Select Role</label>
                                <div class="col">
                                    <select name="role" id="role" class="form-control js-example-basic-single">
                                        @foreach ($roles as $key => $role)
                                            <option value="{{ $role->id }}" @isset($user) {{ $user->role->id == $role->id ? 'selected' : '' }} @endisset>{{ $role->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('role')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group mb-3 ">
                                <label class="form-label @error('avatar') text-danger @enderror">Avatar</label>
                                <div class="col">
                                    <input type="file" name="avatar" id="avatar"
                                        class="dropify @error('avatar') is-invalid @enderror" data-default-file="{{ isset($user) ? $user->getFirstMediaUrl('avatar') : '' }}">
                                    @error('avatar')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group mb-3 ">
                                <label class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" id="status" name="status" @isset($user) {{ $user->status == true ? 'checked' : '' }} @endisset>
                                    <span class="form-check-label">Status</span>
                                </label>
                                @error('avatar')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary">
                                @isset($user)
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M20 11a8.1 8.1 0 0 0 -15.5 -2m-.5 -4v4h4" /><path d="M4 13a8.1 8.1 0 0 0 15.5 2m.5 4v-4h-4" /></svg>
                                Update User
                                @else
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M6 4h10l4 4v10a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2" /><circle cx="12" cy="14" r="2" /><polyline points="14 4 14 8 8 8 8 4" /></svg>
                                Create User
                                @endisset
                            </button>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection

@push('css')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.2.0/dist/select2-bootstrap-5-theme.min.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css" integrity="sha512-EZSUkJWTjzDlspOoPSpUFR0o0Xy7jdzW//6qhUkoZ9c4StFkVsp9fbbd0O06p9ELS3H486m4wmrCELjza4JEog==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<style>
    .dropify-wrapper .dropify-message p{
        font-size: initial;
    }
</style>
@endpush

@push('js')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js" integrity="sha512-8QFTrG0oeOiyWo/VM9Y8kgxdlCryqhIxVeRpWSezdRRAvarxVtwLnGroJgnVW9/XBRduxO/z1GblzPrMQoeuew==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $(document).ready(function() {
        $('.dropify').dropify();
        $("select").select2({
            theme: "bootstrap-5",
        });
    });
</script>
@endpush