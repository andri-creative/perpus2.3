@extends('dashboard.layouts.main')

@section('contents')
    <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
        <h6 class="fw-semibold mb-0">Dashboard</h6>
        <ul class="d-flex align-items-center gap-2">
            <li class="fw-medium">
                <a href="index.html" class="d-flex align-items-center gap-1 hover-text-primary">
                    <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
                    Dashboard
                </a>
            </li>
            <li>-</li>
            <li class="fw-medium">AI</li>
        </ul>
    </div>

    <div class="row row-cols-xxxl-5 row-cols-lg-3 row-cols-sm-2 row-cols-1 gy-4">
        <div class="col">
            <div class="card shadow-none border bg-gradient-start-1 h-100">
                <div class="card-body p-20">
                    <div class="d-flex flex-wrap align-items-center justify-content-between gap-3">
                        <div>
                            <p class="fw-medium text-primary-light mb-1">Total Users</p>
                            <h6 class="mb-0">{{ $totalUsers }}</h6>
                        </div>
                        <div
                            class="w-50-px h-50-px bg-cyan rounded-circle d-flex justify-content-center align-items-center">
                            <iconify-icon icon="gridicons:multiple-users" class="text-white text-2xl mb-0"></iconify-icon>
                        </div>
                    </div>
                    <p class="fw-medium text-sm text-primary-light mt-12 mb-0">
                        <span class="{{ $usersLast30Days >= 0 ? 'text-success-main' : 'text-danger-main' }}">
                            <iconify-icon icon="{{ $usersLast30Days >= 0 ? 'bxs:up-arrow' : 'bxs:down-arrow' }}"
                                class="text-xs"></iconify-icon>
                            {{ $usersLast30Days >= 0 ? '+' : '' }}{{ $usersLast30Days }}
                        </span>
                        Pengguna 30 hari terakhir
                    </p>
                </div>
            </div>
            <!-- card end -->
        </div>
        <div class="col">
            <div class="card shadow-none border bg-gradient-start-2 h-100">
                <div class="card-body p-20">
                    <div class="d-flex flex-wrap align-items-center justify-content-between gap-3">
                        <div>
                            <p class="fw-medium text-primary-light mb-1">
                                Total Judul Buku
                            </p>
                            <h6 class="mb-0">{{ $totalBooks }}</h6>
                        </div>
                        <div
                            class="w-50-px h-50-px bg-purple rounded-circle d-flex justify-content-center align-items-center">
                            <iconify-icon icon="mdi:book-open-page-variant" class="text-white text-2xl mb-0"></iconify-icon>
                        </div>
                    </div>
                    <p class="fw-medium text-sm text-primary-light mt-12 mb-0">
                        <span class="{{ $booksTrendColor }}">
                            <iconify-icon icon="{{ $booksTrendIcon }}" class="text-xs"></iconify-icon>
                            {{ $booksDifference >= 0 ? '+' : '' }}{{ $booksDifference }}
                        </span>
                        Perubahan 30 hari terakhir
                    </p>
                </div>
            </div>
            <!-- card end -->
        </div>
        <div class="col">
            <div class="card shadow-none border bg-gradient-start-3 h-100">
                <div class="card-body p-20">
                    <div class="d-flex flex-wrap align-items-center justify-content-between gap-3">
                        <div>
                            <p class="fw-medium text-primary-light mb-1">
                                Buku Dipinjam
                            </p>
                            <h6 class="mb-0">{{ $borrowedBooks }}</h6>
                        </div>
                        <div
                            class="w-50-px h-50-px bg-info rounded-circle d-flex justify-content-center align-items-center">
                            <iconify-icon icon="fluent:book-number-20-filled"
                                class="text-white text-2xl mb-0"></iconify-icon>
                        </div>
                    </div>
                    <p class="fw-medium text-sm text-primary-light mt-12 mb-0">
                        <span class="{{ $borrowedTrendColor }}">
                            <iconify-icon icon="{{ $borrowedTrendIcon }}" class="text-xs"></iconify-icon>
                            {{ $borrowedDifference >= 0 ? '+' : '' }}{{ $borrowedDifference }}
                        </span>
                        Dipinjam 30 hari terakhir
                    </p>
                </div>
            </div>
            <!-- card end -->
        </div>
        <div class="col">
            <div class="card shadow-none border bg-gradient-start-4 h-100">
                <div class="card-body p-20">
                    <div class="d-flex flex-wrap align-items-center justify-content-between gap-3">
                        <div>
                            <p class="fw-medium text-primary-light mb-1">
                                Buku Dikembalikan
                            </p>
                            <h6 class="mb-0">{{ $returnedBooks }}</h6>
                        </div>
                        <div
                            class="w-50-px h-50-px bg-success-main rounded-circle d-flex justify-content-center align-items-center">
                            <iconify-icon icon="solar:wallet-bold" class="text-white text-2xl mb-0"></iconify-icon>
                        </div>
                    </div>
                    <p class="fw-medium text-sm text-primary-light mt-12 mb-0">
                        <span class="text-success-main"><iconify-icon icon="bxs:up-arrow" class="text-xs"></iconify-icon>
                            {{ $usersLast30Days }}</span>
                        Pengguna baru 30 hari terakhir
                    </p>
                </div>
            </div>
            <!-- card end -->
        </div>
        <div class="col">
            <div class="card shadow-none border bg-gradient-start-5 h-100">
                <div class="card-body p-20">
                    <div class="d-flex flex-wrap align-items-center justify-content-between gap-3">
                        <div>
                            <p class="fw-medium text-primary-light mb-1">
                                Total Pengunjung
                            </p>
                            <h6 class="mb-0">{{ $totalPengunjug }}</h6>
                        </div>
                        <div class="w-50-px h-50-px bg-red rounded-circle d-flex justify-content-center align-items-center">
                            <iconify-icon icon="fa6-solid:user" class="text-white text-2xl mb-0"></iconify-icon>
                        </div>
                    </div>
                    <p class="fw-medium text-sm text-primary-light mt-12 mb-0">
                        <span class="{{ $borrowedTrendColor }}">
                            <iconify-icon icon="{{ $borrowedTrendIcon }}" class="text-xs"></iconify-icon>
                            {{ $selisihtahun >= 0 ? '+' : '' }}{{ $selisihtahun }}
                        </span>
                        Total Pengunjung (Tahun Ini vs Tahun Kemarin)
                    </p>
                </div>
            </div>
            <!-- card end -->
        </div>
        <div class="col">
            <div class="card shadow-none border bg-gradient-start-5 h-100">
                <div class="card-body p-20">
                    <div class="d-flex flex-wrap align-items-center justify-content-between gap-3">
                        <div>
                            <p class="fw-medium text-primary-light mb-1">
                                Keluar
                            </p>
                            <h6 class="mb-0">{{ $totalPengunjungKeluar }}</h6>
                        </div>
                        <div class="w-50-px h-50-px bg-red rounded-circle d-flex justify-content-center align-items-center">
                            <iconify-icon icon="fa6-solid:user" class="text-white text-2xl mb-0"></iconify-icon>
                        </div>
                    </div>
                    <p class="fw-medium text-sm text-primary-light mt-12 mb-0">
                        <span class="{{ $borrowedTrendColor }}">
                            <iconify-icon icon="{{ $borrowedTrendIcon }}" class="text-xs"></iconify-icon>
                            {{ $selisih >= 0 ? '+' : '' }}{{ $selisih }}
                        </span>
                        Pengunjung Keluar (Bulan Ini vs Bulan Sebelumnya)
                    </p>
                </div>
            </div>
            <!-- card end -->
        </div>
        <div class="col">
            <div class="card shadow-none border bg-gradient-start-5 h-100">
                <div class="card-body p-20">
                    <div class="d-flex flex-wrap align-items-center justify-content-between gap-3">
                        <div>
                            <p class="fw-medium text-primary-light mb-1">
                                Total Sisa Buku
                            </p>
                            <h6 class="mb-0">{{ $totalSisa }}</h6>
                        </div>
                        <div
                            class="w-50-px h-50-px bg-success-main rounded-circle d-flex justify-content-center align-items-center">
                            <iconify-icon icon="lets-icons:book-check-duotone"
                                class="text-white text-2xl mb-0"></iconify-icon>
                        </div>
                    </div>
                    <p class="fw-medium text-sm text-primary-light mt-12 mb-0">
                        <span class="{{ $borrowedTrendColor }}">
                            <iconify-icon icon="{{ $borrowedTrendIcon }}" class="text-xs"></iconify-icon>
                            {{ $borrowedDifference >= 0 ? '+' : '' }}{{ $totalSisa }}
                        </span>
                        Dipinjam 30 hari terakhir
                    </p>
                </div>
            </div>
            <!-- card end -->
        </div>

    </div>

    <div class="row gy-4 mt-1">
        <div class="col-xxl-6 col-xl-12">
            <div class="card h-100">
                <div class="card-body">
                    <div class="d-flex flex-wrap align-items-center justify-content-between">
                        <h6 class="text-lg mb-0">Jumlah Buku per Bulan</h6>
                        <select id="yearSelector" class="form-select bg-base form-select-sm w-auto">
                            @for ($year = 2024; $year <= date('Y'); $year++)
                                <option value="{{ $year }}" {{ $year == date('Y') ? 'selected' : '' }}>
                                    {{ $year }}</option>
                            @endfor
                        </select>
                    </div>
                    <div class="d-flex flex-wrap align-items-center gap-2 mt-8">
                        <h6 class="mb-0" id="booksCurrentYear">0 Buku</h6>
                        <span id="trendIndicator"
                            class="text-sm fw-semibold rounded-pill bg-success-focus text-success-main border br-success px-8 py-4 line-height-1 d-inline-flex align-items-center gap-1">
                            <span></span>
                            <iconify-icon icon="bxs:up-arrow" class="text-xs"></iconify-icon>
                        </span>
                        <span class="text-xs fw-medium" id="percentageChange">+0.00%</span>
                    </div>
                    <div id="LineBukuchart" class="pt-28 apexcharts-tooltip-style-1"></div>
                </div>
            </div>
        </div>
        <div class="col-xxl-3 col-xl-6">
            <div class="card h-100 radius-8 border">
                <div class="card-body p-24">
                    <h6 class="mb-12 fw-semibold text-lg mb-16">
                        Status Peminjaman
                    </h6>
                    <div id="pieChartStatusPeminjamanBaru"></div>
                </div>
            </div>
        </div>
        <div class="col-xxl-3 col-xl-6">
            <div class="card h-100 radius-8 border-0 overflow-hidden">
                <div class="card-body p-24">
                    <h6 class="mb-12 fw-semibold text-lg mb-16">
                        Jumlah Buku Tersedia vs. Dipinjam
                    </h6>
                    <div id="groupColumnBarChartBaru"></div>
                </div>
            </div>
        </div>

        <div class="col-xxl-8 col-xl-12">
            <div class="card h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center flex-wrap gap-2 justify-content-between">
                        <h6 class="mb-2 fw-bold text-lg mb-0">Total Masuk & Keluar Pengunjung</h6>
                    </div>

                    <ul class="d-flex flex-wrap align-items-center mt-3 gap-3">
                        <li class="d-flex align-items-center gap-2">
                            <span class="w-12-px h-12-px rounded-circle bg-primary-600"></span>
                            <span class="text-secondary-light text-sm fw-semibold">Total Pengunjung:
                                <span class="text-primary-light fw-bold" id="totalPengunjungTahunan"></span>
                            </span>
                        </li>
                        <li class="d-flex align-items-center gap-2">
                            <span class="w-12-px h-12-px rounded-circle bg-yellow"></span>
                            <span class="text-secondary-light text-sm fw-semibold">Total Keluar:
                                <span class="text-primary-light fw-bold" id="totalKeluarTahunan"></span>
                            </span>
                        </li>
                    </ul>

                    <div class="mt-40">
                        <div id="visitorAndExit" class="margin-16-minus"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xxl-4 col-lg-6">
            <div class="card h-100 radius-8 border-0">
                <div class="card-body p-24">
                    <div class="d-flex align-items-center flex-wrap gap-2 justify-content-between">
                        <h6 class="mb-2 fw-bold text-lg">Keterlambatan</h6>
                    </div>

                    <div class="position-relative">
                        <span
                            class="w-80-px h-80-px bg-base shadow text-primary-light fw-semibold text-xl d-flex justify-content-center align-items-center rounded-circle position-absolute end-0 top-0 z-1 persentase-terlambat">+</span>
                        <div id="keterlambatanDonutChart"
                            class="mt-36 flex-grow-1 apexcharts-tooltip-z-none title-style circle-none"></div>
                        <span
                            class="w-80-px h-80-px bg-base shadow text-primary-light fw-semibold text-xl d-flex justify-content-center align-items-center rounded-circle position-absolute start-0 bottom-0 z-1 persentase-tepat-waktu">+</span>
                    </div>

                    <ul class="d-flex flex-wrap align-items-center justify-content-between mt-3 gap-3">
                        <li class="d-flex align-items-center gap-2">
                            <span class="w-12-px h-12-px radius-2 bg-primary-600"></span>
                            <span class="text-secondary-light text-sm fw-normal">Tepat Waktu:
                                <span class="text-primary-light fw-bold tepatWaktu"></span>
                            </span>
                        </li>
                        <li class="d-flex align-items-center gap-2">
                            <span class="w-12-px h-12-px radius-2 bg-yellow"></span>
                            <span class="text-secondary-light text-sm fw-normal">Terlambat:
                                <span class="text-primary-light fw-bold terlambat"></span>
                            </span>
                        </li>
                    </ul>

                </div>
            </div>
        </div>
    </div>
@endsection
