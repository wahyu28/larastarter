@extends('layouts.backend.app')

@section('content')
<div class="page-header d-print-none">
    <div class="row align-items-center">
        <div class="col d-flex">
            <div class=""></div>
            <div class="name">
                <h2 class="page-title">
                    Mail Setting
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
        <form id="mailForm" role="form" method="POST" action="{{ route('app.settings.mail.update') }}">@csrf
            @method('PUT')
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group mb-3 ">
                                <label class="form-label @error('mail_mailer') text-danger @enderror">Mailer
                                    <code>{ key: mail_mailer }</code></label>
                                <div class="col">
                                    <input type="text" name="mail_mailer" id="mail_mailer"
                                        class="form-control @error('mail_mailer') is-invalid @enderror" autofocus
                                        required value="{{ setting('mail_mailer') ?? old('mail_mailer') }}"
                                        placeholder="ex: smtp">
                                    @error('mail_mailer')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group mb-3 ">
                                <label class="form-label @error('mail_encryption') text-danger @enderror">Mail
                                    Encryption <code>{ key: mail_encryption }</code></label>
                                <div class="col">
                                    <input type="text" name="mail_encryption" id="mail_encryption"
                                        class="form-control @error('mail_encryption') is-invalid @enderror" autofocus
                                        required value="{{ setting('mail_encryption') ?? old('mail_encryption') }}"
                                        placeholder="ex: TLS">
                                    @error('mail_encryption')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group mb-3 ">
                                <label class="form-label @error('mail_host') text-danger @enderror">Mail Host
                                    <code>{ key: mail_host }</code></label>
                                <div class="col">
                                    <input type="text" name="mail_host" id="mail_host"
                                        class="form-control @error('mail_host') is-invalid @enderror" autofocus required
                                        value="{{ setting('mail_host') ?? old('mail_host') }}" placeholder="HOST">
                                    @error('mail_host')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group mb-3 ">
                                <label class="form-label @error('mail_port') text-danger @enderror">Mail Port
                                    <code>{ key: mail_port }</code></label>
                                <div class="col">
                                    <input type="text" name="mail_port" id="mail_port"
                                        class="form-control @error('mail_port') is-invalid @enderror" autofocus required
                                        value="{{ setting('mail_port') ?? old('mail_port') }}" placeholder="PORT">
                                    @error('mail_port')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group mb-3 ">
                                <label class="form-label @error('mail_username') text-danger @enderror">Mail Username
                                    <code>{ key: mail_username }</code></label>
                                <div class="col">
                                    <input type="text" name="mail_username" id="mail_port"
                                        class="form-control @error('mail_username') is-invalid @enderror" required
                                        value="{{ setting('mail_username') ?? old('mail_username') }}"
                                        placeholder="Mail Username">
                                    @error('mail_username')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group mb-3 ">
                                <label class="form-label @error('mail_password') text-danger @enderror">Mail Password
                                    <code>{ key: mail_password }</code></label>
                                <div class="col">
                                    <input type="password" name="mail_password" id="mail_port"
                                        class="form-control @error('mail_password') is-invalid @enderror" required
                                        value="{{ setting('mail_password') ?? old('mail_password') }}"
                                        placeholder="Mail Password">
                                    @error('mail_password')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group mb-3 ">
                                <label class="form-label @error('mail_from_address') text-danger @enderror">Mail From
                                    Adress <code>{ key: mail_from_address }</code></label>
                                <div class="col">
                                    <input type="email" name="mail_from_address" id="mail_port"
                                        class="form-control @error('mail_from_address') is-invalid @enderror" required
                                        value="{{ setting('mail_from_address') ?? old('mail_from_address') }}"
                                        placeholder="From Adress">
                                    @error('mail_from_address')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group mb-3 ">
                                <label class="form-label @error('mail_from_name') text-danger @enderror">Mail From Name
                                    <code>{ key: mail_from_name }</code></label>
                                <div class="col">
                                    <input type="text" name="mail_from_name" id="mail_port"
                                        class="form-control @error('mail_from_name') is-invalid @enderror" required
                                        value="{{ setting('mail_from_name') ?? old('mail_from_name') }}"
                                        placeholder="From Name">
                                    @error('mail_from_name')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
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