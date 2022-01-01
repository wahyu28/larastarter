@extends('layouts.backend.app')

@section('content')
<div class="page-header d-print-none">
    <div class="row align-items-center">
        <div class="col d-flex">
            <div class=""></div>
            <div class="name">
                <h2 class="page-title">
                    @role('admin')
                        Admin Dashboard (Selamat Datang, Admin)
                    @else
                        Dashboard
                    @endrole
                </h2>
                <!-- Page pre-title -->
                {{-- <div class="page-pretitle">
                    Sabtu, 4 Desember 2021 11:36 PM
                </div> --}}
                <div class="page-pretitle">
                    Dashboard
                </div>
            </div>
        </div>
        <!-- Page title actions -->
        <div class="col-auto ml-auto d-print-none">
            <div class="btn-list">
                {{-- <span class="d-none d-sm-inline">
                    <a href="#" class="btn btn-white">
                        New view
                    </a>
                </span> --}}
                <a href="#" class="btn btn-primary d-none d-sm-inline-block" data-toggle="modal"
                    data-target="#modal-report">
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
                    Laporan Donasi
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
    <div class="col-sm-6 col-lg-3">
        <div class="card">
            <div class="card-body d-flex align-items-center">
                <span class="bg-red text-white avatar mr-3"><svg xmlns="http://www.w3.org/2000/svg" class="icon"
                        width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M19.5 13.572l-7.5 7.428l-7.5 -7.428m0 0a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572">
                        </path>
                    </svg>
                </span>
                <div class="mr-3">
                    <div class="font-weight-medium">
                        1,700
                    </div>
                    <div class="text-muted">???</div>
                </div>
                <div class="ml-auto">
                </div>
            </div>
        </div>
    </div>

    <div class="col-sm-6 col-lg-3">
        <div class="card">
            <div class="card-body d-flex align-items-center">
                <span class="bg-lime text-white avatar mr-3">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
                        stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <line x1="18" y1="6" x2="18" y2="6.01" />
                        <path d="M18 13l-3.5 -5a4 4 0 1 1 7 0l-3.5 5" />
                        <polyline points="10.5 4.75 9 4 3 7 3 20 9 17 15 20 21 17 21 15" />
                        <line x1="9" y1="4" x2="9" y2="17" />
                        <line x1="15" y1="15" x2="15" y2="20" />
                    </svg>
                </span>
                <div class="mr-3">
                    <div class="font-weight-medium">
                        2
                    </div>
                    <div class="text-muted">Kantor Layanan</div>
                </div>
                <div class="ml-auto">
                </div>
            </div>
        </div>
    </div>

    <div class="col-sm-6 col-lg-3">
        <div class="card">
            <div class="card-body d-flex align-items-center">
                <span class="bg-red text-white avatar mr-3">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
                        stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M14 3v4a1 1 0 0 0 1 1h4" />
                        <path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z" />
                        <line x1="9" y1="7" x2="10" y2="7" />
                        <line x1="9" y1="13" x2="15" y2="13" />
                        <line x1="13" y1="17" x2="15" y2="17" />
                    </svg>
                </span>
                <div class="mr-3">
                    <div class="font-weight-medium">
                        6
                    </div>
                    <div class="text-muted">Program</div>
                </div>
                <div class="ml-auto">
                </div>
            </div>
        </div>
    </div>

    <div class="col-sm-6 col-lg-3">
        <div class="card">
            <div class="card-body d-flex align-items-center">
                <span class="bg-blue text-white avatar mr-3">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
                        stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <circle cx="9" cy="7" r="4" />
                        <path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
                        <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                        <path d="M21 21v-2a4 4 0 0 0 -3 -3.85" />
                    </svg>
                </span>
                <div class="mr-3">
                    <div class="font-weight-medium">
                        16
                    </div>
                    <div class="text-muted">Pegawai</div>
                </div>
                <div class="ml-auto">
                </div>
            </div>
        </div>
    </div>

    <div class="col-sm-6 col-lg-6">
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="subheader">Total Donasi Bulan ini</div>
                    <div class="ml-auto lh-1">
                        <div class="dropdown">
                            Desember
                        </div>
                    </div>
                </div>
                <div class="h1 mb-3 mt-2">
                    <strong>Rp. 20.000</strong>
                </div>
            </div>
        </div>
    </div>

    <div class="col-sm-6 col-lg-6">
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="subheader">Jumlah Donatur Bulan ini</div>
                    <div class="ml-auto lh-1">
                        <div class="dropdown">
                            Desember
                        </div>
                    </div>
                </div>
                <div class="h1 mb-3 mt-2">
                    <strong>10</strong> Orang
                </div>
            </div>
        </div>
    </div>

    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Donasi Terakhir</h3>
            </div>
            <div class="table-responsive">
                <table class="table table-vcenter card-table">
                    <thead>
                        <tr>
                            <th>Nama Donatur</th>
                            <th>Marketing</th>
                            <th>Jumlah</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Agra Sukamto</td>
                            <td>Ferent Alfarizi</td>
                            <td><strong>Rp. 500.000</strong></td>
                            <td>
                                <span class="badge bg-success mr-1"></span> Dikonfirmasi
                            </td>
                        </tr>
                        <tr>
                            <td>Steven Kurniawan</td>
                            <td>Mira Zubaidah</td>
                            <td><strong>Rp. 2.500.000</strong></td>
                            <td>
                                <span class="badge bg-warning mr-1"></span> Menunggu
                            </td>
                        </tr>
                        <tr>
                            <td>Eko Julianto</td>
                            <td>Ferent Alfarizi</td>
                            <td><strong>Rp. 300.000</strong></td>
                            <td>
                                <span class="badge bg-danger mr-1"></span> Gagal
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@push('after-style')
{{--
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css"> --}}
{{-- <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css"> --}}
@endpush

@push('after-script')
<!-- Page Specific JS File -->
{{-- <script src="{{ asset('backend/js/page/index-0.js') }}"></script> --}}
{{-- <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script> --}}
{{-- <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script> --}}
{{-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script> --}}
@endpush