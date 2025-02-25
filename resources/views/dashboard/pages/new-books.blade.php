@extends('dashboard.layouts.main')


@section('contents')
    <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
        <h6 class="fw-semibold mb-0">Apps Buku Baru</h6>
        <ul class="d-flex align-items-center gap-2">
            <li class="fw-medium">
                <a href="index.html" class="d-flex align-items-center gap-1 hover-text-primary">
                    <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
                    Apps
                </a>
            </li>
            <li>-</li>
            <li class="fw-medium">Buku Baru</li>
        </ul>
    </div>

    <div class="row gy-4">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Input Buku Baru</h5>
                </div>
                <div class="card-body ">

                    {{-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#model-isbn">
                        Scane
                    </button> --}}

                    <form class="row" action="{{ route('create.books') }}" method="POST">
                        @csrf
                        <div class="col-md-6 gay-6">
                            <div class="row gy-3">
                                <div class="col-12">
                                    <label class="form-label">ISBN</label>
                                    <input type="text" name="isbn_books" id="isbn_books" class="form-control"
                                        placeholder="Masukkan ISBN" />
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Judul Buku</label>
                                    <input type="text" name="judul_books" class="form-control"
                                        placeholder="Masukkan Judul Buku" />
                                    @error('isbn_books')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Jumlah Buku</label>
                                    <input type="text" name="number_books" class="form-control"
                                        placeholder="Masukkan Jumlah Buku" />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 gay-6">
                            <div class="row gy-3">

                                <div class="col-12">
                                    <label class="form-label">Kode Kategori</label>
                                    <input type="text" name="code_category" id="code_category" class="form-control"
                                        placeholder="Masukkan Kode Kategori" />
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Nama Kategori</label>
                                    <input type="text" name="name_category" id="name_category" class="form-control"
                                        placeholder="Masukkan Nama Kategori" readonly />
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Nomor Rak</label>
                                    <select name="id_rack" id="rak" class="form-select">
                                        <option selected disabled>&#60&#61&#61&#61&#61 Nomor &#61&#61&#61&#61&#62</option>
                                        @foreach ($rack_all as $racks)
                                            <option value="{{ $racks->id }}">{{ $racks->name_rack }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Sub Nomor</label>
                                    <select name="name_rack" id="subs" class="form-select">
                                        <option selected disabled>&#60&#61&#61&#61&#61 Nomor &#61&#61&#61&#61&#62</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 gay-6 mt-3">
                            <button type="submit" id="uploadButton" class="btn btn-primary-600">
                                Unggah
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
