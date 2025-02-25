@extends('layouts.main')


@section('title', 'Form Pengunjung')

@section('content')
    <div class="dashboard-main-body">
        <div class="row gy-4">
            <div class="col-md-6">
                <div class="card h-100 p-0">

                    <div
                        class="card-header border-bottom bg-base py-16 px-24 d-flex align-items-center justify-content-between">
                        <a href="{{ route('home') }}"
                            class="btn btn-sm btn-primary-600 radius-8 d-inline-flex align-items-center gap-1">
                            <iconify-icon icon="tabler:arrow-back-up" class="text-xl"></iconify-icon>
                            Kembali
                        </a>
                        <h6 class="text-lg fw-semibold mb-0">Pengunjung</h6>
                    </div>
                    <div class="card-body py-16 px-24">
                        <form class="row gy-3 needs-validation" action="{{ route('create.pengunjung') }}" method="POST"
                            novalidate>
                            @csrf
                            <!-- First Name -->
                            <div class="col-md-6">
                                <label class="form-label">First Name</label>
                                <div class="icon-field has-validation">
                                    <span class="icon">
                                        <iconify-icon icon="f7:person"></iconify-icon>
                                    </span>
                                    <input type="text" name="first_name" class="form-control"
                                        placeholder="Enter First Name" required />
                                    <div class="invalid-feedback">
                                        Please provide your first name.
                                    </div>
                                </div>
                            </div>

                            <!-- Last Name -->
                            <div class="col-md-6">
                                <label class="form-label">Last Name</label>
                                <div class="icon-field has-validation">
                                    <span class="icon">
                                        <iconify-icon icon="f7:person"></iconify-icon>
                                    </span>
                                    <input type="text" name="last_name" class="form-control"
                                        placeholder="Enter Last Name" required />
                                    <div class="invalid-feedback">
                                        Please provide your last name.
                                    </div>
                                </div>
                            </div>

                            <!-- Hari & Tgl -->
                            <div class="col-md-6">
                                <label class="form-label">Hari & Tanggal</label>
                                <div class="icon-field has-validation">
                                    <span class="icon">
                                        <iconify-icon icon="f7:person"></iconify-icon>
                                    </span>
                                    <input type="text" id="date-time" name="date_time" class="form-control"
                                        placeholder="Hari, Tanggal, Waktu" readonly required />
                                    <div class="invalid-feedback">
                                        Please provide a valid date and time.
                                    </div>
                                </div>
                            </div>

                            <!-- Kelas -->
                            <div class="col-md-6">
                                <label class="form-label">Kelas</label>
                                <div class="icon-field has-validation">
                                    <span class="icon">
                                        <iconify-icon icon="f7:person"></iconify-icon>
                                    </span>
                                    <input type="text" id="kelas-input" name="kelas" class="form-control"
                                        placeholder="Masukkan Kelas (contoh: 1.1)" required />
                                    <div class="invalid-feedback">
                                        Kelas harus dalam rentang 1.1 sampai 6.12.
                                    </div>
                                </div>
                            </div>

                            <!-- Keperluan -->
                            <div class="col-md-12">
                                <label class="form-label">Keperluan</label>
                                <div class="icon-field has-validation">
                                    <span class="icon">
                                        <iconify-icon icon="f7:person"></iconify-icon>
                                    </span>
                                    <textarea name="keperluan" class="form-control" rows="4" cols="50" placeholder="Enter a description..."
                                        required></textarea>
                                    <div class="invalid-feedback">
                                        Please provide your purpose.
                                    </div>
                                </div>
                            </div>

                            <!-- Submit Button -->
                            <div class="col-md-12">
                                <button class="btn btn-primary-600" type="submit">
                                    Submit form
                                </button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card h-100 p-0">
                    <div
                        class="card-header border-bottom bg-base py-16 px-24 d-flex align-items-center justify-content-between">
                        <h6 class="text-lg fw-semibold mb-0">QR Code Pengunung</h6>
                    </div>
                    <div class="card-body py-16 px-24">
                        <div class="row mb-10">
                            <div class="col-md-6">
                                <div id="qrcode" style="margin-right: 20px;"></div>
                            </div>
                            <div class="col-md-6">
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
    </div>


@endsection
