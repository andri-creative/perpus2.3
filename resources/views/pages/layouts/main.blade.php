<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    <script src="https://code.iconify.design/3/3.1.0/iconify.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap" rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300..700&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('homes/style/swiper-bundle.css') }}" />
    <link rel="stylesheet" href="homes/style/style.css" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    @yield('css')
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

        .btn-span {
            background-color: #38B6FF;
            color: white;
        }
    </style>

    {{-- <style>
        .font-roboto {
            font-family: "Roboto", sans-serif;
        }

        .quicksand {
            font-family: "Quicksand", serif;
            font-optical-sizing: auto;
            font-weight: 500;
            font-style: normal;
        }

        .spen-warna {
            background: #38b6ff !important;
        }

        .navbar {
            transition: background-color 0.3s ease-in-out,
                box-shadow 0.3s ease-in-out;
        }


        .navbar.show {
            background-color: rgba(0,
                    0,
                    0,
                    0.9) !important;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);/
        }

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

        .card {
            height: 100%;
        }

        /* Agar gambar tidak terdistorsi */
        .card iframe {
            width: 100%;
            height: 450px;
        }

        iframe {
            background-color: transparent !important;
            border: none;
        }

        .text-footer-card {
            font-size: 15px;


        }
    </style> --}}

</head>

<body>

    @include('pages.layouts.navbar')


    @yield('contents')

    @include('pages.layouts.footer')

    <!-- Script -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script>
        window.addEventListener("scroll", function() {
            let navbar = document.getElementById("navbar");
            if (window.scrollY > 50) {
                // Jika scroll lebih dari 50px
                navbar.classList.add("show");
            } else {
                navbar.classList.remove("show");
            }
        });
    </script>
    @yield('script')

    {{-- <script src="{{ asset('main/javascript/date-time.main.js') }}"></script> --}}


</body>

</html>
