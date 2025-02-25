@extends('pages.layouts.main')
@section('title', 'Halaman Home')

@section('css')

@endsection


@section('contents')

    <div class="container-fluid p-0 position-relative  d-flex justify-content-center align-content-center">
        <img src="homes/images/b g-3.png" alt="" class="img-fluid w-100" style="height: 250px" />
        <div class="position-absolute top-50  col-md-1-0 col-12 p-4  d-flex justify-content-center align-content-center ">
            <div class="d-flex justify-content-center align-items-center w-50">
                <input type="text" class="form-control w-md-100 p-2" placeholder="Cari judul buku, E-ISBN"
                    style="box-shadow: none; border-color: #ced4da" />
            </div>
        </div>
    </div>
    <div class=" p-4 w-full" style="background-color: rgba(0, 0, 0, 0.05);"></div>

    <div class="container mt-3">
        <div class="row">
            <!-- Jenis Konten -->
            <div class="col-xl-3 col-lg-4 col-md-12">
                <div class="flex-column border rounded">
                    <form action="{{ route('koleksi') }}" method="GET" id="filterForm">
                        <div class="border-bottom px-4 py-3">
                            <h6>Jenis Konten</h6>
                        </div>
                        <div class="border-bottom px-4 py-3 ">
                            <input type="checkbox" name="buku" value="1" class="form-check-input border-primary"
                                onchange="document.getElementById('filterForm').submit()"
                                {{ request('buku') ? 'checked' : '' }}>
                            <label>Buku</label>

                        </div>
                        <div class="border-bottom px-4 py-3">
                            <h6>Kategori</h6>
                        </div>

                        <div class="border-bottom px-4 py-3">
                            @foreach ($bukuKategori as $bc)
                                <div class="mb-4">
                                    <input type="checkbox" name="categories[]" value="{{ $bc->id }}"
                                        class="form-check-input border-primary"
                                        onchange="document.getElementById('filterForm').submit()"
                                        {{ in_array($bc->id, request('categories', [])) ? 'checked' : '' }}>
                                    <label>{{ $bc->name_category ?? 'Tidak ada kategori' }}</label>
                                </div>
                            @endforeach
                        </div>
                    </form>
                </div>
            </div>
            <!-- Filter Urutan -->
            <div class="col-xl-9 col-lg-8 col-md-12">
                <div class="row mb-5">
                    <div class="d-flex justify-content-between align-items-center border rounded px-4 py-3">
                        <div>
                            <p style="font-size: 12px;">Menampilkan 1 - 1 barang dari total 1 untuk kata kunci
                                "matematika"</p>
                        </div>
                        <form action="{{ route('koleksi') }}" method="GET" id="filterForm">
                            <div>
                                <select class="form-select form-select-sm" name="sort" onchange="this.form.submit()">
                                    <option value="" {{ request('sort') == '' ? 'selected' : '' }}>Urutkan</option>
                                    <option value="asc" {{ request('sort') == 'asc' ? 'selected' : '' }}>A-Z</option>
                                    <option value="desc" {{ request('sort') == 'desc' ? 'selected' : '' }}>Terbaru
                                    </option>
                                </select>
                            </div>
                        </form>

                    </div>
                </div>
                <div class="row border rounded g-3 mb-4 justify-content-center">
                    @foreach ($bukuKoleksi as $bk)
                        <div class="col-12 col-sm-6 col-md-4 d-flex justify-content-center mb-3">
                            <div class="swiper-slide">
                                <div class="card" style="width: 400px">
                                    <iframe
                                        src="{{ $bk->gambar ?? 'https://drive.google.com/file/d/1ZVtrVPp2LkJOy6z1eXF2gVhoFViUhngq/preview' }}"
                                        class="img-fluid rounded-top card-img-top" style="height: 300px">
                                    </iframe>
                                    <div class="card-body text-start">
                                        <h5 class="card-title" style="font-size: 15px">
                                            {{ $bk->judul_books ?? 'Tidak ada judul' }}</h5>
                                        <p class="card-text" style="font-size: 15px">
                                            {{ $bk->description ?? 'Tidak ada Diskripsi' }}
                                        </p>
                                    </div>
                                    <div class="card-footer text-footer-card d-flex justify-content-between">
                                        <span class="text-muted">{{ $bk->isbn_books ?? 'Tidak ada ISBN' }}</span>
                                        <span class="text-muted">Sisa {{ $bk->number_books ?? '0' }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="d-flex justify-content-start">
                    {{ $bukuKoleksi->links('vendor.pagination.bootstrap-4') }}
                </div>
            </div>
        </div>
    </div>

@endsection


@section('script')
    <script>
        document.querySelectorAll('input[name="categories[]"]').forEach((checkbox) => {
            checkbox.addEventListener('change', function() {
                document.getElementById('filterForm').submit();
            });
        });
    </script>

@endsection
