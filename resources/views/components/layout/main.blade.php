@props([
    "title" => ""
])

<!DOCTYPE html>
<html>

<head>
    @vite('resources/js/app.js')
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
    <meta name="author" content="Deo">
    <meta name="keywords" content="jagoi babang, ">

    <link rel="preconnect" href="https://fonts.gstatic.com">

    <title>{{ $title }}</title>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    {{-- data table --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.css"/>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>

    {{-- sweet alert --}}
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.3/dist/sweetalert2.min.css" rel="stylesheet"/>

    {{-- ck editor --}}
    <script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>

    {{--  --}}
    <script src="{{ asset('js/app.js') }}"></script>
    {{--  --}}
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">

    <style type="text/css">
        /* Chart.js */
        /*
     * DOM element rendering detection
     * https://davidwalsh.name/detect-node-insertion
     */
        @keyframes chartjs-render-animation {
            from {
                opacity: 0.99;
            }

            to {
                opacity: 1;
            }
        }

        .chartjs-render-monitor {
            animation: chartjs-render-animation 0.001s;
        }

        /*
     * DOM element resizing detection
     * https://github.com/marcj/css-element-queries
     */
        .chartjs-size-monitor,
        .chartjs-size-monitor-expand,
        .chartjs-size-monitor-shrink {
            position: absolute;
            direction: ltr;
            left: 0;
            top: 0;
            right: 0;
            bottom: 0;
            overflow: hidden;
            pointer-events: none;
            visibility: hidden;
            z-index: -1;
        }

        .chartjs-size-monitor-expand>div {
            position: absolute;
            width: 1000000px;
            height: 1000000px;
            left: 0;
            top: 0;
        }

        .chartjs-size-monitor-shrink>div {
            position: absolute;
            width: 200%;
            height: 200%;
            left: 0;
            top: 0;
        }

        .dataTables_filter {
            display: none;
        }
    </style>
</head>

<body>
    <div class="wrapper">
        {{-- sidebar --}}
        <nav id="sidebar" class="sidebar js-sidebar">
            <div class="sidebar-content js-simplebar" data-simplebar="init">
                <div class="simplebar-wrapper" style="margin: 0px;">
                    <div class="simplebar-height-auto-observer-wrapper">
                        <div class="simplebar-height-auto-observer"></div>
                    </div>
                    <div class="simplebar-mask">
                        <div class="simplebar-offset" style="right: 0px; bottom: 0px;">
                            <div class="simplebar-content-wrapper" tabindex="0" role="region"
                                aria-label="scrollable content" style="height: 100%; overflow: hidden;">
                                <div class="simplebar-content" style="padding: 0px;">
                                    <a class="sidebar-brand" href="#">
                                        <small class="d-block text-sm">{{ Auth::user()->jenis_akun }}</small>
                                        <span class="align-middle">SDN 04 PAUM</span>
                                    </a>

                                    <ul class="sidebar-nav">
                                        @if(Auth::user()->jenis_akun == "admin")
                                            <x-layout.sidebar.admin/>
                                        @else
                                            <x-layout.sidebar.guru/>
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
        {{-- main content --}}
        <div class="main">
            {{-- navbar --}}
            <nav class="navbar navbar-expand navbar-light navbar-bg">
                <a class="sidebar-toggle js-sidebar-toggle">
                    <i class="hamburger align-self-center"></i>
                </a>

                <div class="navbar-collapse collapse">
                    <ul class="navbar-nav navbar-align">
                        <li class="nav-item">
                            <a class="nav-link d-none d-sm-inline-block" href="#">
                                <span class="text-dark">{{ Auth::user()->nama }}</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
            {{-- main content --}}
            <main class="content">
                <div class="container-fluid p-0">
                    {{-- child goes here --}}
                    {{$slot}}
                    {{--  --}}
                </div>
            </main>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.3/dist/sweetalert2.all.min.js"></script>
    
    <script src="{{ asset('js/guru.js') }}"></script>
    <script src="{{ asset('js/kelas.js') }}"></script>
    <script src="{{ asset('js/matpel.js') }}"></script>
    <script src="{{ asset('js/murid.js') }}"></script>
    <script src="{{ asset('js/semester.js') }}"></script>
    <script src="{{ asset('js/absen.js') }}"></script>
    <script src="{{ asset('js/artikel.js') }}"></script>
</body>
</html>
