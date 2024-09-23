<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>{{ $setting->nama_website }}</title>
    <meta content="width=device-width, initial-scale=1.0, shrink-to-fit=no" name="viewport" />
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

    {{-- CSS --}}
    @yield('css')
    {{-- END CSS --}}
</head>

<body>
    <div class="wrapper">
        <!-- Sidebar -->
        @include('admin.layouts.partials.sidebar')
        <!-- End Sidebar -->

        <div class="main-panel">
            
            {{-- HEADER --}}
            @include('admin.layouts.partials.header')
            {{-- END HEADER --}}

            <div class="container">
                <div class="page-inner">
                    
                    {{-- CONTENT --}}
                    @yield('content')
                    {{-- END CONTENT --}}

                </div>
            </div>

            {{-- FOOTER --}}
            @include('admin.layouts.partials.footer')
            {{-- END FOOTER --}}
        </div>

    </div>
    
    {{-- JS --}}
    @yield('js')
    {{-- END JS --}}

    {{-- SCRIPT --}}
    @yield('script')
    {{-- END SCRIPT --}}
</body>

</html>
