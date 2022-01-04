@extends('layouts.backend.app')

@section('content')
<div class="page-header d-print-none">
    <div class="row align-items-center">
        <div class="col d-flex">
            <div class=""></div>
            <div class="name">
                <h2 class="page-title">
                    {{ __((isset($role) ? 'Edit ' : 'Create New') . ' Role') }}
                </h2>
                <div class="page-pretitle">
                    <a href="{{ route('app.dashboard') }}">Beranda</a> / <a
                        href="{{ route('app.roles.index') }}">Roles</a> / {{ __((isset($role) ? 'Edit' : 'Create')) }}
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
                <a href="{{ route('app.roles.index') }}" class="btn btn-danger d-none d-sm-inline-block">
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

<form id="roleFrom" method="POST" action="{{ isset($role) ? route('app.roles.update', $role->id) : route('app.roles.store') }}">
    @csrf
    @isset($role)
        @method('PUT')
    @endisset
    <div class="row row-cards">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <div class="d-flex justify-content-between">
                            @isset($role)
                            Edit Role
                            @else
                            Create New Role
                            @endisset
                        </div>
                    </h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group mb-3 ">
                                <label class="form-label">Role Name <span class="text-danger">*</span></label>
                                <div>
                                    <input type="text" name="name" id="name"
                                        class="form-control @error('name') is-invalid @enderror"
                                        placeholder="Enter Role Name" value="{{ $role->name ?? old('name') }}" required
                                        autofocus>
                                    @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="text-center">
                                <strong>Manage Permissions for Role</strong>
                            </div>

                            <div class="text-center">
                            @error('permissions')
                                    <span class="text-danger">{{ $message }}</span>
                            @enderror
                            </div>

                            <div class="form-group">
                                <label class="form-check">
                                    <input class="form-check-input" type="checkbox" id="select-all">
                                    <span class="form-check-label">Select All</span>
                                </label>
                            </div>

                            @forelse ($modules->chunk(3) as $key => $chunks)
                            <div class="row">
                                @foreach ($chunks as $key => $module)
                                <div class="col">
                                    <h5>Module: {{ $module->name }}</h5>
                                    @foreach ($module->permissions as $key => $permission)
                                    <div class="mb-3 ml-4">
                                        <div>
                                            <label class="form-check">
                                                <input class="form-check-input" type="checkbox"
                                                    id="permission-{{ $permission->id }}" name="permissions[]" value="{{ $permission->id }}"
                                                    @isset($role)
                                                        @foreach ($role->permissions as $rPermission)
                                                            {{ $permission->id == $rPermission->id ? 'checked' : '' }}
                                                        @endforeach
                                                    @endisset>
                                                <span class="form-check-label" for="permission-{{ $permission->id }}">{{ $permission->name }}</span>
                                            </label>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                                @endforeach
                            </div>
                            @empty
                            <div class="row">
                                <div class="col text-center">
                                    <strong>No Module found.</strong>
                                </div>
                            </div>
                            @endforelse
                            <div class="col-md-12 text-right">
                                @isset($role)
                                <button type="submit" class="btn btn-primary">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M20 11a8.1 8.1 0 0 0 -15.5 -2m-.5 -4v4h4" /><path d="M4 13a8.1 8.1 0 0 0 15.5 2m.5 4v-4h-4" /></svg>
                                    Update Role
                                </button>    
                                @else
                                <button type="submit" class="btn btn-primary">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M6 4h10l4 4v10a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2" /><circle cx="12" cy="14" r="2" /><polyline points="14 4 14 8 8 8 8 4" /></svg>
                                    Save Role
                                </button>
                                @endisset
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection

@push('js')
<script>
    $('#select-all').click(function() {
        if (this.checked) {
            $(':checkbox').each(function() {
                this.checked = true;
            });
        } else {
            $(':checkbox').each(function() {
                this.checked = false;
            });
        }
    });
</script>
@endpush