<div class="container">
    <div style="margin-top: 5rem">
        <div class="d-flex flex-column justify-content-center align-items-center">
            <div class="row text-center">
                <h4 class="quicksand">Buku Terbaru</h4>
                <p class="font-roboto">
                    Jelajahi buku terbaru koleksi perpustakaan Spensased
                </p>
            </div>
            <div class="container my-5">
                <div class="swiper rekomendasiSwiper">
                    <div class="swiper-wrapper mb-5">
                        @foreach ($bukubaru as $b)
                            <div class="swiper-slide">
                                <div class="card" style="width: 400px">
                                    <iframe
                                        src="{{ $b->gambar ?? 'https://drive.google.com/file/d/1ZVtrVPp2LkJOy6z1eXF2gVhoFViUhngq/preview' }}"
                                        class="img-fluid rounded-top card-img-top" style="height: 300px">
                                    </iframe>
                                    <div class="card-body text-start">
                                        <h5 class="card-title" style="font-size: 15px">
                                            {{ $b->judul_books ?? 'Tidak ada judul' }}</h5>
                                        <p class="card-text" style="font-size: 15px">
                                            {{ $b->description ?? 'Tidak ada Diskripsi' }}
                                        </p>
                                    </div>
                                    <div class="card-footer text-footer-card d-flex justify-content-between">
                                        <span class="text-muted">{{ $b->isbn_books ?? 'Tidak ada ISBN' }}</span>
                                        <span class="text-muted">Sisa {{ $b->number_books ?? '0' }}</span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="swiper-pagination rekomendasi"></div>
                </div>
            </div>
        </div>
    </div>
</div>
