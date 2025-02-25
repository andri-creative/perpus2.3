@extends('dashboard.layouts.main')

@section('contents')
    <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
        <h6 class="fw-semibold mb-0">Apps Buku</h6>
        <ul class="d-flex align-items-center gap-2">
            <li class="fw-medium">
                <a href="index.html" class="d-flex align-items-center gap-1 hover-text-primary">
                    <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
                    Apps
                </a>
            </li>
            <li>-</li>
            <li class="fw-medium">Buku</li>
        </ul>
    </div>

    <div class="card ">
        <div class="card-header d-flex flex-wrap align-items-center  justify-content-between gap-4">
            <div>
                <h5 class="card-title mb-0">Daftar Buku</h5>
            </div>
            <div class="col-12 col-md-6">
                <form method="GET" action="{{ route('books') }}">
                    <div class="input-group">
                        <select name="category" class="form-select input-group-text " id="category-select">
                            <option>All Categories</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}"
                                    {{ request('category') == $category->id ? 'selected' : '' }}>
                                    {{ $category->name_category }}
                                </option>
                            @endforeach
                        </select>
                        <input type="text" name="search" class="form-control flex-grow-1" placeholder="Search...."
                            value="{{ request('search') }}">
                        <button type="submit" class="btn btn-primary">Cari</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="card-body row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4">
            @foreach ($book as $books)
                <a href="{{ route('books.show', $books->id) }}" class="col">
                    <div class="card p-3 m-0 position-relative"
                        style="width: auto; display: flex; justify-content: center; align-items: center; border: 1px solid white;">
                        <div class="text-black text-center">
                            <!-- Gambar disesuaikan dengan lebar card -->
                            <div class="image-container">
                                <iframe
                                    src="{{ $books->gambar ?? 'https://www.temankreasi.com/asset/images/gambar/hias-cover-buku-dengan-benang-12.webp' }}"
                                    width="100%" height="480" allow="autoplay"
                                    class="img img-responsive card-img-top rounded" title="{{ $books->judul_books }}">
                                </iframe>
                            </div>
                            <div class="bg-base pt-4 text-start">
                                <h6 class="text-black text-sm long-text">{{ $books->judul_books }}</h6>
                                <p class="text-sm">ISBN: <br> <span>{{ $books->isbn_books }}</span></p>
                            </div>
                            <div class="position-absolute" style="top: 2%; right: 2%">
                                <div
                                    class="w-40-px h-40-px
                                {{ $books->number_books == 0 ? 'bg-danger text-white' : 'bg-info text-info-800' }}
                                rounded-circle d-inline-flex align-items-center justify-content-center text-sm">
                                    {{ $books->number_books }}
                                </div>
                            </div>

                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
    {{ $book->links('dashboard/components/vendor/pagination/custom') }}

    {{--  resources\views\dashboard\components\vendor\pagination\custom.blade.php  --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('search-input').addEventListener('keyup', function() {
                document.getElementById('search-form').submit();
            });

            document.getElementById('category-select').addEventListener('change', function() {
                document.getElementById('search-form').submit();
            });
        });
    </script>
@endsection
