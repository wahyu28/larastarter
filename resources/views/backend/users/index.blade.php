@extends('layouts.backend.app')

@section('content')
<div class="page-header d-print-none">
    <div class="row align-items-center">
        <div class="col d-flex">
            <div class=""></div>
            <div class="name">
                <h2 class="page-title">
                    Users
                </h2>
                <!-- Page pre-title -->
                {{-- <div class="page-pretitle">
                    Sabtu, 4 Desember 2021 11:36 PM
                </div> --}}
                <div class="page-pretitle">
                    <a href="#">Beranda</a> / Users
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
                <a href="{{ route('app.users.create') }}" class="btn btn-primary d-none d-sm-inline-block">
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
                    Tambah User
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

<div class="row row-cards">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body table-responsive">
                <table id="datatable" class="table table-vcenter card-table">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th class="text-center">Name</th>
                            <th class="text-center">Email</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Joined At</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $key => $user)
                        <tr>
                            <td class="text-center text-muted">{{ $key + 1 }}</td>
                            <td data-label="Name">
                                <div class="d-flex py-1 align-items-center">
                                    {{-- <span class="avatar mr-2"
                                        style="background-image: url({{ $user->getFirstMediaUrl('avatar') != null ? $user->getFirstMediaUrl('avatar', 'thumb') : config('app.placeholder').'160' }})">
                                    </span> --}}
                                    <span class="avatar mr-2"
                                        style="background-image: url({{ $user->getFirstMediaUrl('avatar') != null ? $user->getFirstMediaUrl('avatar') : config('app.placeholder').'160' }})">
                                    </span>
                                    <div class="flex-fill">
                                        <div class="font-weight-medium">{{ $user->name }}</div>
                                        <div class="text-muted"><a href="#" class="text-reset">
                                                @if ($user->role)
                                                <span class="badge bg-blue">{{ $user->role->name }}</span>
                                                @else
                                                <span class="badge bg-red">No Role found.</span>
                                                @endif
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="text-center">{{ $user->email }}</td>
                            <td class="text-center">
                                @if ($user->status)
                                <div class="badge bg-green">Active</div>
                                @else
                                <div class="badge bg-red">Inactive</div>
                                @endif
                            </td>
                            <td class="text-center">{{ $user->created_at->diffForHumans() }}</td>
                            <td class="text-center">
                                <a class="btn btn-secondary btn-sm" href="{{ route('app.users.show',$user->id) }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="12" cy="12" r="2" /><path d="M22 12c-2.667 4.667 -6 7 -10 7s-7.333 -2.333 -10 -7c2.667 -4.667 6 -7 10 -7s7.333 2.333 10 7" /></svg>
                                    <span>Show</span>
                                </a>
                                <a class="btn btn-info btn-sm" href="{{ route('app.users.edit',$user->id) }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 7h-3a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-3" /><path d="M9 15h3l8.5 -8.5a1.5 1.5 0 0 0 -3 -3l-8.5 8.5v3" /><line x1="16" y1="5" x2="19" y2="8" /></svg>
                                    <span>Edit</span>
                                </a>
                                <button type="button" class="btn btn-danger btn-sm"
                                    onclick="deleteData({{ $user->id }})">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><line x1="4" y1="7" x2="20" y2="7" /><line x1="10" y1="11" x2="10" y2="17" /><line x1="14" y1="11" x2="14" y2="17" /><path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" /><path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" /></svg>
                                    <span>Delete</span>
                                </button>
                                <form id="delete-form-{{ $user->id }}"
                                    action="{{ route('app.users.destroy',$user->id) }}" method="POST"
                                    style="display: none;">
                                    @csrf()
                                    @method('DELETE')
                                </form>
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
{{--
<link rel="stylesheet" href="{{ asset('backend/vendor/image-lightbox/css/popup-lightbox.min.css') }}"> --}}
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