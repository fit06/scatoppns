@section('js')
    <!--   Core JS Files   -->
    <script src="{{ asset('assets/js/core/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset('assets/js/core/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/core/bootstrap.min.js') }}"></script>

    <!-- jQuery Scrollbar -->
    <script src="{{ asset('assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js') }}"></script>

    <!-- Chart JS -->
    <script src="{{ asset('assets/js/plugin/chart.js/chart.min.js') }}"></script>

    <!-- jQuery Sparkline -->
    <script src="{{ asset('assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js') }}"></script>

    <!-- Chart Circle -->
    <script src="{{ asset('assets/js/plugin/chart-circle/circles.min.js') }}"></script>

    <!-- Datatables -->
    <script src="{{ asset('assets/js/plugin/datatables/datatables.min.js') }}"></script>

    <!-- Bootstrap Notify -->
    <script src="{{ asset('assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js') }}"></script>

    <!-- jQuery Vector Maps -->
    <script src="{{ asset('assets/js/plugin/jsvectormap/jsvectormap.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugin/jsvectormap/world.js') }}"></script>

    <!-- Sweet Alert -->
    <script src="{{ asset('assets/js/plugin/sweetalert/sweetalert.min.js') }}"></script>

    <!-- Kaiadmin JS -->
    <script src="{{ asset('assets/js/kaiadmin.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

    {{-- <script src="https://cdn.jsdelivr.net/npm/@shopify/draggable@1.0.0-beta.11/lib/draggable.bundle.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@shopify/draggable@1.0.0-beta.11/lib/draggable.bundle.legacy.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@shopify/draggable@1.0.0-beta.11/lib/draggable.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@shopify/draggable@1.0.0-beta.11/lib/sortable.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@shopify/draggable@1.0.0-beta.11/lib/droppable.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@shopify/draggable@1.0.0-beta.11/lib/swappable.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@shopify/draggable@1.0.0-beta.11/lib/plugins.js"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/@shopify/draggable/build/umd/index.min.js"></script>

    <script>
        @if (Session::has('berhasil'))
            toastr.options =
            {
                "closeButton" : true,
                "progressBar" : true
            }
            toastr.success("{{ session('berhasil') }}");
        @endif

        @if (Session::has('warning'))
            toastr.options =
            {
                "closeButton" : true,
                "progressBar" : true
            }
            toastr.warning("{{ session('warning') }}");
        @endif

        @if (Session::has('errors'))
            toastr.options =
                {
                    "closeButton" : true,
                    "progressBar" : true
                }
                @foreach ($errors->all() as $errors)
                    toastr.error("{{ $errors }}");
                @endforeach
        @endif

        const container = document.querySelector('#dashboardMenu');
        const items = document.querySelectorAll('#dashboardMenu li');
        const draggable = new Draggable.Sortable(container, {
            draggable: 'li',
            mirror: {
                appendTo: container,
                constrainDimensions: true
            }
        })
        draggable.on('drag:start', (e) => {
            console.log('Drag dimulai: ', e);
            const item = e.source;
            item.dataset.originalX = e.sensorEvent.clientX;
            item.dataset.originalY = e.sensorEvent.clientY;
            item.dataset.startLeft = item.offsetLeft;
            item.dataset.startTop = item.offsetTop;
        });

        draggable.on('drag:move', (e) => {
            const item = e.source;
            const originalX = parseFloat(item.dataset.originalX);
            const originalY = parseFloat(item.dataset.originalY);
            const startLeft = parseFloat(item.dataset.startLeft);
            const startTop = parseFloat(item.dataset.startTop);

            const deltaX = e.sensorEvent.clientX - originalX;
            const deltaY = e.sensorEvent.clientY - originalY;

            item.style.left = `${startLeft + deltaX}px`;
            item.style.top = `${startTop + deltaY}px`;
        });

        draggable.on('drag:stop', (e) => {
            console.log('Drag dihentikan');
        });
    </script>
@endsection
