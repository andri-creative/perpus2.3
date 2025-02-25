@extends('layouts.main')


@section('title', 'Detail Buku')

@section('content')

    <div class="dashboard-main-body">
        <div class="card h-100 p-0 radius-12">
            <div
                class="card-header border-bottom bg-base py-16 px-24 d-flex align-items-center flex-wrap gap-3 justify-content-between">
                <div class="d-flex flex-wrap align-items-center justify-content-end gap-2">
                    <a href="{{ route('daftar.buku') }}"
                        class="btn btn-sm btn-primary-600 radius-8 d-inline-flex align-items-center gap-1">
                        <iconify-icon icon="tabler:arrow-back-up" class="text-xl"></iconify-icon>
                        Kembali
                    </a>
                </div>
            </div>
            <div class="card-body p-24">
                <div class="card-body row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4">
                    <div class="card-body">
                        <h5 class="text-center text-2xl mb-4">{{ $books->judul_books ? $books->judul_books : 'N/A' }}</h5>
                        <div class="row" style="margin-top: 20px">
                            <div class="col-md-6 d-flex justify-content-end " style="max-width: 300px;">
                                <img src="{{ asset('images/books/' . $books->gambar) ? asset('images/books/' . $books->gambar) : asset('assets/images/sampul.png') }}"
                                    onerror="this.onerror=null;this.src='{{ asset('assets/images/sampul.png') }}';"
                                    class="img-fluid w-100 rounded"
                                    style="width: 100%; max-width: 250px; height: auto; object-fit: cover;"
                                    alt="Sampul Buku">

                            </div>
                            <div class="col-md-6  w-full d-flex justify-content-start">
                                <div class="col-md-12">
                                    <div class="row ">
                                        <div class="col-md-6">
                                            <div class="col">
                                                <div class="mb-4">
                                                    <div class="bg-primary-300 w-10-px"><span
                                                            class="bg-primary-800 ms-10 px-20  custom-radius"
                                                            style="width: 200px">ISBN</span>
                                                    </div>
                                                    <ul class="ms-10" style="list-style-type: circle;">
                                                        <li>
                                                            {{ $books->isbn_books ? $books->isbn_books : 'N/A' }}</li>
                                                    </ul>
                                                </div>
                                                <div class="mb-4">
                                                    <div class="bg-primary-300 w-10-px"><span
                                                            class="bg-primary-800 ms-10 px-20  custom-radius"
                                                            style="width: 200px">Penyusun</span>
                                                    </div>
                                                    <ul class="ms-10" style="list-style-type: circle;">
                                                        <li>
                                                            {{ $books->autor_books ? $books->autor_books : 'N/A' }}</li>
                                                    </ul>
                                                </div>
                                                <div class="mb-4">
                                                    <div class="bg-primary-300 w-10-px"><span
                                                            class="bg-primary-800 ms-10 px-20  custom-radius"
                                                            style="width: 200px">Penerbit</span>
                                                    </div>
                                                    <ul class="ms-10" style="list-style-type: circle;">
                                                        <li>
                                                            {{ $books->publisher_books ? $books->publisher_books : 'N/A' }}
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="mb-4">
                                                    <div class="bg-primary-300 w-10-px"><span
                                                            class="bg-primary-800 ms-10 px-20  custom-radius"
                                                            style="width: 200px">Tahun</span>
                                                    </div>
                                                    <ul class="ms-10" style="list-style-type: circle;">
                                                        <li>
                                                            {{ $books->year_books ? $books->year_books : 'N/A' }}</li>
                                                    </ul>
                                                </div>
                                                <div class="mb-4">
                                                    <div class="bg-primary-300"
                                                        style="width: 170px;   display: inline-block;">
                                                        <span class="bg-primary-800 ms-10 px-20  custom-radius"
                                                            style="width: 200px">Jumlah
                                                            Halaman</span>
                                                    </div>
                                                    <ul class="ms-10" style="list-style-type: circle;">
                                                        <li>Buku Matematik</li>
                                                    </ul>
                                                </div>
                                                <div class="mb-4">
                                                    <div class="bg-primary-300 w-10-px"><span
                                                            class="bg-primary-800 ms-10 px-20  custom-radius"
                                                            style="width: 200px">Jumlah
                                                            Buku</span>
                                                    </div>
                                                    <ul class="ms-10" style="list-style-type: circle;">
                                                        <li>
                                                            {{ $books->number_books ? $books->number_books : 'N/A' }}</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="col">
                                                <div class="mb-4">
                                                    <div class="bg-primary-300 w-10-px"><span
                                                            class="bg-primary-800 ms-10 px-20  custom-radius"
                                                            style="width: 200px">Kategori</span>
                                                    </div>
                                                    <ul class="ms-10" style="list-style-type: circle;">
                                                        <li>
                                                            {{ $books->category->name_category ? $books->category->name_category : 'N/A' }}
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="mb-4">
                                                    <div class="bg-primary-300 w-10-px"><span
                                                            class="bg-primary-800 ms-10 px-20  custom-radius"
                                                            style="width: 200px">Rak Buku</span>
                                                    </div>
                                                    <ul class="ms-10" style="list-style-type: circle;">
                                                        <li>
                                                            {{ $books->rack->name_rack ?? 'N/A' }}</li>
                                                    </ul>
                                                </div>
                                                <div class="mb-4">
                                                    <div class="bg-primary-300 w-10-px"><span
                                                            class="bg-primary-800 ms-10 px-20  custom-radius"
                                                            style="width: 200px">Sub Buku</span>
                                                    </div>
                                                    <ul class="ms-10" style="list-style-type: circle;">
                                                        <li>
                                                            {{ $books->name_rack ? $books->name_rack : 'N/A' }}</li>
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
    </div>

@endsection
