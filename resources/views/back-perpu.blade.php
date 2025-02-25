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
                        <form id="searchForm" action="{{ route('maks.pengujung') }}" method="GET" class="mb-4">
                            <div class="cutom-grub input-group ">
                                <input type="text" name="search" " id="searchInput"  class="form-control" placeholder="Cari nama..."
                                            value="{{ request('search') }}">
                                    </div>
                                </form>
                                <div id="searchResults"></div>
                            </div>
                    </div>
                    </main>
                </div>
            </div>
            <!-- End: Products Section -->

@endsection
