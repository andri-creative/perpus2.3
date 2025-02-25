@extends('layouts.main')

@section('title', 'Daftar Buku')

@section('conten')
    <div data-ride="carousel" class="carousel slide" id="home-v1-header-carousel">
        <!-- Carousel slides -->
        <div class="carousel-inner">
            <div class="item active">
                <figure>
                    <img alt="Home Slide" src="home/images/header-slider/home-v1/header-slide.jpg" />
                </figure>
                <div class="container">
                    <div class="carousel-caption">
                        <h3>
                            Selamat Datang di Perpustakaan Digital <br />
                            SMPN 1 Sedati
                        </h3>
                        <h2>Temukan Pengetahuan Tanpa Batas</h2>
                        <p>
                            Jadikan membaca sebagai kebiasaan yang menyenangkan. Temukan
                            buku, artikel, dan sumber belajar yang dapat membantu
                            meningkatkan wawasan Anda kapan saja dan di mana saja.
                        </p>

                    </div>
                </div>
            </div>
            <div class="item">
                <figure>
                    <img alt="Home Slide" src="home/images/header-slider/home-v1/header-slide.jpg" />
                </figure>
                <div class="container">
                    <div class="carousel-caption">
                        <h3>Selamat Datang di Perpustakaan Digital <br> SMPN 1 Sedati!</h3>
                        <h2>Meningkatkan Prestasi dengan Literasi</h2>
                        <p>
                            Bacalah dan perluas cakrawala Anda. Kami menyediakan berbagai
                            bahan bacaan untuk mendukung pembelajaran dan pengembangan diri
                            Anda.
                        </p>

                    </div>
                </div>
            </div>
            <div class="item">
                <figure>
                    <img alt="Home Slide" src="home/images/header-slider/home-v1/header-slide.jpg" />
                </figure>
                <div class="container">
                    <div class="carousel-caption">
                        <h3>Selamat Datang di Perpustakaan Digital <br> SMPN 1 Sedati!</h3>
                        <h2>Belajar dengan Teknologi</h2>
                        <p>
                            Dengan platform digital ini, Anda bisa membaca buku favorit atau
                            bahan pembelajaran dengan mudah melalui perangkat Anda.
                        </p>

                    </div>
                </div>
            </div>
        </div>

        <!-- Controls -->
        <a class="left carousel-control" href="#home-v1-header-carousel" data-slide="prev"></a>
        <a class="right carousel-control" href="#home-v1-header-carousel" data-slide="next"></a>
    </div>

    <section class="team section-padding">
        <div class="container">
            <div class="center-content">
                <h2 class="section-title">Meet Our Staff</h2>
                <span class="underline center"></span>
                <p class="lead">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                </p>
            </div>
            <div class="team-list">
                @foreach ($userLi as $userLis)
                    <div class="team-member">
                        <figure>
                            <img src="{{ $userLis->photo ? asset('images/upload/' . $userLis->photo) : asset('assets/images/users/person.png') }}"
                                style="width: 100%; height: 300px; object-fit: cover;" alt="team" />
                        </figure>
                        <div class="content-block">
                            <div class="member-info">
                                <h4>{{ $userLis->name }}</h4>
                                <span class="designation">{{ $userLis->position }}</span>
                                <ul class="social">
                                    <li>
                                        <a href="#" target="_blank">
                                            <i class="fa fa-linkedin"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" target="_blank">
                                            <i class="fa fa-facebook-f"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" target="_blank">
                                            <i class="fa fa-twitter"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" target="_blank">
                                            <i class="fa fa-skype"></i>
                                        </a>
                                    </li>
                                </ul>
                                <p>
                                    {{ $userLis->bio
                                        ? $userLis->bio
                                        : 'The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using Content here...' }}
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>

    {{--  <section class="social-network section-padding">
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
    </section>  --}}
@endsection
