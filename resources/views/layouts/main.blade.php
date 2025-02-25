<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1" />

    <!-- Title -->
    <title>
        @yield('title')- Perpustkkan digital
    </title>

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('assets/images/favicon.ico') }}" sizes="16x16" />

    <!-- Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i%7CLato:100,100i,300,300i,400,400i,700,700i,900,900i"
        rel="stylesheet" />
    <link href="{{ asset('home/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" />

    <!-- Mobile Menu -->
    <link href="{{ asset('home/css/mmenu.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('home/css/mmenu.positioning.css') }}" rel="stylesheet" type="text/css" />

    <!-- Stylesheet -->
    <link href="{{ asset('home/style.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('home/cutem.css') }}" rel="stylesheet" type="text/css" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <style>
        .hgt-qr,
        .hgt-form {
            height: 80vh;

        }

        .contact-map {
            padding: 10rem;
        }

        .mb-10 {
            margin-bottom: 2rem;
        }

        .mb-4 {
            margin-bottom: 10px;
        }

        .search-filters {
            display: flex !important;
            justify-content: between !important;
        }

        .cover-custom {
            position: relative;
        }

        .jumlah_buku {
            position: absolute;
            top: 0;
            right: 0;
            padding: 1rem;
            background: #4CC9FE;
            font: bold;
            color: white;
            border-radius: 0 0 0 5px;
            width: 40px;
            height: 40px;
            text-align: center;
        }

        .jumlah_buku-red {
            position: absolute;
            top: 0;
            right: 0;
            padding: 1rem;
            background: #fe4c4c;
            font: bold;
            color: white;
            border-radius: 0 0 0 5px;
            width: 40px;
            height: 40px;
            text-align: center;
        }


        .cos-footer {
            padding: 1.6rem 0rem 1.6rem 0rem;
        }

        .footer-widgets {
            width: 100%;
            background: violet !important;
            display: flex;
            justify-content: center;
        }

        .footer-cutom {
            width: 100% !important;
            display: flex !important;
            justify-content: center !important;
        }

        #resultTable {
            display: none;
        }

        .clear-icon {
            font-size: 18px;
            color: gray;
            padding: 5px;
            background: gary;
            height: 100%;
            width: 50px;
            text-align: center;
            display: flex;
            justify-content: center;
            align-items: center;
            cursor: pointer;
            border-left: 1px solid #ccc;
        }

        .clear-icon:hover {
            color: red;
        }

        .input-clear {

            height: 100%;
            flex: 1;
            border-right: none;
        }

        .posisi-input-clear {
            display: flex;
            align-items: center;
            height: 60px;
            border: 1px solid gray;
            border-radius: 5px;
            overflow: hidden;
        }

        #tabel-scroal {
            width: 100%;
            overflow-x: auto;
        }

        .table {
            margin-bottom: 0;
        }
    </style>
</head>

