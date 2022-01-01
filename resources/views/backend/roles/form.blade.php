@extends('layouts.backend.app')

@section('content')
<div class="page-header d-print-none">
    <div class="row align-items-center">
        <div class="col d-flex">
            <div class=""></div>
            <div class="name">
                <h2 class="page-title">
                    Roles
                </h2>
                <div class="page-pretitle">
                    <a href="{{ route('app.dashboard') }}">Beranda</a> / <a
                        href="{{ route('app.roles.index') }}">Roles</a>
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
                <a href="{{ route('app.roles.index') }}" class="btn btn-primary d-none d-sm-inline-block">
                    <!-- Download SVG icon from http://tabler-icons.io/i/report-analytics -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
                        stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M9 5h-2a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-12a2 2 0 0 0 -2 -2h-2" />
                        <rect x="9" y="3" width="6" height="4" rx="2" />
                        <path d="M9 17v-5" />
                        <path d="M12 17v-1" />
                        <path d="M15 17v-3" />
                    </svg>
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
                            Create Donasi
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

                            @forelse ($modules->chunk(2) as $key => $chunks)
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
                            @isset($role)
                            <button type="submit" class="btn btn-primary">Update</button>    
                            @else
                            <button type="submit" class="btn btn-primary">Submit</button>
                            @endisset
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