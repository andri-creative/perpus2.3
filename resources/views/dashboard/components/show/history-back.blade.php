@extends('dashboard.layouts.main')

@section('contents')
    <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
        <h6 class="fw-semibold mb-0">Buku</h6>
        <ul class="d-flex align-items-center gap-2">
            <li class="fw-medium">
                <a href="index.html" class="d-flex align-items-center gap-1 hover-text-primary">
                    <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
                    Dashboard
                </a>
            </li>
            <li>-</li>
            <li class="fw-medium">Buku</li>
        </ul>
    </div>

    <div class="card">
        <div class="card-header">
            <div class="d-flex flex-wrap align-items-center justify-content-end gap-2">
                <a href="{{ url()->previous() }}"
                    class="btn btn-sm btn-primary-600 radius-8 d-inline-flex align-items-center gap-1">
                    <iconify-icon icon="pajamas:go-back" class="text-xl"></iconify-icon>
                    Kembali
                </a>
            </div>
        </div>
        <div class="col-lg-12">
            <div id="rackDetails" class="card container">
                <div class="card-body">
                    <h5 class="text-center text-2xl mb-4">
                        {{ $books->book->judul_books ?? 'N/A' }}
                    </h5>
                    <div class="row" style="margin-top: 20px">
                        <div class="col-md-6 d-flex justify-content-end" style="max-width: 300px;">
                            {{-- <img src="{{ asset('images/books/' . $books->book->gambar) ?: asset('assets/images/sampul.png') }}"
                                onerror="this.onerror=null;this.src='{{ asset('assets/images/sampul.png') }}';"
                                class="img-fluid w-100 rounded"
                                style="width: 100%; max-width: 250px; height: auto; object-fit: cover;" alt="Sampul Buku"> --}}
                            <iframe
                                src="{{ $books->book->gambar ?? 'https://www.temankreasi.com/asset/images/gambar/hias-cover-buku-dengan-benang-12.webp' }}"
                                allow="autoplay" class="img-fluid w-100 rounded"
                                style="width: 100%; max-width: 250px; height:400px; object-fit: cover;"
                                title="{{ $books->book->judul_books }}">
                            </iframe>
                        </div>
                        <div class="col-md-6 w-full d-flex justify-content-start">
                            <div class="col-md-12">
                                <div class="row">
                                    <!-- Bagian Kiri -->
                                    <div class="col-md-6">
                                        <div class="col">
                                            <div class="mb-4">
                                                <span class="bg-primary-800 px-20 custom-radius"
                                                    style="width: 200px">ISBN</span>
                                                <ul>
                                                    <li>{{ $books->book->isbn_books ?? 'N/A' }}</li>
                                                </ul>
                                            </div>
                                            <div class="mb-4">
                                                <span class="bg-primary-800 px-20 custom-radius"
                                                    style="width: 200px">Kategori</span>
                                                <ul>
                                                    <li>{{ $books->book->category->name_category ?? 'N/A' }}</li>
                                                </ul>
                                            </div>
                                            <div class="mb-4">
                                                <span class="bg-primary-800 px-20 custom-radius" style="width: 200px">Rak
                                                    Buku</span>
                                                <ul>
                                                    <li>{{ $books->book->rack->name_rack ?? 'N/A' }}</li>
                                                </ul>
                                            </div>
                                            <div class="mb-4">
                                                <span class="bg-primary-800 px-20 custom-radius"
                                                    style="width: 200px">Dipinjam Oleh</span>
                                                <ul>
                                                    <li>{{ $books->borrow->name_borrow ?? 'N/A' }}</li>
                                                </ul>
                                            </div>

                                            <div class="mb-4">
                                                <span class="bg-primary-800 px-20 custom-radius"
                                                    style="width: 200px">Identitas</span>
                                                <ul>
                                                    <li>{{ $books->borrow->id_card ?? 'N/A' }}</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Bagian Kanan -->
                                    <div class="col-md-6">
                                        <div class="col">

                                            <div class="mb-4">
                                                <span class="bg-primary-800 px-20 custom-radius"
                                                    style="width: 200px">Kelas</span>
                                                <ul>
                                                    <li>{{ $books->borrow->position_borrow ?? 'N/A' }}</li>
                                                </ul>
                                            </div>
                                            <div class="mb-4">
                                                <span class="bg-primary-800 px-20 custom-radius" style="width: 200px">User
                                                    Peminjam</span>
                                                <ul>
                                                    <li>{{ $books->borrowedByUser->name ?? 'N/A' }}</li>
                                                </ul>
                                            </div>
                                            <div class="mb-4">
                                                <span class="bg-primary-800 px-20 custom-radius" style="width: 200px">User
                                                    Kembali</span>
                                                <ul>
                                                    <li>{{ $books->returnedByUser->name ?? 'N/A' }}</li>
                                                </ul>
                                            </div>
                                            <div class="mb-4">
                                                <span class="bg-primary-800 px-20 custom-radius"
                                                    style="width: 200px">Departermen
                                                </span>
                                                <ul>
                                                    <li>{{ $books->borrowedByUser->position ?? 'N/A' }}</li>
                                                </ul>
                                            </div>
                                            <div class="mb-4">
                                                <span class="bg-primary-800 px-20 custom-radius"
                                                    style="width: 200px">Status</span>
                                                <ul>
                                                    <li>{{ $books->status ?? 'N/A' }}</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
@endsection
