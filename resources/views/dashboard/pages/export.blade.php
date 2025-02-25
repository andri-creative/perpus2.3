@extends('dashboard.layouts.main')

@section('contents')
    <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
        <h6 class="fw-semibold mb-0">Add Import & Export</h6>
        <ul class="d-flex align-items-center gap-2">
            <li class="fw-medium">
                <a href="index.html" class="d-flex align-items-center gap-1 hover-text-primary">
                    <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
                    Dashboard
                </a>
            </li>
            <li>-</li>
            <li class="fw-medium">Add Import & Export</li>
        </ul>
    </div>

    <div class="row gy-4">
        <div class="col-xl-6">
            <div class="card h-100 p-0">
                <div class="card-header border-bottom bg-base py-16 px-24">
                    <h6 class="text-lg fw-semibold mb-0">
                        Import Buku
                    </h6>
                </div>
                <div class="card-body p-24">
                    <form action="{{ route('import.book.data') }}" method="POST" enctype="multipart/form-data"
                        class="d-flex flex-wrap gap-3 align-items-center">
                        @csrf
                        <div class="form-group col-md-5">
                            <label for="file-upload-name"
                                class="mb-16 border border-neutral-600 fw-medium text-secondary-light px-16 py-12 radius-12 d-inline-flex align-items-center gap-2 bg-hover-neutral-200">
                                <iconify-icon icon="solar:upload-linear" class="text-xl"></iconify-icon>
                                Click to upload Excel File
                                <input name="file" type="file" class="form-control w-auto mt-24 form-control-lg"
                                    id="file-upload-name" accept=".xlsx, .xls, .csv" multiple hidden />
                            </label>
                            <ul id="uploaded-file-names" class="mb-6"></ul>
                        </div>
                        <div class="form-group col-md-5">
                            <button type="submit" class="btn btn-primary-600 radius-8 px-20 py-11">
                                Upload
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-xl-6">
            <div class="card h-100 p-0">
                <div class="card-header border-bottom bg-base py-16 px-24">
                    <h6 class="text-lg fw-semibold mb-0">Download Tempate Import Buku</h6>
                </div>
                <div class="card-body p-24">
                    <div class="d-flex flex-wrap align-items-center gap-3">
                        <a href="{{ route('books.downloadTemplate') }}" class="btn btn-primary-600 radius-8 px-20 py-11">
                            Unduh Template
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-6">
            <div class="card h-100 p-0">
                <div class="card-header border-bottom bg-base py-16 px-24">
                    <h6 class="text-lg fw-semibold mb-0">Export Buku Kembali</h6>
                </div>
                <div class="card-body p-24">
                    <form action="{{ route('book.export') }}" method="GET" class="d-flex flex-wrap gap-3 align-items-end">
                        <!-- Dropdown for Month -->
                        <div class="form-group col-md-5">
                            <label for="month">Bulan</label>
                            <select name="month" id="month" class="form-control">
                                <option value="">Pilih Bulan</option>
                                @foreach (range(1, 12) as $month)
                                    <option value="{{ str_pad($month, 2, '0', STR_PAD_LEFT) }}">
                                        {{ \Carbon\Carbon::createFromFormat('m', $month)->translatedFormat('F') }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Dropdown for Year -->
                        <div class="form-group col-md-5">
                            <label for="year">Tahun</label>
                            <select name="year" id="year" class="form-control">
                                <option value="">Pilih Tahun</option>
                                @for ($year = date('Y'); $year >= 2024; $year--)
                                    <option value="{{ $year }}">{{ $year }}</option>
                                @endfor
                            </select>
                        </div>

                        <!-- Submit Button -->
                        <div class="form-group col-md-1">
                            <button type="submit" class="btn btn-success">Export</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
@endsection
