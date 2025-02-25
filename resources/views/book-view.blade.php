@extends('layouts.main')
@section('title', 'Daftar Buku')
@section('conten')
    <!-- Start: Page Banner -->
    <section class="page-banner services-banner">
        <div class="container">
            <div class="banner-header">
                <h2>Buku & Media Listing</h2>
                <span class="underline center"></span>
                <p class="lead">Proin ac eros pellentesque dolor pharetra tempo.</p>
            </div>
            <div class="breadcrumb">
                <ul>
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li>Buku & Media</li>
                </ul>
            </div>
        </div>
    </section>
    <!-- End: Page Banner -->

    <!-- Start: Products Section -->
    <div id="content" class="site-content">
        <div id="primary" class="content-area">
            <main id="main" class="site-main">
                <div class="books-full-width">
                    <div class="container">
                        <!-- Start: Search Section -->
                        <section class="search-filters">
                            <div class="filter-box">
                                <h3>Apa yang kamu cari di perpustakaan?</h3>
                                <form action="{{ url()->current() }}" method="GET"
                                    style="display: flex; justify-content: space-between; gap: 10px;">
                                    <!-- Search Input -->
                                    <div class="form-group" style="flex: 1;">
                                        <input class="form-control" placeholder="Search by Keyword" id="keywords"
                                            name="keywords" type="text" />
                                    </div>
                                    <!-- Category Select -->
                                    <div class="form-group" style="flex: 1;">
                                        <select name="category" id="category" class="form-control">
                                            <option value="">All Categories</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}"
                                                    {{ request('category') == $category->id ? 'selected' : '' }}>
                                                    {{ $category->name_category }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <!-- Search Button -->
                                    <div class="form-group" style="flex: 0.5;">
                                        <input class="form-control btn btn-primary" type="submit" value="Search" />
                                    </div>
                                </form>
                            </div>

                            <div class="clear"></div>
                        </section>
                        <!-- End: Search Section -->


                        <div class="booksmedia-fullwidth">
                            <ul>
                                @if ($book->isEmpty())
                                    <li>Buku Tidak Ada</li>
                                @else
                                    @foreach ($book as $books)
                                        <li>
                                            <figure class="cover-custom">
                                                <a href="{{ route('show.buku', $books->id) }}">
                                                    {{-- <img src="asset('images/books/' . $books->gambar) ? asset('images/books/' . $books->gambar) : asset('assets/images/sampul.png')"
                                                        alt="Book"
                                                        onerror="this.onerror=null;this.src='{{ asset('assets/images/sampul.png') }}';" /> --}}
                                                    <iframe
                                                        src="{{ $books->gambar ?? 'https://www.temankreasi.com/asset/images/gambar/hias-cover-buku-dengan-benang-12.webp' }}"
                                                        height="500" width="400" title="{{ $books->judul_books }}">
                                                    </iframe>
                                                </a>
                                                <figcaption>
                                                    <header>
                                                        <h4>
                                                            <a
                                                                href="{{ route('show.buku', $books->id) }}">{{ $books->judul_books ? $books->judul_books : 'N/A' }}</a>
                                                        </h4>
                                                        <p><strong>Author:</strong> {{ $books->autor_books }}</p>
                                                        <p><strong>ISBN:</strong> {{ $books->isbn_books }}</p>
                                                    </header>
                                                    <p>
                                                        {{ $books->description }}
                                                    </p>
                                                </figcaption>
                                                @if ($books->number_books > 0)
                                                    <div class="jumlah_buku">{{ $books->number_books }}</div>
                                                @else
                                                    <div class="jumlah_buku-red">0</div>
                                                @endif
                                            </figure>
                                        </li>
                                    @endforeach
                                @endif
                            </ul>
                        </div>
                        <nav class="navigation pagination text-center">
                            <h2 class="screen-reader-text">Posts navigation</h2>
                            <div class="nav-links">
                                {{ $book->links('pagination::bootstrap-4') }}
                            </div>
                        </nav>
                    </div>
                    <!-- Start: Staff Picks -->

                    <!-- End: Staff Picks -->
                </div>
            </main>
        </div>
    </div>
    <!-- End: Products Section -->

@endsection
