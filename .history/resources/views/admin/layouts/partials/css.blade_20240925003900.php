@section('css')
    <!-- CSS Files -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/plugins.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/kaiadmin.min.css') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <link rel="stylesheet" href="https://cdn.ckeditor.com/ckeditor5/42.0.2/ckeditor5.css" />
    <script src="https://cdn.anychart.com/releases/v8/js/anychart-base.min.js"></script>
    <script src="https://cdn.anychart.com/releases/v8/js/anychart-ui.min.js"></script>
    <script src="https://cdn.anychart.com/releases/v8/js/anychart-exports.min.js"></script>
    <script src="https://cdn.anychart.com/releases/v8/js/anychart-circular-gauge.min.js"></script>
    <link href="https://cdn.anychart.com/releases/v8/css/anychart-ui.min.css" type="text/css" rel="stylesheet">
    <link href="https://cdn.anychart.com/releases/v8/fonts/css/anychart-font.min.css" type="text/css" rel="stylesheet">

    <style>
    #dashboardMenu {
        display: grid;
        grid-template-columns: 1fr; /* Default untuk mobile: 1 kolom */
        grid-gap: 20px; /* Jarak antar elemen */
        padding: 0;
        margin: 0;
    }

    #dashboardMenu li {
        list-style-type: none;
        width: 100%;
        cursor: grab;
        border: 1px solid #ccc;
        padding: 15px;
        background-color: white;
        border-radius: 8px;
    }

    #dashboardMenu li:active {
        cursor: grabbing;
    }

    @media (min-width: 768px) {
        #dashboardMenu {
            grid-template-columns: repeat(2, 1fr);
        }
    }

    @media (min-width: 1200px) {
        #dashboardMenu {
            grid-template-columns: repeat(2, 1fr);
        }
    }
    </style>
@endsection
