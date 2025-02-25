<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title') - Perpustkkan digital</title>
    @include('layouts.style')

    <style>
        body {
            background-color: #5461C3;
            position: relative !important;
        }

        .box {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 100vh;
            transform: rotate(80deg);
            z-index: -1;
        }

        .wave {
            position: absolute;
            opacity: .4;
            width: 1500px;
            height: 1300px;
            margin-left: -150px;
            margin-top: -250px;
            border-radius: 43%;
            z-index: -1;
        }

        @keyframes rotate {
            from {
                transform: rotate(0deg);
            }

            from {
                transform: rotate(360deg);
            }
        }

        .wave.-one {
            animation: rotate 10000ms infinite linear;
            opacity: 5%;
            background: white;
        }

        .wave.-two {
            animation: rotate 6000ms infinite linear;
            opacity: 10%;
            background: white;
        }
    </style>

</head>

<body>
    @yield('content')
    <div class="box">
        <div class="wave -one"> </div>
        <div class="wave -two"></div>
    </div>
    <!-- Script -->
    @include('layouts.script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>
    <script src="{{ asset('assets/js/pengunjung.js') }}"></script>

</body>