<body>
    <!-- Start: Header Section -->
    <header id="header-v1" class="navbar-wrapper">
        <div class="container">
            <div class="row">
                <nav class="navbar navbar-default">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="navbar-header">
                                <div class="navbar-brand">
                                    <h1>
                                        <a href="{{ route('home') }}">
                                            <img width="80" height="80"
                                                src="https://smpn1sedati.sch.id/wp-content/uploads/2018/08/cropped-favicon.png"
                                                alt="Perpus" />
                                        </a>
                                    </h1>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <!-- Header Topbar -->
                            <div class="header-topbar hidden-sm hidden-xs">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="topbar-info">
                                            <!-- <a href="tel:+61-3-8376-6284"
                          ><i class="fa fa-phone"></i>+61-3-8376-6284</a
                        >
                        <span>/</span>
                        <a href="mailto:support@libraria.com"
                          ><i class="fa fa-envelope"></i>support@libraria.com</a
                        > -->
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="topbar-links">
                                            <a href="{{ route('login') }}"><i class="fa fa-lock"></i>Login</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="navbar-collapse hidden-sm hidden-xs">
                                <ul class="nav navbar-nav">
                                    <li class="dropdown {{ Request::routeIs('home') ? 'active' : '' }}">
                                        <a data-toggle="dropdown" class="dropdown-toggle disabled"
                                            href="{{ route('home') }}">Home</a>
                                    </li>
                                    <li class="dropdown {{ Request::routeIs('books.home') ? 'active' : '' }}">
                                        <a data-toggle="dropdown" class="dropdown-toggle disabled"
                                            href="{{ route('books.home') }}">Books &amp; Media</a>
                                    </li>

                                    <li class="dropdown {{ Request::is('news-events-list-view') ? 'active' : '' }}">
                                        <a data-toggle="dropdown" class="dropdown-toggle disabled"
                                            href="{{ route('treker') }}">Pengunjung &amp; Perpustakaan</a>
                                    </li>
                                </ul>

                            </div>
                        </div>
                    </div>
                    <div class="mobile-menu hidden-lg hidden-md">
                        <a href="#mobile-menu"><i class="fa fa-navicon"></i></a>
                        <div id="mobile-menu">
                            <ul>
                                <li class="mobile-title">
                                    <h4>Navigation</h4>
                                    <a href="#" class="close"></a>
                                </li>
                                <li class="{{ Request::routeIs('home') ? 'active' : '' }}">
                                    <a href="{{ route('home') }}">Home</a>
                                </li>
                                <li class="{{ Request::routeIs('books.home') ? 'active' : '' }}">
                                    <a href="{{ route('books.home') }}">Books &amp; Media</a>
                                </li>
                                <li class="{{ Request::routeIs('treker') ? 'active' : '' }}">
                                    <a href="{{ route('treker') }}">Pengunjung &amp; Perpustakaan</a>
                                </li>
                                <li class="{{ Request::routeIs('login') ? 'active' : '' }}">
                                    <a href="{{ route('login') }}">Login Admin</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </header>
    <!-- End: Header Section -->

    @yield('conten')
    <!-- Start: Slider Section -->


    <footer class="site-footer">
        <div class="container">
            <div class="row cos-footer">
                <div class="col-md-8">
                    <p>&copy; <span>Perpustakaan Digital Project 2024-2025</span>. <br> "Melayani dengan dedikasi untuk
                        membangun generasi yang cerdas dan berpengetahuan."</p>
                </div>
                <div class="col-md-2"></div>

            </div>
        </div>
    </footer>

    <!-- End: Footer -->

    <!-- jQuery Latest Version 1.x -->
    <script type="text/javascript" src="{{ asset('home/js/jquery-1.12.4.min.js') }}"></script>

    <!-- jQuery UI -->
    <script type="text/javascript" src="{{ asset('home/js/jquery-ui.min.js') }}"></script>

    <!-- jQuery Easing -->
    <script type="text/javascript" src="{{ asset('home/js/jquery.easing.1.3.js') }}"></script>

    <!-- Bootstrap -->
    <script type="text/javascript" src="{{ asset('home/js/bootstrap.min.js') }}"></script>

    <!-- Mobile Menu -->
    <script type="text/javascript" src="{{ asset('home/js/mmenu.min.js') }}"></script>

    <!-- Harvey - State manager for media queries -->
    <script type="text/javascript" src="{{ asset('home/js/harvey.min.js') }}"></script>

    <!-- Waypoints - Load Elements on View -->
    <script type="text/javascript" src="{{ asset('home/js/waypoints.min.js') }}"></script>

    <!-- Facts Counter -->
    <script type="text/javascript" src="{{ asset('home/js/facts.counter.min.js') }}"></script>

    <!-- MixItUp - Category Filter -->
    <script type="text/javascript" src="{{ asset('home/js/mixitup.min.js') }}"></script>

    <!-- Owl Carousel -->
    <script type="text/javascript" src="{{ asset('home/js/owl.carousel.min.js') }}"></script>

    <!-- Accordion -->
    <script type="text/javascript" src="{{ asset('home/js/accordion.min.js') }}"></script>

    <!-- Responsive Tabs -->
    <script type="text/javascript" src="{{ asset('home/js/responsive.tabs.min.js') }}"></script>

    <!-- Responsive Table -->
    <script type="text/javascript" src="{{ asset('home/js/responsive.table.min.js') }}"></script>

    <!-- Masonry -->
    <script type="text/javascript" src="{{ asset('home/js/masonry.min.js') }}"></script>

    <!-- Carousel Swipe -->
    <script type="text/javascript" src="{{ asset('home/js/carousel.swipe.min.js') }}"></script>

    <!-- bxSlider -->
    <script type="text/javascript" src="{{ asset('home/js/bxslider.min.js') }}"></script>

    <!-- Custom Scripts -->
    <script type="text/javascript" src="{{ asset('home/js/main.js') }}"></script>

    <!-- Qr Code -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>
    {{-- <script src="{{ asset('assets/js/pengunjung.js') }}"></script> --}}
    {{-- <script src="https://cdn.jsdelivr.net/npm/qrcode/build/qrcode.min.js"></script> --}}

    <script src="{{ asset('home/js/sistem-sherch.js') }}"></script>


    @yield('script')

    {{--  @include('layouts.script')  --}}

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


    <script>
        $(document).ready(function() {
            $('#tabel-scroal').DataTable({
                'paging': false,
                "scrollCollapse": true,
                "scrollY": '200px'
            })
        })
    </script>

    <script>
        const baseUrl = window.location.origin;
        const relativePath = "http://127.0.0.1:8000/pengujung";
        const link = baseUrl + relativePath;

        // Buat QR Code
        QRCode.toCanvas(document.getElementById('qrcode'), link, {
            width: 200
        }, function(error) {
            if (error) console.error(error);
            console.log('QR Code generated!');
        });
    </script>



    <script>
        //============================ shearch ===============================//
        $(document).ready(function() {
            $('#searchForm').on('submit', function(e) {
                e.preventDefault();

                const searchInput = $('#searchInput').val();

                $.ajax({
                    url: '{{ route('treker') }}',
                    method: 'GET',
                    data: {
                        search: searchInput
                    },
                    success: function(response) {
                        $('#tableContainer').html(
                            response);
                    },
                    error: function() {
                        $('#alert-message')
                            .text('Terjadi kesalahan saat mencari data.')
                            .show();
                    },
                });
            });

            $('#clearInput').on('click', function() {
                $('#searchInput').val('');
                $('#searchForm').submit();

                history.pushState(null, '', '/pengujung');
            });
        });
    </script>

</body>

</html>
