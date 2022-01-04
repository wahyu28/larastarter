<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'YIS Foundation') }}</title>

    {{-- <link href="{{ asset('backend/dist/libs/jqvmap/dist/jqvmap.min.css') }}" rel="stylesheet"/> --}}
    <link href="{{ asset('backend/dist/css/tabler.min.css') }}" rel="stylesheet" />
	<link href="{{ asset('css/iziToast.css') }}" rel="stylesheet">
    {{-- <link href="{{ asset('backend/dist/css/tabler-flags.min.css') }}" rel="stylesheet" /> --}}
    {{-- <link href="{{ asset('backend/dist/css/tabler-payments.min.css') }}" rel="stylesheet" /> --}}
    {{-- <link href="{{ asset('backend/dist/css/tabler-vendors.min.css') }}" rel="stylesheet" /> --}}
    {{-- <link href="{{ asset('backend/dist/css/demo.min.css') }}" rel="stylesheet" /> --}}
    {{-- <link rel="stylesheet" href="{{ asset('backend/css/toastr.min.css') }}"> --}}
	<style>
		.content {
			/* background-color: #eeeeee !important; */
		}
	</style>
	@stack('css')
</head>
<body class="antialiased">
	@include('layouts.backend.partials.sidebar')
	<div class="page">
		@include('layouts.backend.partials.header')
		<div class="content">
			<div class="container-xl">
				@yield('content')
			</div>
			@include('layouts.backend.partials.footer')
		</div>
	</div>

	{{-- Modal Logout --}}
	<div class="modal modal-blur fade" id="modal-logout" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog modal-sm modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-body">
					<div class="modal-title">Anda yakin akan Keluar?</div>
					<div>Anda akan keluar dari Aplikasi.</div>
				</div>
				<div class="modal-footer d-flex align-items-center">
					<button type="button" class="btn btn-link link-secondary mr-auto"
							data-dismiss="modal">Batal</button>
					<form action="{{ route('logout') }}" method="POST">
						@csrf
						<button type="submit" class="btn btn-danger">Ya, Keluarkan Saya</button>
					</form>
				</div>
			</div>
		</div>
	</div>

	<!-- Libs JS -->
    <script src="{{ asset('backend/dist/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    {{-- <script src="{{ asset('backend/dist/libs/jquery/dist/jquery.slim.min.js') }}"></script> --}}
	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
	<script src="{{ asset('js/iziToast.js') }}"></script>
	@include('vendor.lara-izitoast.toast')
    {{-- <script src="{{ asset('backend/dist/libs/apexcharts/dist/apexcharts.min.js') }}"></script> --}}
    {{-- <script src="{{ asset('backend/dist/libs/jqvmap/dist/jquery.vmap.min.js') }}"></script> --}}
    {{-- <script src="http://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script> --}}
    {{-- <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script> --}}
    {{-- <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script> --}}
    <!-- Tabler Core -->
    {{-- <script src="{{ asset('backend/dist/js/tabler.min.js') }}"></script> --}}
    <script>
        document.body.style.display = "block"
    </script>
	@stack('js')

</body>
</html>
