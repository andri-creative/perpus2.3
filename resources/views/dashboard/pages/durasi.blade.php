@extends('dashboard.layouts.main')

@section('contents')
    <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
        <h6 class="fw-semibold mb-0">Setting Durasi</h6>
        <ul class="d-flex align-items-center gap-2">
            <li class="fw-medium">
                <a href="index.html" class="d-flex align-items-center gap-1 hover-text-primary">
                    <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
                    Setting
                </a>
            </li>
            <li>-</li>
            <li class="fw-medium">Durasi</li>
        </ul>
    </div>

    <div class="row gy-4" id="some">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Durasi Peminjaman</h5>
                </div>
                <div class="card-body">
                    <ul class="list-group radius-8 mb-6">
                        @foreach ($durasiData as $item)
                            <li class="list-group-item d-flex align-items-center justify-content-between border text-secondary-light p-16 bg-base"
                                data-id="{{ $item->id }}">
                                <div class="d-flex align-items-center gap-2">
                                    <span class="editable-category">{{ $item->category }}</span>
                                    <span class="editable-duration">{{ $item->default_duration }}</span> Bulan
                                </div>
                                <div>

                                    <span class="text-xs bg-success-100 text-success-600 radius-4 px-10 py-6 fw-semibold edit-durasi">
                                        <iconify-icon icon="uil:edit" class="text-xl"></iconify-icon>
                                    </span>
                                    <span class="text-xs bg-primary-100 text-primary-600 radius-4 px-10 py-6 fw-semibold dalete-durasi">
                                        <iconify-icon icon="weui:delete-on-filled" class="text-xl"></iconify-icon>
                                    </span>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                    <div>
                        <button type="button" id="addRow"
                            class="btn btn-sm btn-primary-600 radius-8 d-inline-flex align-items-center gap-1 mt-4">
                            <iconify-icon icon="simple-line-icons:plus" class="text-xl"></iconify-icon>
                            Tambah Baru
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div id="newDurationForm" class="col-md-6 d-none">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Input Durasi Baru</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('durations.store') }}" method="POST" class="row gy-3">
                        @csrf
                        <div class="">
                            <label class="form-label">Kategori Durasi</label>
                            <input type="text" name="category" value="" class="form-control" required />
                        </div>
                        <div class="">
                            <label class="form-label">Durasi Bulan</label>
                            <input type="text" name="duration" value="" class="form-control" required />
                        </div>
                        <div class="col-12">
                            <button class="btn btn-primary-600" type="submit">
                                Save
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
