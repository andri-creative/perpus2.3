@extends('layouts.main')
@section('title', 'Pengunjung')

@section('conten')
    <section class="page-banner services-banner">
        <div class="container">
            <div class="banner-header">
                <h2>Formulir Kunjungan Perpustakaan</h2>
                <span class="underline center"></span>
                <p class="lead">Melangkah ke dunia pengetahuan tanpa batas, mari tinggalkan jejak kunjungan Anda di sini.
                </p>
            </div>
            <div class="breadcrumb">
                <ul>
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li>Pengunjung</li>
                </ul>
            </div>
        </div>
    </section>

    <div id="content" class="site-content">
        <div id="primary" class="content-area">
            <main id="main" class="site-main">
                <div class="signin-main">
                    <div class="container">
                        <div class="woocommerce">
                            <div class="woocommerce-login">
                                <div class="company-info signin-register">
                                    <div class="col-md-5 col-md-offset-1 border-dark-left">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="company-detail bg-dark margin-left"
                                                    style="padding-bottom: 8.4rem">
                                                    <div class="signin-head">
                                                        <h2>QR Code Pengunung</h2>
                                                        <span class="underline left"></span>
                                                    </div>
                                                    <div class="row mb-10">
                                                        <div class="col-md-6">
                                                            <div id="qrcode" style="margin-right: 20px;"></div>
                                                        </div>
                                                        <div class="col-md-6" style="color: white;">
                                                            <h6>Perhatian:</h6>
                                                            <p>- Pastikan data yang diisi benar.</p>
                                                            <p>- QR code ini hanya untuk satu kali akses.</p>
                                                            <h6>Pelanggaran:</h6>
                                                            <p>- Jangan gunakan QR code untuk tujuan tidak sah.</p>
                                                            <p>- Penyalahgunaan akan dikenakan sanksi.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-5 border-dark new-user">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="company-detail new-account bg-light margin-right">
                                                    <div class="new-user-head mb-10">
                                                        <h2>From Pengunjung</h2>
                                                        <span class="underline left"></span>
                                                    </div>
                                                    <form class="row gy-3 md-4 needs-validation"
                                                        action="{{ route('create.pengunjung') }}" method="POST" novalidate>
                                                        @csrf
                                                        <!-- First Name -->
                                                        <div class="col-md-12">
                                                            <label class="form-label">Nama Lengkap</label>
                                                            <div class="icon-field has-validation">

                                                                <input type="text" name="first_name" class="form-control"
                                                                    placeholder="Enter First Name" required />

                                                            </div>
                                                        </div>

                                                        <!-- Hari & Tgl -->
                                                        <div class="col-md-6">
                                                            <label class="form-label">Hari & Tanggal</label>
                                                            <div class="icon-field has-validation">

                                                                <input type="text" id="date-time" name="date_time"
                                                                    class="form-control" placeholder="Hari, Tanggal, Waktu"
                                                                    readonly required />

                                                            </div>
                                                        </div>

                                                        <!-- Kelas -->
                                                        <div class="col-md-6">
                                                            <label class="form-label">Kelas</label>
                                                            <div class="icon-field has-validation">

                                                                <input type="text" id="kelas-input" name="kelas"
                                                                    class="form-control"
                                                                    placeholder="Masukkan Kelas (contoh: 1.1)" required />

                                                            </div>
                                                        </div>

                                                        <!-- Keperluan -->
                                                        <div class="col-md-12">
                                                            <label class="form-label">Keperluan</label>
                                                            <div class="icon-field has-validation">

                                                                <textarea name="keperluan" class="form-control" rows="4" cols="50" placeholder="Enter a description..."
                                                                    required></textarea>

                                                            </div>
                                                        </div>

                                                        <!-- Submit Button -->
                                                        <div class="col-md-12" style="margin-top: 1rem;">
                                                            <button class="btn btn-primary-600" type="submit">
                                                                Submit form
                                                            </button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

    @include('search')


    <!-- Script -->
@section('script')

@endsection


@endsection
