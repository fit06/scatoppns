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

    {{-- CONTENT --}}
    @yield('content')
    {{-- END CONTENT --}}
    
    {{-- JS --}}
    @yield('js')
    {{-- END JS --}}

    {{-- SCRIPT --}}
    @yield('script')
    {{-- END SCRIPT --}}
</body>

</html>
