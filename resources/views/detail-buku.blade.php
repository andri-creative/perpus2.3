@extends('layouts.main')
@section('title', 'Daftar Buku')
@section('conten')
    <!-- Start: Page Banner -->
    <section class="page-banner services-banner">
        <div class="container">
            <div class="banner-header">
                <h2>Books & Media Listing</h2>
                <span class="underline center"></span>
                <p class="lead">Proin ac eros pellentesque dolor pharetra tempo.</p>
            </div>
            <div class="breadcrumb">
                <ul>
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li>Books & Media</li>
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
                        <section class="search-filters">
                            <div class="filter-box">
                                <h3>What are you looking for at the library?</h3>
                                <a href="{{ route('books.home') }}"
                                    class="btn btn-sm btn-primary radius-8 d-inline-flex align-items-center gap-1">
                                    <iconify-icon icon="tabler:arrow-back-up" class="text-xl"></iconify-icon>
                                    Kembali
                                </a>
                            </div>
                            <div class="clear"></div>
                        </section>
                        <div class="booksmedia-fullwidth">
                            <ul class="row">
                                <li class="col-md-6">
                                    <figure class="cover-custom">
                                        <a href="books-media-detail-v2.html"><img
                                                src="asset('images/books/' . $books->gambar) ? asset('images/books/' . $books->gambar) : asset('assets/images/sampul.png')"
                                                alt="Book"
                                                onerror="this.onerror=null;this.src='{{ asset('assets/images/sampul.png') }}';" /></a>
                                        <div class="jumlah_buku">{{ $books->number_books }}</div>
                                    </figure>

                                </li>
                                <li class="col-md-6" style="padding: 10px; ">
                                    <header>
                                        <h4>
                                            <a href="#">{{ $books->judul_books ? $books->judul_books : 'N/A' }}F</a>
                                        </h4>
                                        <p><strong>Author:</strong> {{ $books->autor_books }}</p>
                                        <p><strong>ISBN:</strong> {{ $books->isbn_books }}</p>
                                        <p><strong>Tahun:</strong> {{ $books->year_books }}</p>
                                        <p><strong>Penerbit:</strong> {{ $books->publisher_books }}</p>
                                        <p><strong>kategori:</strong>
                                            {{ $books->category->name_category ? $books->category->name_category : 'N/A' }}
                                        </p>
                                        <p><strong>Rak:</strong> {{ $books->rack->name_rack ?? 'N/A' }}</p>
                                        <p><strong>Sub Buku:</strong> {{ $books->name_rack ? $books->name_rack : 'N/A' }}
                                        </p>
                                    </header>
                                    <p>
                                        {{ $books->description }}
                                    </p>
                                </li>
                            </ul>
                        </div>

                    </div>
                    <!-- Start: Staff Picks -->

                    <!-- End: Staff Picks -->
                </div>
            </main>
        </div>
    </div>
    <!-- End: Products Section -->

    <!-- Start: Social Network -->
    <section class="social-network section-padding">
        <div class="container">
            <div class="center-content">
                <h2 class="section-title">Follow Us</h2>
                <span class="underline center"></span>
                <p class="lead">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                </p>
            </div>
            <ul>
                <li>
                    <a class="facebook" href="#" target="_blank">
                        <span>
                            <i class="fa fa-facebook-f"></i>
                        </span>
                    </a>
                </li>
                <li>
                    <a class="twitter" href="#" target="_blank">
                        <span>
                            <i class="fa fa-twitter"></i>
                        </span>
                    </a>
                </li>
                <li>
                    <a class="google" href="#" target="_blank">
                        <span>
                            <i class="fa fa-google-plus"></i>
                        </span>
                    </a>
                </li>
                <li>
                    <a class="rss" href="#" target="_blank">
                        <span>
                            <i class="fa fa-rss"></i>
                        </span>
                    </a>
                </li>
                <li>
                    <a class="linkedin" href="#" target="_blank">
                        <span>
                            <i class="fa fa-linkedin"></i>
                        </span>
                    </a>
                </li>
                <li>
                    <a class="youtube" href="#" target="_blank">
                        <span>
                            <i class="fa fa-youtube"></i>
                        </span>
                    </a>
                </li>
            </ul>
        </div>
    </section>
    <!-- End: Social Network -->
@endsection
