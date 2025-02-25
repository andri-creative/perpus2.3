@extends('dashboard.layouts.main')

@section('contents')
    <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
        <h6 class="fw-semibold mb-0">Apps Kategori</h6>
        <ul class="d-flex align-items-center gap-2">
            <li class="fw-medium">
                <a href="index.html" class="d-flex align-items-center gap-1 hover-text-primary">
                    <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
                    Apps
                </a>
            </li>
            <li>-</li>
            <li class="fw-medium">Kategori</li>
        </ul>
    </div>

    <div class="row gy-4">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h6 class="card-title mb-0">Input Kategori</h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('create.category') }}" method="POST" class="row gy-3">
                        @csrf
                        <div class="col-12">
                            <label class="form-label">Kode Kategori</label>
                            <input type="text" name="code_category" class="form-control"
                                placeholder="Input category code">
                        </div>
                        <div class="col-12">
                            <label class="form-label">Nama Kategori</label>
                            <input type="text" name="name_category" class="form-control"
                                placeholder="Input category name">
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary-600">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h6 class="card-title mb-0">Tabel Kategori</h6>
                </div>
                <div class="card-body">
                    @include('dashboard/components/tables/category/tabel-category')
                </div>
            </div>
        </div>
    </div>
@endsection
