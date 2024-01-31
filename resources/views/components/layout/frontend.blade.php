@props([
    "title" => ""
])

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
        <title>{{$title}}</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous"/>
        <link rel="stylesheet" href="{{ asset('frontend/vendors/animate.css/animate.min.css') }}"/>
        <link rel="stylesheet" href="{{ asset('frontend/vendors/slick-carousel/slick.css') }}"/>
        <link rel="stylesheet" href="{{ asset('frontend/vendors/slick-carousel/slick-theme.css') }}"/>
        <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}"/>
        <link rel="stylesheet" href="{{ asset('css/custom.css') }}"/>
        <script src="{{ asset('frontend/vendors/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('frontend/js/loader.js') }}"></script>
    </head>
    <body>
        <div class="oleez-loader" style="display: none;"></div>
        {{-- header --}}
        <header class="oleez-header">
            <nav class="navbar navbar-expand-lg navbar-light">
                <a class="navbar-brand" href="index.html">
                    <h3 style="font-weight: bold;">SDN 04 PAUM</h3>
                </a>
                <ul class="nav nav-actions d-lg-none ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#!" data-toggle="searchModal">
                            <img src="{{ asset('frontend/images/search.svg ') }}" alt="search">
                        </a>
                    </li>
                </ul>
                <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#oleezMainNav" aria-controls="oleezMainNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="oleezMainNav">
                    <ul class="navbar-nav mx-auto mt-2 mt-lg-0">
                        <li class="nav-item {{ request()->path() == '/' ? 'active' : '' }}">
                            <a class="nav-link" href="/">Beranda</a>
                        </li>
                        <li class="nav-item {{ request()->path() == "tentang" ? "active" : "" }}">
                            <a class="nav-link" href="{{ route('tentang') }}">Tentang</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/">Kontak</a>
                        </li>
                        <li class="nav-item {{ request()->path() == "raport" ? "active" : "" }}">
                            <a class="nav-link" href="{{ route('raport') }}">Raport Digital</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav d-none d-lg-flex">
                        <li class="nav-item">
                            <a class="nav-link nav-link-btn" href="#!" data-toggle="searchModal">
                                <img src="{{ asset('frontend/images/search.svg') }}" alt="search">
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>

        {{-- main content --}}
        <div class="main">
            {{$slot}}
        </div>

        {{-- search modal --}}
        <div id="searchModal" class="search-modal">
            <button type="button" class="close" aria-label="Close" data-dismiss="searchModal">
                <span aria-hidden="true">×</span>
            </button>
            <form action="{{ route('penelusuran') }}" method="get" class="oleez-overlay-search-form">
                <label for="search" class="sr-only">Telusuri</label>
                <input type="search" class="oleez-overlay-search-input" id="search" name="query" placeholder="Ketik kata kunci disini">
            </form>
        </div>

        {{-- footer --}}
        <footer class="oleez-footer wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
            <div class="container">
                <div class="footer-content">
                    <div class="row">
                        <div class="col-md-6">
                            <p class="footer-intro-text">Jangan sungkan untuk menghubungi kami</p>
                            <nav class="footer-social-links">
                                <a href="#!">Fb</a>
                                <a href="#!">Tw</a>
                                <a href="#!">In</a>
                                <a href="#!">Be</a>
                            </nav>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-6 footer-widget-text">
                                    <h6 class="widget-title">NOMOR TELEPON</h6>
                                    <p class="widget-content">-</p>
                                </div>
                                <div class="col-md-6 footer-widget-text">
                                    <h6 class="widget-title">EMAIL</h6>
                                    <p class="widget-content">admin@sdn04paum.com</p>
                                </div>
                                <div class="col-md-6 footer-widget-text">
                                    <h6 class="widget-title">ALAMAT</h6>
                                    <p class="widget-content">Jagoi Babang, Bengkayang, Kalimantan Barat</p>
                                </div>
                                <div class="col-md-6 footer-widget-text">
                                    <h6 class="widget-title">JAM KERJA</h6>
                                    <p class="widget-content">Hari Biasa: 07:00 - 16:00 <br> Akhir Pekan: 08:00 - 11:00</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="footer-text">
                    <p class="mb-md-0">©  {{ \Carbon\Carbon::now()->year }}, sdn04paum.com</p>
                    <p class="mb-0">Hak Cipta Dilindungi Undang - Undang</p>
                </div>
            </div>
        </footer>

        <script src="{{ asset('frontend/vendors/popper.js/popper.min.js') }}"></script>
        <script src="{{ asset('frontend/vendors/wowjs/wow.min.js') }}"></script>
        <script src="{{ asset('frontend/vendors/bootstrap/dist/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('frontend/vendors/slick-carousel/slick.min.js') }}"></script>
        <script src="{{ asset('frontend/js/main.js') }}"></script>
        <script src="{{ asset('frontend/js/landing.js') }}"></script>
        <script>
            new WOW({mobile: false}).init();
        </script>
    </body>
</html>