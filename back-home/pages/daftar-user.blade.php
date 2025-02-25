@extends('layouts.main')


@section('title', 'Daftar User')

@section('content')
    <div class="dashboard-main-body">
        <div class="card h-100 p-0 radius-12">
            <div
                class="card-header border-bottom bg-base py-16 px-24 d-flex align-items-center flex-wrap gap-3 justify-content-between">
                <div class="d-flex flex-wrap align-items-center justify-content-end gap-2">
                    <a href="{{ route('home') }}"
                        class="btn btn-sm btn-primary-600 radius-8 d-inline-flex align-items-center gap-1">
                        <iconify-icon icon="tabler:arrow-back-up" class="text-xl"></iconify-icon>
                        Kembali
                    </a>

                </div>
            </div>
            <!-- Grid User -->
            <div class="card-body p-24">

                <div class="row gy-4">
                    @foreach ($users as $user)
                        <div class="col-xxl-3 col-md-6 user-grid-card">
                            <div class="position-relative border radius-16 overflow-hidden">
                                <img src="https://smpn1sedati.sch.id/wp-content/uploads/2023/01/1-2.jpg" alt=""
                                    class="w-100 object-fit-cover"
                                    style="width: 250px; height: 120px; object-fit: cover; " />

                                <div class="ps-16 pb-16 pe-16 text-center mt--50">
                                    <img src="{{ asset('images/upload/' . $user->photo) ? asset('images/upload/' . $user->photo) : asset('assets/images/users/person.png') }}"
                                        style="width: 100px; height: 100px; object-fit: cover;" alt=""
                                        onerror="this.onerror=null;this.src='{{ asset('assets/images/users/person.png') }}';"
                                        class="border bg-white br-white border-width-2-px w-100-px h-100-px rounded-circle object-fit-cover" />
                                    <h6 class="text-lg mb-0 mt-4">{{ $user->name }}</h6>
                                    <span class="text-secondary-light mb-16">{{ $user->email }}</span>

                                    <div
                                        class="center-border position-relative bg-danger-gradient-light radius-8 p-12 d-flex align-items-center gap-4">
                                        <div class="text-center w-50">
                                            <h6 class="text-md mb-0 text-uppercase">posisi</h6>
                                            <span class="text-secondary-light text-sm mb-0">{{ $user->position }}</span>
                                        </div>
                                        <div class="text-center w-50">
                                            <h6 class="text-md mb-0 text-uppercase">Status</h6>
                                            <span
                                                class="text-secondary-light text-sm mb-0">{{ ucwords($user->status) }}</span>
                                        </div>
                                    </div>
                                    <a href="{{ route('login') }}"
                                        class="bg-primary-50 text-primary-600 bg-hover-primary-600 hover-text-white p-10 text-sm btn-sm px-12 py-12 radius-8 d-flex align-items-center justify-content-center mt-16 fw-medium gap-2 w-100">
                                        Login
                                        <iconify-icon icon="solar:alt-arrow-right-linear"
                                            class="icon text-xl line-height-1"></iconify-icon>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>
        </div>
    </div>
@endsection
