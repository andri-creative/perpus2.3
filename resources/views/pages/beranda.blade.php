@extends('pages.layouts.main')
@section('title', 'Halaman Home')

@section('css')
    <style>
        .swiper {
            width: 100%;
            height: 100%;
        }

        .swiper-slide {
            text-align: center;
            font-size: 18px;
            background: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .swiper-slide img {
            display: block;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
    </style>

@endsection

@section('contents')
    {{-- Conten Header Gambar --}}
    <div class="container-fluid p-0">
        <img src="homes/images/Tambahkan judul.png" alt="" height="11" class="img-fluid w-100"
            style="height: 450px" />
    </div>

    {{-- Conten search --}}
    <div class="position-relative">
        <div
            class="position-absolute top-50 start-50 translate-middle bg-white col-md-8 col-12 p-4 d-flex flex-column justify-content-center align-items-center shadow">
            <div class="input-group w-100 d-flex flex-wrap">
                <input type="text" class="form-control w-md-100 p-2" placeholder="Cari judul buku, E-ISBN"
                    style="box-shadow: none; border-color: #ced4da" />
                <button class="input-group-text spen-warna text-white">Cari</button>
            </div>
        </div>
    </div>

    {{-- Conten Swiper Rekomendasi --}}
    @include('pages.components.swiper.swiper-rekomendasi')

    {{-- Conten Swiper Dipinjam --}}
    @include('pages.components.swiper.swiper-dipinjam')

    {{-- Conten Swiper Rekomendasi --}}
    @include('pages.components.swiper.swiper-terbaru')
@endsection


@section('script')
    <!-- Swiper JS -->
    <script src="{{ asset('homes/javascript/swiper-bundle.min.js') }}"></script>

    <!-- Initialize Swiper -->
    <script src="{{ asset('homes/javascript/swiper.js') }}"></script>

@endsection
