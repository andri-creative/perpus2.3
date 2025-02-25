@extends('dashboard.layouts.main')

@section('contents')
    <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
        <h6 class="fw-semibold mb-0">Sub Rack</h6>
        <ul class="d-flex align-items-center gap-2">
            <li class="fw-medium">
                <a href="index.html" class="d-flex align-items-center gap-1 hover-text-primary">
                    <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
                    Dashboard
                </a>
            </li>
            <li>-</li>
            <li class="fw-medium">Sub Rack</li>
        </ul>
    </div>

    <div class="card">
        <div class="card-header">
            <div class="d-flex flex-wrap align-items-center justify-content-start">
                <h5 class="card-title mb-0">Input Custom Styles</h5>
            </div>
            <div class="d-flex flex-wrap align-items-center justify-content-end gap-2">
                <a href="{{ url()->previous() }}"
                    class="btn btn-sm btn-primary-600 radius-8 d-inline-flex align-items-center gap-1">
                    <iconify-icon icon="pajamas:go-back" class="text-xl"></iconify-icon>
                    Kembali
                </a>
                <a href="javascript:void(0)" id="editButton"
                    class="btn btn-sm btn-success radius-8 d-inline-flex align-items-center gap-1">
                    <iconify-icon icon="uil:edit" class="text-xl"></iconify-icon>
                    Edit
                </a>
                <a href="javascript:void(0)" id="cancelButton" style="display: none;"
                    class="btn btn-sm btn-secondary radius-8 d-inline-flex align-items-center gap-1">
                    <iconify-icon icon="uil:times-circle" class="text-xl"></iconify-icon>
                    Cancel
                </a>
                {{--  <a href="{{ route('delete.sub', $subs->id) }}"
                    class="btn btn-sm btn-warning radius-8 d-inline-flex align-items-center gap-1">
                    <iconify-icon icon="solar:download-linear" class="text-xl"></iconify-icon>
                    Delete
                </a>  --}}

            </div>
        </div>
        <div class="col-lg-12">
            <div id="rackDetails" class="card container text-center p-5 ">
                <div class="row align-items-stretch">
                    <!-- Kolom Gambar -->
                    <div class="col-md-6 text-end d-flex align-items-center justify-content-end text-end">
                        <img class="rounded" src="{{ asset('assets/images/components/rack.jpg') }}" width="250"
                            alt="">
                    </div>
                    <!-- Kolom Teks -->
                    <div class="col-md-4 border rounded text-start p-3 d-flex flex-column justify-content-start">
                        <h5 class="text-sm text-black mb-3">
                            Rak buku di perpustakaan digunakan untuk menyimpan dan mengatur buku-buku berdasarkan kategori,
                            seperti fiksi dan non-fiksi, agar mudah ditemukaDn oleh pengunjung.📚
                        </h5>
                        <div class="col text-black drak:black">
                            <div class="col-md-12">
                                <div class="d-flex col">
                                    <div class="w-full ">
                                        <p>Id Subs</p>
                                        <p>Code Subs</p>
                                        <p>Code Subs</p>
                                    </div>
                                    <div class="ms-10">
                                        <p>:{{ $subs->id }}</p>
                                        <p>:{{ $subs->code_sub }}</p>
                                        <p>:{{ $subs->rack->name_rack }}</p>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
            <div class="card" id="editForm" style="display: none;">
                <div class="card-body">
                    <form action="{{ route('update.sub', $subs->id) }}" method="POST" class="row gy-3">
                        @csrf
                        @method('PUT')
                        <input type="text" name="id" value="{{ $subs->id }}">
                        <div class="col-6">
                            <label class="form-label">Code Category</label>
                            <input type="text" name="code_sub" class="form-control" placeholder="Input category code"
                                value="{{ $subs->code_sub }}">
                        </div>
                        <div class="col-6">
                            <label class="form-label">Code Rack</label>
                            <select name="code_rack" class="form-control" id="">
                                <option selected disabled>Opcion</option>
                                @foreach ($rack as $racks)
                                    <option value="{{ $racks->id }}"
                                        {{ $racks->id == $selectedRackId ? 'selected' : '' }}>
                                        {{ $racks->code_rack }}
                                    </option>
                                @endforeach
                            </select>
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
