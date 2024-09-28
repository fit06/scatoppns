<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $setting->nama_website }}</title>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous"> -->
    <!--  <link rel="stylesheet" id="picostrap-styles-css" href="https://cdn.livecanvas.com/media/css/library/bundle.css" media="all"> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/livecanvas-team/ninjabootstrap/dist/css/bootstrap.min.css"
        media="all">
    <link rel="icon" href="{{ url($setting->favicon) }}" type="image/x-icon" />
    <!-- Fonts and icons -->
    <script src="{{ asset('assets/js/plugin/webfont/webfont.min.js') }}"></script>
    <script>
        WebFont.load({
            google: {
                families: ["Public Sans:300,400,500,600,700"]
            },
            custom: {
                families: [
                    "Font Awesome 5 Solid",
                    "Font Awesome 5 Regular",
                    "Font Awesome 5 Brands",
                    "simple-line-icons",
                ],
                urls: ["{{ asset('assets/css/fonts.min.css') }}"],
            },
            active: function() {
                sessionStorage.fonts = true;
            },
        });
    </script>
    <style>
        @font-face {
            font-family: fontStatic;
            src: url('{{ url('assets/fonts/static/Archivo-MediumItalic.ttf') }}');
        }
    </style>
</head>

<body >

    <nav class="navbar navbar-expand-lg navbar-dark text-light" style="background-color: #283655">
        <div class="container">
            <a class="navbar-brand me-2" href="/">
                <img src="{{ url($setting->logo) }}" width="30" alt="MDB Logo" loading="lazy"
                    style="margin-top: -1px;" />
                <span style="font-size: 20px; font-family: fontStatic;">{{ $setting->nama_website }}</span>
            </a>
            <div class="d-flex align-items-center">
                <a data-mdb-ripple-init href="{{ route('login') }}" class="btn btn-primary px-3 me-2 text-uppercase">
                    Login
                </a>
            </div>
        </div>
    </nav>

    <div class="container py-5">
        <div class="row mb-4 align-items-center flex-lg-row-reverse">
            <div class="col-md-6 col-xl-6 mb-4 mb-lg-0 " style="">
                <iframe width="100%" height="315"
                    src="https://www.youtube.com/embed/ia5txDHaj3E?si=bXsO58xFNvuEJjaW" title="YouTube video player"
                    frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                    referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
            </div><!-- /col -->
            <div class="col-md-6 col-xl-6">
                <div class="lc-block mb-3">
                    <div editable="rich">
                        <h3 class="fw-bolder">{{ $setting->nama_website }}</h3>
                    </div>
                </div><!-- /lc-block -->
                <!-- /lc-block -->


                <div class="lc-block mb-4">
                    <div editable="rich">

                        <p style="text-align: justify">Website ini merupakan sebuah platform yang dirancang khusus untuk mendukung operasi dari Mesin E-Fill yang dilengkapi dengan sistem SCADA (Supervisory Control and Data Acquisition). Dengan teknologi SCADA, memastikan proses pengisian botol berjalan lebih efisien, aman, dan mudah dipantau dari jarak jauh sehingga dapat memantau dan mengendalikan proses pengisian secara real-time dari mana saja.</p>

                    </div>
                </div>
            </div><!-- /col -->
        </div>
    </div>

    <!-- Footer -->
    <footer class="text-center text-lg-start text-light" style="background-color: #4d648d">

        <!-- Section: Links  -->
        <section class="p-2">
            <div class="container text-center text-md-start mt-5">
                <!-- Grid row -->
                <div class="row mt-3">
                    <!-- Grid column -->
                    <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                        <!-- Content -->
                        <h6 class="text-uppercase fw-bold mb-4">
                            {{ $about->judul }}
                        </h6>
                        {!! $about->deskripsi !!}
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                        <!-- Links -->

                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                        <!-- Links -->

                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                        <!-- Links -->
                        <h6 class="text-uppercase fw-bold mb-4">Contact</h6>
                        <p><i class="fas fa-home me-3"></i> {{ $setting->alamat }}</p>
                        <p>
                            <i class="fas fa-envelope me-3"></i>
                            {{ $setting->email }}
                        </p>
                        <p><i class="fas fa-phone me-3"></i> {{ $setting->no_telp }}</p>
                    </div>
                    <!-- Grid column -->
                </div>
                <!-- Grid row -->
            </div>
        </section>
        <!-- Section: Links  -->

        <!-- Copyright -->
        <div class="text-center p-4" style="background-color: #283655;">
            © {{ date('Y') }} Copyright:
            <a class="text-reset fw-bold" href="/">{{ $setting->nama_website }}</a>
        </div>
        <!-- Copyright -->
    </footer>
    <!-- Footer -->

    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>

    <script defer src="https://cdn.jsdelivr.net/gh/mcstudios/glightbox/dist/js/glightbox.min.js"
        onload="const lightbox = GLightbox({});"></script>
    <!-- lazily load the gLightbox CSS file -->
    <link rel="preload" href="https://cdn.jsdelivr.net/npm/glightbox/dist/css/glightbox.min.css" as="style"
        onload="this.onload=null;this.rel='stylesheet'">

</body>

</html>
