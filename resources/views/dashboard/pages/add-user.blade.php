@extends('dashboard.layouts.main')

@section('contents')
    <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
        <h6 class="fw-semibold mb-0">Add User</h6>
        <ul class="d-flex align-items-center gap-2">
            <li class="fw-medium">
                <a href="index.html" class="d-flex align-items-center gap-1 hover-text-primary">
                    <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
                    Dashboard
                </a>
            </li>
            <li>-</li>
            <li class="fw-medium">Add User</li>
        </ul>
    </div>

    <div class="card h-100 p-0 radius-12">
        <div class="card-body p-24">
            <div class="row justify-content-center">
                <div class="col-xxl-12 col-xl-8 col-lg-10">
                    <div class="card border">
                        <div class="card-body">
                            <form action="{{ route('create-user') }}" method="POST" id="myForm">
                                @csrf
                                <div class="row">
                                    <!-- Kolom Kiri -->
                                    <div class="col-md-6">
                                        <div class="mb-20">
                                            <label for="name"
                                                class="form-label fw-semibold text-primary-light text-sm mb-8">Nama Lengkap
                                                <span class="text-danger-600">*</span></label>
                                            <input type="text" class="form-control radius-8" id="name"
                                                name="name_user" placeholder="Enter Full Name" />
                                        </div>
                                        <div class="mb-20">
                                            <label for="email"
                                                class="form-label fw-semibold text-primary-light text-sm mb-8">Email <span
                                                    class="text-danger-600">*</span></label>
                                            <input type="email" class="form-control radius-8" id="email"
                                                name="email_user" placeholder="Enter email address" />
                                        </div>
                                    </div>
                                    <!-- Kolom Kanan -->
                                    <div class="col-md-6">
                                        <div class="mb-20">
                                            <label for="depart"
                                                class="form-label fw-semibold text-primary-light text-sm mb-8">Position
                                                <span class="text-danger-600">*</span></label>
                                            <select class="form-control radius-8 form-select" id="depart"
                                                name="position_user">
                                                <option value="">Select Position</option>
                                                <option value="administrator">Administrator</option>
                                                <option value="user">User</option>
                                                <option value="guest">Guest</option>
                                            </select>
                                        </div>
                                        <div class="mb-20">
                                            <label for="password"
                                                class="form-label fw-semibold text-primary-light text-sm mb-8">Password
                                                <span class="text-danger-600">*</span></label>
                                            <div class="input-group">
                                                <input type="password" class="form-control radius-8" id="password"
                                                    name="password_user" placeholder="Enter Full Name" />
                                                <button type="button" class="input-group-text bg-base"><iconify-icon
                                                        icon="lucide:copy"></iconify-icon> Copy</button>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <span id="generatePassword"
                                                        class="text-primary cursor-pointer text-sm">Generate
                                                        Password
                                                    </span>
                                                </div>
                                                <div class="col-md-6 text-end">
                                                    <span id="togglePassword"
                                                        class="text-primary cursor-pointer text-sm">Show
                                                        Password
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center justify-content-center gap-3">
                                    <button type="button" id="cancel_button"
                                        class="border border-danger-600 bg-hover-danger-200 text-danger-600 text-md px-56 py-11 radius-8">
                                        Batal
                                    </button>
                                    <button type="submit"
                                        class="btn btn-primary border border-primary-600 text-md px-56 py-12 radius-8">
                                        Simpan
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
