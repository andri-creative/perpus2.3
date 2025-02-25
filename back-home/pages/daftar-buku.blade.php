@extends('layouts.main')


@section('title', 'Daftar Buku')

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
            <div class="card-body p-24">
                <div class="card-body row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4">
                    @foreach ($book as $books)
                        <a href="{{ route('show.buku' , $books->id) }}" class="col">
                            <div class="card p-3 m-0 position-relative border border-black"
                                style="width: auto; display: flex; justify-content: center; align-items: center; border: 1px solid white;">
                                <div class="text-black text-center">
                                    <!-- Gambar disesuaikan dengan lebar card -->
                                    <div class="image-container">
                                        <img src="{{ $books->images ?? asset('images/books/' . $books->gambar) }}"
                                            onerror="this.onerror=null;this.src='{{ asset('assets/images/sampul.png') }}';"
                                            class="img img-responsive card-img-top rounded" alt="d">
                                    </div>
                                    <div class="bg-base pt-4 text-start">
                                        <h6 class="text-black text-sm long-text">{{ $books->judul_books }}</h6>
                                    </div>
                                    <div class="position-absolute" style="top: 2%; right: 2%">
                                        <div
                                            class="w-40-px h-40-px bg-info text-info-800 rounded-circle d-inline-flex align-items-center justify-content-center text-sm">
                                            {{ $books->number_books }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
