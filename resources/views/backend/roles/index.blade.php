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
                <!-- Page pre-title -->
                {{-- <div class="page-pretitle">
                    Sabtu, 4 Desember 2021 11:36 PM
                </div> --}}
                <div class="page-pretitle">
                    <a href="{{ route('app.dashboard') }}">Dashboard</a> / Roles
                </div>
            </div>
        </div>

        <!-- Page title actions -->
        <div class="col-auto ml-auto d-print-none">
            <div class="btn-list">
                {{-- <span class="d-none d-sm-inline">
                    <a href="{{ route('donasi.create') }}" class="btn btn-white">
                        Tambah Donasi
                    </a>
                </span> --}}
                @can('app.roles.create')
                <a href="{{ route('app.roles.create') }}" class="btn btn-primary d-none d-sm-inline-block">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="12" cy="12" r="9" /><line x1="9" y1="12" x2="15" y2="12" /><line x1="12" y1="9" x2="12" y2="15" /></svg>
                    Create New Role
                </a>
                @endcan
                {{-- <a href="#" class="btn btn-primary d-sm-none btn-icon" data-toggle="modal" data-target="#modal-report"
                    aria-label="Create new report">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
                        stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <line x1="12" y1="5" x2="12" y2="19" />
                        <line x1="5" y1="12" x2="19" y2="12" />
                    </svg>
                </a> --}}
            </div>
        </div>
    </div>
</div>

<div class="row row-cards">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body table-responsive">
                <table id="datatable" class="table table-vcenter card-table">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th class="text-center">Name</th>
                            <th class="text-center">Permissions</th>
                            <th class="text-center">Created At</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($roles as $key => $role)
                            <tr>
                                <td class="text-center text-muted">{{ $key + 1 }}</td>
                                <td class="text-center">{{ $role->name }}</td>
                                <td class="text-center">
                                    @if ($role->permissions->count() > 0)
                                        <span class="badge bg-blue">{{ $role->permissions->count() }}</span>                                        
                                    @else
                                        <span class="badge bg-red">No Permission found</span>     
                                    @endif
                                </td>
                                <td class="text-center">
                                    {{ $role->created_at->diffForHumans() }}
                                </td>
                                <td class="text-center">
                                    @can('app.roles.edit')
                                    <a href="{{ route('app.roles.edit', $role->id) }}" class="btn btn-info btn-sm">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 7h-3a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-3" /><path d="M9 15h3l8.5 -8.5a1.5 1.5 0 0 0 -3 -3l-8.5 8.5v3" /><line x1="16" y1="5" x2="19" y2="8" />
                                        </svg>
                                        Edit
                                    </a>
                                    @endcan

                                    @can('app.roles.destroy')
                                    @if ($role->deleteable == true)
                                    <button class="btn btn-danger btn-sm" onclick="deleteData({{ $role->id }})">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><line x1="4" y1="7" x2="20" y2="7" /><line x1="10" y1="11" x2="10" y2="17" /><line x1="14" y1="11" x2="14" y2="17" /><path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" /><path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" /></svg>    
                                        Delete
                                    </button>
                                    <form id="delete-form-{{ $role->id }}" method="POST" action="{{ route('app.roles.destroy', $role->id) }}" style="display: none">
                                        @csrf
                                        @method('DELETE')
                                    </form> 
                                    @endif
                                    @endcan
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@push('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css">
{{-- <link rel="stylesheet" href="{{ asset('backend/vendor/image-lightbox/css/popup-lightbox.min.css') }}"> --}}
@endpush

@push('js')
{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script> --}}
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
{{-- <script src="{{ asset('backend/vendor/image-lightbox/js/jquery.popup.lightbox.min.js') }}"></script> --}}
<script>
    $(document).ready(function() {
        $('#datatable').DataTable();
    });

    function deleteData(id) {
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('delete-form-' + id).submit();
                // console.log(id)
                // Swal.fire(
                // 'Deleted!',
                // 'Your file has been deleted.',
                // 'success'
                // )
            }
        })
    }
</script>
@endpush